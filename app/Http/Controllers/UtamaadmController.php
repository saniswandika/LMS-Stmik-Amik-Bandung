<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\db;
use Illuminate\Support\Facades\Auth;

class UtamaadmController extends Controller

{
    public function index()
    {
        return view('adminBAAK.utamaadm');
    }
    public function pengumuman()
    {
        $pengumuman = db::table('pengumuman')->get();
        return view('adminBAAK.inputpengumuman', ['pengumuman' => $pengumuman]);

    }
    public function addpengumuman()
    {
        return view('adminBAAK.tambahpengumuman');
        
    }
    public function postpengumuman(Request $request)
    {
     $profileImage = $request->file('image');
     $profileImageSaveAsName = time() . Auth::id() . "-profile." . $profileImage->getClientOriginalExtension();

     $upload_path = 'image/';
     $profile_image_url = $upload_path . $profileImageSaveAsName;
     $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        db::table('pengumuman')->insert([
           'pengumuman'=>$request->pengumuman, 
           'image' => $profile_image_url,
        ]);
        Alert::success('Pengumuman Berhasil Di Upload');
        return redirect('/inputpengumuman');
    }
    public function deletepengumuman($id)
    {
        
        db::table('pengumuman')->where('id', $id)->delete();
        Alert::success('Pengumuman Berhasil Dihapus');
            return redirect('/inputpengumuman');
    }
    public function welcome() {
        $w = db::table('pengumuman')->get();
        return view('welcome', ['w' => $w]);
    }
    
}
