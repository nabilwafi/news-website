<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    
    public function English() {

        // Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'en');
        return redirect()->back();

    }

    public function Indonesia() {

        // Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'indo');
        return redirect()->back();

    }

    public function singlePost($id) {

        $singlePost = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('users', 'posts.user_id', 'users.id')
        ->select('posts.*', 'categories.category_en', 'categories.category_ind',
        'subcategories.subcategory_en', 'subcategories.subcategory_ind', 'users.name')
        ->where('posts.id', $id)
        ->first();

        return view('main.singlepost', compact('singlePost'));

    }

    public function catPostEn($id, $category_en) {
        
        $postCategory = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);

        return view('main.post-category', compact('postCategory'));

    }

    public function subCatPostEn($id, $subcategory_en) {
        
        $postSubCategory = DB::table('posts')->where('subcategory_id', $id)->orderBy('id', 'desc')->paginate(5);
        $first_subpostcat = DB::table('posts')->where('subcategory_id', $id)->first();

        return view('main.post-sub-category', compact('postSubCategory', 'first_subpostcat'));

    }

    public function getSubDis($district_id) {
        
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);

    }

    public function searchDistrict(Request $request) {

        $disid = $request->district_id;
        $subdisid = $request->subdistrict_id;

        $postCategory = DB::table('posts')->where('district_id', $disid)->where('subdistrict_id', $subdisid)->paginate(5);

        $first_post = DB::table('posts')->where('district_id', $disid)->where('subdistrict_id', $subdisid)->first();
        return view('main.post-category', compact('postCategory', 'first_post'));

    }

}
