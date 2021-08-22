<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    
    public function index() {

        $subcategories = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->paginate(3);
        return view('admin.subcategory.index', compact('subcategories'));

    }

    public function addSubCategory() {

        $categories = DB::table('categories')->get();
        return view('admin.subcategory.create',compact('categories'));

    }

    public function createSubCategory(Request $request) {

        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_ind' => 'required|unique:subcategories|max:255',
        ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ind'] = $request->subcategory_ind;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.categories')->with($notification);

    }

    public function editSubCategory($id) {

        $subCategory = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();


        return view('admin.subcategory.update', compact('subCategory', 'categories'));

    }

    public function updateSubCategory(Request $request, $id) {

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ind'] = $request->subcategory_ind;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SubCategory updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.categories')->with($notification);

    }

    public function deleteSubCategory($id) {

        DB::table('subcategories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'SubCategory deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('sub.categories')->with($notification);

    }


}
