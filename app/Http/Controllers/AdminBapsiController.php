<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\user;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBapsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $name = $request->id;
        $medias = Media::where('user_id', 'like', "%" . $name . "%")->paginate(10);
        return view('adminBAPSI.lihatmhs', compact('medias'));
    }
    // $medias = Media::where('user_id', $id)->first();
    // $datamhs = Media::orderBy('created_at', 'DESC')->get();
    public function getname(Request $request)
    {

        $name = $request->name;
        $categories = User::where('name', 'like', "%" . $name . "%")->paginate(10);
        return view('adminBAPSI.hasilcari', compact('categories'));
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

        return view('adminBAPSI.SyaratForm',  compact('syarat'));
    }

    public function syaratSimpan(Request $request, $id)
    {
        $syarat = Media::find($id);
     

        $syarat->status = $request->input('status');
        $syarat->keterangan = $request->input('keterangan');
        $syarat->konfirmasi = $request->input('konfirmasi');
        $syarat->konfirmasi = $request->input('nama pembimbing');
        $syarat->update();
        Alert::success('status', 'mahasiswa sudah berhasil di update');
        return redirect()->back()->with('status', 'mahasiswa sudah berhasil di update');
    }
}
