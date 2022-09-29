<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Media;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::table('media')->get();


        // return view('media', compact('medias'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'mata_kuliah' => 'required'
        ]);
        $input['mata_kuliah '] = $request->input('mata_kuliah ');


        if ($request->all()) {
            $uploadPath = public_path('uploads');

            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $explode = explode('.', $file->getClientOriginalName());
            $originalName = $explode[0];
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $mime = $file->getClientMimeType();
            $filesize = $file->getSize();
            $input = implode(',', $request->mata_kuliah);
            // $dosen =  $request->nama_pembimbing;

            if ($file->move($uploadPath, $rename)) {
                $media = new Media;
                $media->name = $originalName;
                $media->file = $rename;
                $media->extension = $extension;
                $media->size = $filesize;
                $media->mime = $mime;
                $media->status = 'baru';
                $media->keterangan = 'null';
                $media->konfirmasi = 'null';
                $media->nama_pembimbing =  Auth::user()->id;;
                $media->mata_kuliah = $input;
                $media->user_id = Auth::user()->id;
                $media->save();
            }
   
            Alert::success('success', 'Input Rencana Studi Berhasil');
            return redirect('/lihat')->with('success','Input Rencana Studi Berhasil');
           
        }

        return redirect()('message', 'Error, tidak ada file ditemukan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::where('id', $id)->first();
        File::delete('data_file/' . $media->file);

        // hapus data
        Media::where('id', $id)->delete();

        return redirect()->back();
    }
    public function cari(Request $request)
    {
        $medias = Media::latest();

        if (request('search')) {
            $medias->where('name', 'like', '%' . request('search') . '%');
        }


        return view('adminpembimbing.lihatmhs', [
            "name" => "all names",

            'medias' => $medias->get()
        ]);
    }
}
