<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class WebsiteSettingController extends Controller
{
    
    public function mainWebSetting() {

        $webSetting = DB::table('websettings')->first();
        return view('admin.settings.website', compact('webSetting'));

    }

    public function updateWebSetting(Request $request, $id) {

        $data = array();
        $data['address_en'] = $request->address_en;
        $data['address_ind'] = $request->address_ind;
        $data['phone_en'] = $request->phone_en;
        $data['phone_ind'] = $request->phone_ind;
        $data['email'] = $request->email;

        $old_image = $request->old_image;
        
        $logo = $request->logo;
        if($logo) {
            $file_image = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            $save_image = Image::make($logo)->resize(500,300);
            $save_image->save('image/logo/'.$file_image);

            $data['logo'] = 'image/logo/'.$file_image;

            DB::table('websettings')->where('id', $id)->update($data);
            unlink($old_image);

            $notification = array(
                'message' => 'Website Setting Updated Successfully',
                'alert-type' => 'update'
            );
    
            return redirect()->route('setting.website')->with($notification);
        }else {

            $data['logo'] = $old_image;
            DB::table('websettings')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Website Setting Update Successfully',
                'alert-type' => 'update'
            );
    
            return redirect()->route('setting.website')->with($notification);

        }
        
    }
}
