@extends('layouts.mhsapp')


@section('isi')


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>

<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" type="text/css" href={{
    asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/jqvmap/jqvmap.min.css') }}>


<link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css?v=3.2.0') }}>

<link rel="stylesheet" type="text/css" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>

<link rel="stylesheet" src={{ asset('plugins/daterangepicker/daterangepicker.css') }}>

<section class="content">
    <div class="container"> 
        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
        <!-- Default box -->
        <div class="card">
            <div class="card-header"> 
                <h3 class="card-title text-center" style="font-size: 22px"> <i class="nav-icon fas fa-eye"></i> Hasil Rencana Studi</h3>
           
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">

                    </button>

                </div>
            </div>
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" width="5%">No. </th>
                        <th style="text-align:center;" width="20%">Nama</th>
                        <th style="text-align:center;" width="10%">NPM</th>
                        {{-- <th style="text-align:center;" align = "left" width="10%">File</th> --}}
                        <th style="text-align:center;" align ="left" width="10%">Mata Kuliah Yang Dikontrak</th>
                        <th style="text-align:center;" width="10%">Keterangan</th>
                        <th style="text-align:center;" width="10%">Download</th>
                        <th style="text-align:center;" align="left" width="15%">Status</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @if ($medias->count())
                    @foreach ($medias as $media)
                    @if ($media->user_id == Auth::user()->id)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $media->user->name }}</td>
                        <td class="text-center">{{ $media->user->npm }}</td>

                        {{-- <td>
                            <div>Nama: {{ $media->name }}</div>
                            <div>File: {{ $media->file }}</div>

                            <div>Ekstensi: {{ $media->extension }}</div>
                            <div>Ukuran: {{ $media->size }}</div>
                            <div>Mime: {{ $media->mime }}</div>
                        </td> --}}
                        <td>{{ $media->mata_kuliah }}<br></td>

                        <td align="center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#DaftarNilai-{{ $media->id }}">
                            {{ $media->status }}
                        </button>
                        </td>


                        <td align="center">
                            <a href="{{ url('uploads/' . $media->file) }}" download><button
                                    class="btn btn-info">Download</button></a>
                        </td>

                        <td align="center">
                            @if($media->status=='baru')
                            <button class="btn btn-danger" form="delete-file"
                                onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                            <form action="{{ route('media.destroy', $media->id) }}" method="post" id="delete-file">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                            </form>
                            @else 
                            {{-- <i class="nav-icon fas brand-text font-weight-lighter mt-3">
                                Anda Tidak Dapat Membatalkan Kontrak Mata Kuliah</i> --}}
                                Anda Tidak Dapat Membatalkan Kontrak Mata Kuliah
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @foreach ($medias as $data)
                    <tr>
                        <div class="modal fade" id="DaftarNilai-{{ $data->id }}" tabindex="-5"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">keterangan di terima
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method=" POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">keterangan :</label>
                                                    <div class="input-group">
                                                        <textarea type="text" class="form-control" name="keterangan"
                                                            id="keterangan" rows="5" disabled>{{ $data->keterangan }}
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
                                                <div class="form-group">
                                                    <label for="exampleInputFile">dosen wali :</label>
                                                    <div class="input-group">
                                                        <p type="text" class="form-control" name="keterangan"
                                                            id="keterangan">{{ $data->nama_pembimbing }} </p>
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

@endsection
