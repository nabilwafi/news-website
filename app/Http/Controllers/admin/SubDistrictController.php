<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    
    public function index() {

        $subdistricts = DB::table('subdistricts')
        ->join('districts', 'subdistricts.district_id', 'districts.id')
        ->select('subdistricts.*', 'districts.district_en')
        ->orderBy('id', 'desc')->paginate(3);
        return view('admin.subdistrict.index', compact('subdistricts'));

    }

    public function addSubDistrict() {

        $districts = DB::table('districts')->get();
        return view('admin.subdistrict.create', compact('districts'));

    }

    public function createSubDistrict(Request $request) {

        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_ind' => 'required|unique:subdistricts|max:255',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ind'] = $request->subdistrict_ind;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'Sub District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subdistricts')->with($notification);

    }

    public function editSubDistrict($id) {

        $subdistrict = DB::table('subdistricts')->where('id', $id)->first();
        $districts = DB::table('districts')->get();
        return view('admin.subdistrict.update', compact('subdistrict', 'districts'));

    }

    public function updateSubDistrict(Request $request, $id) {

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ind'] = $request->subdistrict_ind;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Sub District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('subdistricts')->with($notification);

    }

    public function deleteSubDistrict($id) {

        DB::table('subdistricts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Sub District Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('subdistricts')->with($notification);

    }

}
