<?php

namespace App\Http\Controllers;
use App\Models\mata_kuliah;
use App\Models\user;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MataKuliahController extends Controller
{
    public function index()
    {
    	// mengambil data mahasiswa
    	$pegawai = mata_kuliah::all();
		$user = User::where('role', 'mahasiswa')->paginate(10);    
		// $syarat->user_id = $request->input( 'user id');
    	// mengirim data mahasiswa ke view mahasiswa
		// dd($user,$pegawai);
    	return view('adminMHS.inputdatamhs',   ['user' => $user, 'pegawai'=>$pegawai]);

     
    }

	public function TambahMatkul(Request $request)
    {
    
    	$request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required'
        ]);

        mata_kuliah::create($request->all());

        Alert::success('status', 'mata kuliah sudah berhasil di update');
        return redirect()->back()->with('success', 'Product created successfully.');

	} 
	
}
