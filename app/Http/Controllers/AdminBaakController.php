<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\media_user;
use App\Models\user;
use App\Models;
use App\Models\mata_kuliah;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class   AdminBaakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->user = new user();
    }
    public function utama()
    {
        return view('adminBAAK.BAAK');
    }
    public function index(Request $request)
    {
        // $medias = [
        //     'penduduks' => $this->user->allData()
        // ];
        $npm = $request->id;
        $medias =DB::table('Media')->where('user_id', 'like', "%" . $npm . "%")->get();
        
        // $medias = Media::where('user_id', 'like', "%" . $name . "%")->paginate(10);
        // dd($medias);
        return view('adminBAAK.lihatmhs', compact('medias'));
    }
    // $medias = Media::where('user_id', $id)->first();
    // $datamhs = Media::orderBy('created_at', 'DESC')->get();
    public function getname(Request $request)
    {

        $npm = $request->npm;
        $categories = User::where('npm', 'like', "%" . $npm . "%")->paginate(10);
        return view('adminBAAK.hasilcari', compact('categories'));
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
      
        $syarat = Media::find($id);
       
        $categories = User::where('role', 'dosen')->paginate(10);     
        $syarat  = DB::table('media')->where('id', $id)->first();
  
        return view('adminBAAK.SyaratForm',   ['syarat' => $syarat, 'categories'=>$categories]);
    }
    
    public function rolemhs(Request $request)
    {
       
    
        $categories = User::where('role', 'mahasiswa')->paginate(10);
        $npm = $request->id;
        $medias = DB::table('Media')->where('user_id', 'like', "%" . $npm . "%")->get();
    //    dd($request->all());
        return view('adminBAAK.hasilcari', ['medias'=>$medias, 'categories'=>$categories]);
    }
 

    public function syaratSimpan(Request $request, $id)
    {
        $syarat = Media::find($id);

        // $syarat->keterangan = $request->input('keterangan');
        // $syarat->nama_pembimbing = $request->input( 'nama_pembimbing');
        $syarat->status = $request->input('status');
        $syarat->konfirmasi = $request->input('konfirmasi');
        $syarat->update();
        
        Alert::success('status', 'mahasiswa sudah berhasil di update');
        return redirect()->back()->with('status', 'mahasiswa sudah berhasil di update');
    }
    public function dosenwali($id)
    {
        $syarat = Media::where('user_id', $id)->first();
       
        $categories = User::where('role', 'dosen')->paginate(10);     
     
        return view('adminBAAK.dosenwali',   ['syarat' => $syarat, 'categories'=>$categories]);
    }
    public function inputdosenwali(Request $request, $id)
    {
        $syarat = Media::find($id);
        
        $syarat->keterangan = $request->input('keterangan');
        $syarat->nama_pembimbing = $request->input( 'nama_pembimbing');
        // $syarat->status = $request->input('status');
        // $syarat->konfirmasi = $request->input('konfirmasi');
        $syarat->update();
        
        Alert::success('status', 'mahasiswa sudah berhasil di update');
        return redirect()->back()->with('status', 'mahasiswa sudah berhasil di update');
    }
    public function inputmatakuliah(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required',
            'jurusan' => 'required',
            'Semester' => 'required'
        ]);

        mata_kuliah::create($request->all());

        Alert::success('status', 'mata kuliah sudah berhasil di update');
        return redirect()->back()->with('success', 'Product created successfully.');
    } 


    public function v_tambahmatkul(Request $request)
    {
       return view('adminBAAK.TambahMatkul');
    }

    
    public function mata_kuliah(Request $request)
    {
       $matkul = mata_kuliah::all();
        return view('adminBAAK.mata_kuliah', ['matkul'=>$matkul]);
    }
    public function delete(Request $request,$id)
    {
        $media = mata_kuliah::where('kode_matkul', $id)->first();
     
    
        // // hapus data
        mata_kuliah::where('kode_matkul', $id)->delete();
        User::where('id', $id)->delete();
        Alert::success('status', 'mata kuliah sudah berhasil di hapus ');
        return redirect()->back()->with('success', 'Product created successfully.');
    }
    public function lihatbiodata($id)
    {
        $biodata = DB::table('mahasiswa')->where('idnama', 'like', "" . $id . "")->get();
        $user = DB::table('users')->where('id', 'like', "" . $id . "")->get();
        // dd($biodata);
        return view('adminBAAK.lihatbiodata',['biodata' => $biodata, 'user' => $user]);

    }
    
}
