<?php

namespace App\Http\Controllers;
use App\Models\mata_kuliah;
use App\Models\user;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function kurikulummhs(Request $request)
    {
        //dd($request->all());
        $pegawai = mata_kuliah::all();
		$user = User::where('role', 'mahasiswa')->paginate(10);  

        // if ($request->all()) {
        //     $pegawai = User::select('*');
        //     return mata_kuliah::of($pegawai)
        //             ->addIndexColumn()
        //             ->addColumn('status', function($row){
        //                  if($row->status){
        //                     return '<span class="badge badge-primary">Active</span>';
        //                  }else{
        //                     return '<span class="badge badge-danger">Deactive</span>';
        //                  }
        //             })
        //             ->filter(function ($instance) use ($request) {
        //                 if ($request->get('status') == '0' || $request->get('status') == '1') {
        //                     $instance->where('status', $request->get('status'));
        //                 }
        //                 if (!empty($request->get('search'))) {
        //                      $instance->where(function($w) use($request){
        //                         $search = $request->get('search');
        //                         $w->orWhere('', 'LIKE', "%$search%")
        //                         ->orWhere('email', 'LIKE', "%$search%");
        //                     });
        //                 }
        //             })
        //             ->rawColumns(['status'])
        //             ->make(true);

        return view('adminMHS.kurikulum', ['user' => $user, 'pegawai'=>$pegawai]);

    }
}
