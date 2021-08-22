<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class GalleryController extends Controller
{
    
    public function indexPhoto() {

        $photos = DB::table('photos')->orderBy('id', 'desc')->paginate(3);
        return view('admin.gallery.photo.index', compact('photos'));

    }

    public function addPhoto() {

        return view('admin.gallery.photo.create');

    }

    public function createPhoto(Request $request) {

        $validated = $request->validate([
            'title' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'type' => 'required'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $image = $request->file('photo');

        $file_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $save_image = Image::make($image)->resize(500,300);
        $save_image->save('image/gallery/'.$file_image);

        $data['photo'] = 'image/gallery/'.$file_image;

        DB::table('photos')->insert($data);

        $notification = array(
            'message' => 'Photos Inserted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.photos')->with($notification);

    }

    public function editPhoto($id) {

        $photo = DB::table('photos')->where('id', $id)->first();
        return view('admin.gallery.photo.update', compact('photo'));

    }

    public function updatePhoto(Request $request, $id) {

        $validated = $request->validate([
            'title' => 'required',
            'photo' => 'mimes:jpeg,jpg,png',
            'type' => 'required'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $old_image = $request->old_photo;
        $image = $request->file('photo');

        if($image) {
            $file_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_image = Image::make($image)->resize(500,300);
            $save_image->save('image/gallery/'.$file_image);
    
            $data['photo'] = 'image/gallery/'.$file_image;
            unlink($old_image);
    
            DB::table('photos')->where('id', $id)->update($data);
    
            $notification = array(
                'message' => 'Photo Inserted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.photos')->with($notification);
        }else {

            DB::table('photos')->where('id', $id)->update($data);
    
            $notification = array(
                'message' => 'Photo Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.photos')->with($notification);

        }
    }

    public function deletePhoto($id) {

        DB::table('photos')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.photos')->with($notification);

    }

    public function indexVideo() {

        $videos = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
        return view('admin.gallery.video.index', compact('videos'));

    }

    public function addVideo() {

        return view('admin.gallery.video.create');

    }

    public function createVideo(Request $request) {

        $validated = $request->validate([
            'title' => 'required',
            'embed_code' => 'required',
            'type' => 'required'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;

        DB::table('videos')->insert($data);

        $notification = array(
            'message' => 'Videos Inserted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.videos')->with($notification);

    }

    public function editVideo($id) {

        $video = DB::table('videos')->where('id', $id)->first();
        return view('admin.gallery.video.update', compact('video'));

    }

    public function updateVideo(Request $request, $id) {

        $validated = $request->validate([
            'title' => 'required',
            'embed_code' => 'required',
            'type' => 'required'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;

        DB::table('videos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Videos Updated Successfully',
            'alert-type' => 'info'
        );
    
        return redirect()->route('all.videos')->with($notification);

    }

    public function deleteVideo($id) {

        DB::table('videos')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Videos Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.videos')->with($notification);

    }

}
