<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Media;
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
        $medias = Media::orderBy('created_at', 'DESC')->get();

        return view('adminMHS.media', compact('medias'));
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
        // $request->validate([
        //     'file' => 'max:10000000',
        //     'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
        // ]);

        if ($request->hasFile('file_1')) {
            $uploadPath = public_path('uploads');

            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file_1 = $request->file('file_1');
            $explode_1 = explode('.', $file_1->getClientOriginalName());
            $originalName_1 = $explode_1[0];
            $extension_1 = $file_1->getClientOriginalExtension();
            $rename_1 = 'file1_'  . date('YmdHis') . '.' . $extension_1;
            $mime_1 = $file_1->getClientMimeType();
            $filesize_1 = $file_1->getSize();


            if ($file_1->move($uploadPath, $rename_1)) {
                $media = new Media;
                $media->name = $originalName_1;
                $media->file = $rename_1;
                $media->extension = $extension_1;
                $media->size = $filesize_1;
                $media->mime = $mime_1;
                $media->user_id = Auth::user()->id;
                // $media->save();

                return redirect()->back()->with('message', 'Berhasil, file telah di upload');
            }

            return redirect()->back()->with('message', 'Error, file tidak dapat di upload');
        }

        if ($request->hasFile('file_2')) {
            $uploadPath = public_path('uploads');

            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file_2 = $request->file('file_2');
            $explode_2 = explode('.', $file_2->getClientOriginalName());
            $originalName_2 = $explode_2[0];
            $extension_2 = $file_2->getClientOriginalExtension();
            $rename_2 = 'file2_'  . date('YmdHis') . '.' . $extension_2;
            $mime_2 = $file_2->getClientMimeType();
            $filesize_2 = $file_2->getSize();


            if ($file_2->move($uploadPath, $rename_2)) {
                $media = new Media;
                $media->name = $originalName_2;
                $media->file = $rename_2;
                $media->extension = $extension_2;
                $media->size = $filesize_2;
                $media->mime = $mime_2;
                $media->user_id = Auth::user()->id;
                $media->save();

                return redirect()->back()->with('message', 'Berhasil, file telah di upload');
            }

            return redirect()->back()->with('message', 'Error, file tidak dapat di upload');
        }

        return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
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
    public function destroy($id_media)
    {
        $media = Media::find($id_media);

        if ($media) {
            $file = public_path('uploads/' . $media->file);

            if (File::exists($file)) {
                File::delete($file);
            }

            $media->delete();

            return redirect()->back()->with('message', 'Berhasil, file berhasil dihapus');
        }

        return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
    }
}
