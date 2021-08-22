<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    
    public function index() {

        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('districts', 'posts.district_id', 'districts.id')
        ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
        ->orderBy('id','desc')->paginate(5);

        return view('admin.post.index', compact('posts'));

    }

    public function addPost() {

        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('admin.post.create', compact('categories', 'districts'));

    }

    public function getSubCategory($category_id) {

        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);

    }

    public function getSubDistrict($district_id) {

        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);

    }

    public function createPost(Request $request) {

        $validated = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_ind'] = $request->title_ind;
        $data['details_en'] = $request->details_en;
        $data['details_ind'] = $request->details_ind;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ind'] = $request->tags_ind;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        $image = $request->image;

        if($image) {

            $file_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_image = Image::make($image)->resize(500,300);
            $save_image->save('image/posts/'.$file_image);

            $data['image'] = 'image/posts/'.$file_image;

            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.posts')->with($notification);
        }else {
            return redirect()->back();
        }
        
    }

    public function editPost($id) {

        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('admin.post.edit',compact('post','categories', 'districts'));

    }

    public function updatePost(Request $request, $id) {

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_ind'] = $request->title_ind;
        $data['details_en'] = $request->details_en;
        $data['details_ind'] = $request->details_ind;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ind'] = $request->tags_ind;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;

        $old_image = $request->old_image;
        $image = $request->image;

        if($image) {

            $file_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_image = Image::make($image)->resize(500,300);
            $save_image->save('image/posts/'.$file_image);

            $data['image'] = 'image/posts/'.$file_image;

            DB::table('posts')->where('id', $id)->update($data);
            unlink($old_image);

            $notification = array(
                'message' => 'Post Update Successfully',
                'alert-type' => 'update'
            );
    
            return redirect()->route('all.posts')->with($notification);
        }else {

            $data['image'] = $old_image;
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post Update Successfully',
                'alert-type' => 'update'
            );
    
            return redirect()->route('all.posts')->with($notification);
        }

    }

    public function deletePost($id) {

        $post = DB::table('posts')->where('id', $id)->first();
        unlink($post->image);

        DB::table('posts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Post Delete Successfully',
            'alert-type' => 'delete'
        );

        return redirect()->route('all.posts')->with($notification);
    }
}
