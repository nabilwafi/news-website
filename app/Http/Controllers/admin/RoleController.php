<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $writers = DB::table('users')->where('type', 0)->paginate(5);
        return view('admin.role.index', compact('writers'));

    }

    public function addWriter() {

        return view('admin.role.create');

    }

    public function createWriter(Request $request) {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        DB::table('users')->insert($data);

        $notification = array(
            'message' => 'Writer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.writer')->with($notification);
    }

    public function editWriter($id) {

        $writer = DB::table('users')->where('id', $id)->first();
        return view('admin.role.edit', compact('writer'));

    }

    public function updateWriter(Request $request, $id) {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        DB::table('users')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Writer Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.writer')->with($notification);

    }

    public function deleteWriter($id) {

        DB::table('users')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Writer Deleted Successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('all.writer')->with($notification);

    }

}
