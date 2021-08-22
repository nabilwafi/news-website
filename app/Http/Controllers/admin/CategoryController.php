<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function index() {

        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(3);
        return view('admin.category.index', compact('categories'));

    }

    public function addCategory() {

        return view('admin.category.create');

    }

    public function createCategory(Request $request) {

        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_ind' => 'required|unique:categories|max:255',
        ]);

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_ind'] = $request->category_ind;
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories')->with($notification);
    }

    public function editCategory($id) {
        
        $dataCategory = DB::table('categories')->where('id', $id)->first();

        return view('admin.category.update', compact('dataCategory'));
    }

    public function updateCategory(Request $request, $id) {

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_ind'] = $request->category_ind;
        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories')->with($notification);

    }

    public function deleteCategory($id) {

        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories')->with($notification);

    }

}
