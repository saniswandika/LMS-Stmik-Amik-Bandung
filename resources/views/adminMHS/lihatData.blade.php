@extends('layouts.adminapp')
@extends('layouts.ajig')

@section('isi')
@section('sana')
    @guest
        @if (Route::has('login'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           with font-awesome or any other icon font library -->
        @endif
        <li class="nav-item">
        @else
            <a href="{{ url('lihat') }}" class="nav-link">
                <i class=""></i>
                <p>
                    lihat hasil persyaratan

                </p>
                <a href="{{ url('mahasiswa') }}" class="nav-link">

                    <p>
                        input data persyaratan

                    </p>
                    @csrf
                </a>

            @endguest
    </li>
    </nav>
@endsection
<section class="content">
    <div class="container">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Input Persyaratan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">

                    </button>

                </div>
            </div>
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <table width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align:center;" <th width="10%">nama mahasiswa</th>
                        <th style="text-align:center;" <th width="10%">nomer induk mahasiswa</th>
                        <th style="text-align:center;" align="left" width="10%">File</th>
                        <th style="text-align:center;" width="25%">Tindakan</th>
                        <th style="text-align:center;" width="10%">Download</th>
                        <th style="text-align:center;" align="left" width="25%">status</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($medias->count())
                        @foreach ($medias as $media)
                            @if ($media->user->id == Auth::user()->id)
                                <tr>
                                    <td>{{ $media->user->name }}</td>
                                    <td>{{ $media->user->npm }}</td>
                                    <td>
                                        <div>Nama: {{ $media->name }}</div>
                                        <div>File: {{ $media->file }}</div>
                                        <div>Ekstensi: {{ $media->extension }}</div>
                                        <div>Ukuran: {{ $media->size }}</div>
                                        <div>Mime: {{ $media->mime }}</div>
                                    </td>

                                    <td align="center">
                                        <button class="btn btn-danger" form="delete-file"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                                        <form action="{{ route('media.destroy', $media->id) }}" method="post"
                                            id="delete-file">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </td>


                                    <td align="center">
                                        <a href="{{ url('uploads/' . $media->file) }}" download><button
                                                class="btn btn-info">Download</button></a>
                                    </td>

                                    <td align="center">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#DaftarNilai-{{ $media->id }}">
                                            {{ $media->status }}
                                        </button>
                                    </td>
                            @endif
                        @endforeach
                        @foreach ($medias as $data)
                            <tr>
                                <div class="modal fade" id="DaftarNilai-{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">keterangan di terima
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('media.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">keterangan :</label>
                                                            <div class="input-group">
                                                                <textarea type="text" class="form-control"
                                                                    name="keterangan" id="keterangan" rows="5" disabled>{{ $data->keterangan }}
                                                            </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">di konfirmasi oleh :</label>
                                                            <div class="input-group">
                                                                <p type="text" class="form-control" name="keterangan"
                                                                    id="keterangan">{{ $data->konfirmasi }} </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Kembali</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tr>


                    @else
                        <tr>
                            <td align="center" colspan="3">Belum ada file</td>
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
</section>
</table>
@endsection
