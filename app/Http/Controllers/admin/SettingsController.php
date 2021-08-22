<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    
    public function socialSetting() {

        $social = DB::table('socials')->first();
        return view('admin.settings.social', compact('social'));

    }

    public function socialUpdate(Request $request, $id) {

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;

        DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Socials Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function seoSetting() {
        
        $seo = DB::table('seos')->first();
        return view('admin.settings.seo', compact('seo'));

    }

    public function seoUpdate(Request $request, $id) {

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SEO Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function prayerSetting() {

        $prayer = DB::table('prayers')->first();
        return view('admin.settings.prayer', compact('prayer'));

    }

    public function prayerUpdate(Request $request, $id) {

        $data = array();
        $data['fajr'] = $request->fajr;
        $data['zuhur'] = $request->zuhur;
        $data['ashar'] = $request->ashar;
        $data['maghrib'] = $request->maghrib;
        $data['isya'] = $request->isya;

        DB::table('prayers')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Prayer Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function liveTvSetting() {

        $liveTv = DB::table('livetvs')->first();
        return view('admin.settings.livetv', compact('liveTv'));

    }

    public function liveTvUpdate(Request $request, $id) {
        
        $data = array();
        $data['embed_code'] = $request->embed_code;

        DB::table('livetvs')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Live TV Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function liveTvDeactive(Request $request, $id) {

        DB::table('livetvs')->where('id', $id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Live TV Deactived Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('setting.live.tv')->with($notification);

    }

    public function liveTvActive(Request $request, $id) {
        
        DB::table('livetvs')->where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Live TV Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('setting.live.tv')->with($notification);


    }

    public function noticeSetting() {

        $notice = DB::table('notices')->first();
        return view('admin.settings.notice', compact('notice'));

    }

    public function noticeUpdate(Request $request, $id) {

        $data = array();
        $data['notice'] = $request->notice;

        DB::table('notices')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Notice Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function noticeDeactive(Request $request, $id) {

        DB::table('notices')->where('id', $id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Notice Deactived Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('setting.notice')->with($notification);

    }

    public function noticeActive(Request $request, $id) {

        DB::table('notices')->where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Notice Setting Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('setting.notice')->with($notification);

    }

    public function webSetting() {

        $webs = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view('admin.website.index', compact('webs'));

    }

    public function addWebSetting() {

        return view('admin.website.create');

    }

    public function createWebSetting(Request $request) {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;

        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Setting Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function editWebSetting($id) {

        $website = DB::table('websites')->where('id', $id)->first();
        return view('admin.website.update', compact('website'));

    }

    public function updateWebSetting(Request $request, $id) {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;

        DB::table('websites')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Website Setting Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.webs')->with($notification);

    }

    public function deleteWebSetting($id) {

        DB::table('websites')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Website Setting Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.webs')->with($notification);
    }

}
