<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $data['bio'] = mahasiswa::where('idnama', Auth::user()->id)->first();
        $data = DB::table('mahasiswa')->where('idnama', 'like', ''.Auth::user()->id.'')->first();
        
        return view('adminMHS.mahasiswa', ['data'=>$data]);
    }
    public function inputmahasiswa(Request $request)
    {
        $store = [
            'idnama' => $request->idnama,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir'=> $request->tanggallahir,
            'jeniskelamin'=> $request->jeniskelamin,
            'agama'=> $request->agama,
            'nik'=> $request->nik,
            'nisn'=> $request->nisn,
            'alamatasal'=> $request->alamatasal,
            'alamatdomisili'=> $request->alamatdomisili,
            'provinsi'=> $request->provinsi,
            'kota'=> $request->kota,
            'kecamatan'=> $request->kecamatan,
            'kelurahan'=> $request->kelurahan,
            'rtrw'=> $request->rtrw,
            'jenistinggal'=> $request->jenistinggal,
            'transportasi'=> $request->transportasi,
            'beasiswa'=> $request->beasiswa,
            'namaayah'=> $request->namaayah,
            'ttlayah'=> $request->ttlayah,
            'pendidikanayah'=> $request->pendidikanayah,
            'pekerjaanayah'=> $request->pekerjaanayah,
            'penghasilanayah'=> $request->penghasilanayah,
            'namaibu'=> $request->namaibu,
            'ttlibu'=> $request->ttlibu,
            'pendidikanibu'=> $request->pendidikanibu,
            'pekerjaanibu'=> $request->pekerjaanibu,
            'penghasilanibu'=> $request->penghasilanibu,
            'namawali'=> $request->namawali,
            'ttlwali'=> $request->ttlwali,
            'pendidikanwali'=> $request->pendidikanwali,
            'pekerjaanwali'=> $request->pekerjaanwali,
            'penghasilanwali'=> $request->penghasilanwali,
            'created_at' => now()
        ];
        mahasiswa::create($store);

        Alert::success('Status', 'Biodata Berhasil Disimpan');
        return redirect()->back()->with('success', 'Product created successfully.');
	} 
    public function updatebiodata(Request $request)
    {
        // dd($request->all());
        DB::table('mahasiswa')->where('id', $request->id)->update([
            'idnama' => $request->idnama,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir'=> $request->tanggallahir,
            'jeniskelamin'=> $request->jeniskelamin,
            'agama'=> $request->agama,
            'nik'=> $request->nik,
            'nisn'=> $request->nisn,
            'alamatasal'=> $request->alamatasal,
            'alamatdomisili'=> $request->alamatdomisili,
            'provinsi'=> $request->provinsi,
            'kota'=> $request->kota,
            'kecamatan'=> $request->kecamatan,
            'kelurahan'=> $request->kelurahan,
            'rtrw'=> $request->rtrw,
            'jenistinggal'=> $request->jenistinggal,
            'transportasi'=> $request->transportasi,
            'beasiswa'=> $request->beasiswa,
            'namaayah'=> $request->namaayah,
            'ttlayah'=> $request->ttlayah,
            'pendidikanayah'=> $request->pendidikanayah,
            'pekerjaanayah'=> $request->pekerjaanayah,
            'penghasilanayah'=> $request->penghasilanayah,
            'namaibu'=> $request->namaibu,
            'ttlibu'=> $request->ttlibu,
            'pendidikanibu'=> $request->pendidikanibu,
            'pekerjaanibu'=> $request->pekerjaanibu,
            'penghasilanibu'=> $request->penghasilanibu,
            'namawali'=> $request->namawali,
            'ttlwali'=> $request->ttlwali,
            'pendidikanwali'=> $request->pendidikanwali,
            'pekerjaanwali'=> $request->pekerjaanwali,
            'penghasilanwali'=> $request->penghasilanwali,
            'created_at' => now()
        ]);
        Alert::success('Status', 'Biodata Berhasil Di Update');
        return redirect()->back()->with('success', 'Product created successfully.');
    }
}
