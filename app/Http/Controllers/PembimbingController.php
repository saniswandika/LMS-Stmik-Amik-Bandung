<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\user;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new user();
      
    }

    public function index(Request $request)
    {
        // $medias =[
        //     'users' => $this->user->alldata(),
        // ];
        // dd($medias);
        $name = $request->id;
        $medias = Media::where('id', 'like', "%" . $name . "%")->paginate(10);
        return view('adminpembimbing.lihatmhs',  ['medias' => $medias]);
    }
    // $medias = Media::where('user_id', $id)->first();
    // $datamhs = Media::orderBy('created_at', 'DESC')->get();
    public function getname(Request $request)
    {

        $name = $request->name;
        // $post = DB::table('')->select('id', 'title')->where('id', 1)->first();
        $categories = User::where('name', $name)->paginate(10);
        // $categories = User::where('role', 'mahasiswa')->paginate(10);
        return view('adminpembimbing.hasilcari', compact('categories'));
    }

    public function rolemhs(Request $request)
    {

        $name = $request->name;
        // $post = DB::table('')->select('id', 'title')->where('id', 1)->first();
     
        $categories = Media::where('nama_pembimbing',auth::user()->id)->paginate(10);
        // $categories = User::where('role', 'mahasiswa')->paginate(10);
        return view('adminpembimbing.hasilcari', compact('categories'));
    }
  
 

    // public function updateStatus($id)
    // {
    //     $medias = \App\Models\Media::findOrFail($id);
    //     $medias->status = 'diterima';
    //     $medias->save();
    //     return back()->with('pesan', 'syarat sudah di terima');
    // }
    public function syaratForm(Request $request, $id)
    {

        $syarat  = DB::table('media')->where('id', $id)->first();
      
        return view('adminpembimbing.SyaratForm',  compact('syarat'));
    }

    public function syaratSimpan(Request $request, $id)
    {
        $syarat = Media::find($id);

        $syarat->status = $request->input('status');
        $syarat->keterangan = $request->input('keterangan');
        $syarat->konfirmasi = $request->input('konfirmasi');

        $syarat->update();
        Alert::success('status', 'mahasiswa sudah berhasil di update');
        return redirect()->back()->with('status', 'mahasiswa sudah berhasil di update');
    }
}
