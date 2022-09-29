@extends('layouts.admapp')
@extends('layouts.ajig')

@section('isi')
@section('sana')

    @guest
        @if (Route::has('login'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          with font-awesome or any other icon font library -->
        @endif
        <li class="nav-item">
        @else
            <a href="{{ url('/home') }}" class="nav-link">
                <i class=""></i>
                <p> 
                    <i class="fa fa-home" aria-hidden="true"></i> Halaman Profile 

               </p>
                <a href="{{ url('/role-baak') }}" class="nav-link">

                    <p> 
                        <i class="nav-icon fa fa-eye"></i> Lihat Seluruh Mahasiswa
    
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
                    <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-money-bill-wave"></i> Bukti Pembayaran Mahasiswa </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">

                        </button>

                    </div>
                </div>
                @if (session()->has('message'))
                     <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <table width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center;" <th width="10%">Nama File</th>
                            <th style="text-align:center;" align="left" width="10%">matkul yang di ambil</th>  
                            <th style="text-align:center;" align="left" width="10%">File</th>
                            <th style="text-align:center;" align="left" width="10%">download </th>  
                            <th style="text-align:center;" width="10%">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($medias->count())
                            @foreach ($medias as $media)

                                <tr>
                                    <td>{{ $media->name }}</td>
                                    {{-- <td>{{ $media->npm }}</td> --}}
                                    <td>{{ $media->mata_kuliah }}</td>
                                    <td>
                                        <div>Nama: {{ $media->name }}</div>
                                        <div>File: {{ $media->file }}</div>
                                        <div>Ekstensi: {{ $media->extension }}</div>
                                        <div>Ukuran: {{ $media->size }}</div>
                                        <div>Mime: {{ $media->mime }}</div>
                                    </td>
                                    <td align="center">
                                        <a href="{{ url('uploads/' . $media->file) }}" download><button
                                                class="btn btn-info">Download</button></a>
                                    </td>
                                    <td align="center">


                                        <a href="{{ url('form-syarat-baak' . $media->id) }}"
                                            class="btn btn-primary ml-2 ">konfirmasi</a>

                                        <form action="{{ route('media.destroy', $media->id) }}" method="post"
                                            id="delete-file">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
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
                    </tbody>
                </table>
            </div>
        </div>
</section>
</table>
@endsection
