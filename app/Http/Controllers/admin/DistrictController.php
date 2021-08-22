<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    
    public function index() {

        $districts = DB::table('districts')->orderBy('id', 'desc')->paginate(3);
        return view('admin.district.index',compact('districts'));

    }

    public function addDistrict() {

        return view('admin.district.create');

    }

    public function createDistrict(Request $request) {

        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_ind' => 'required|unique:districts|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ind'] = $request->district_ind;
        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('districts')->with($notification);

    }

    public function editDistrict($id) {

        $district = DB::table('districts')->where('id',$id)->first();
        return view('admin.district.update', compact('district'));

    }

    public function updateDistrict(Request $request, $id) {

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ind'] = $request->district_ind;
        DB::table('districts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('districts')->with($notification);

    }

    public function deleteDistrict($id) {

        DB::table('districts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'District deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('districts')->with($notification);
    }

}
