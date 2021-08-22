<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }

    public function accountSetting() {
        
        $id = Auth::user()->id;
        $editUser = User::find($id);

        return view('admin.account.profile', compact('editUser'));
    
    }

    public function editProfile() {
        
        $id = Auth::user()->id;
        $editUser = User::find($id);

        return view('admin.account.profile-edit', compact('editUser'));
    
    }

    public function updateProfile(Request $request) {

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->position = $request->position;
        $data->gender = $request->gender;

        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('image/user/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image/user'),$filename);
            $data['image'] = 'image/user/'.$filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('account.setting')->with($notification);


    }

    public function showPassword() {

        return view('admin.account.show-password');

    }

    public function changePassword(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password changed Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('login')->with($notification);
            
        }else {
            return redirect()->back();
            
        }

    }

}
