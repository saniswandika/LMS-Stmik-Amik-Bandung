@extends('layouts.adminapp')

@section('isi')
@section('sana')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/logo.css') }}">
    @guest
        @if (Route::has('login'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   with font-awesome or any other icon font library -->
        @endif
        <li class="nav-item">
        @else
            <a href="{{ url('media') }}" class="nav-link">
                <i class=""></i>
                <p>
                    lihat Data Persyaratan

                </p>
                <a href="{{ url('mahasiswa') }}" class="nav-link">

                    <p>
                        Masukan Data Persyaratan
                    </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Input Persyaratan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Barang </label>
                <input type="file" id="file" name="file_1">
                @if ($errors->has('file'))
                    <small class="error">{{ $errors->first('file') }}</small>
                @endif
            </div>

            <div class="form-group">

                <label for="hidden" class="label-control">Nama Barang</label>
                <input type="file" id="file" name="file_2">
                @if ($errors->has('file'))
                    <small class="error">{{ $errors->first('file') }}</small>
                @endif
            </div>

            <div class="group">
                {{ csrf_field() }}
                <button class="save">Upload</button>
            </div>
        </form>








        {{-- <tr>
                    <th scope="row">3</th>
                    <td>
                        FRS Semester berjalan (Asli/Bersetempel)
                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Laporan TA/Skripsi Asli yang telah di sahkan pembimbing
                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>scanner KTM

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>sertifikat ospek MID

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>sertifikat studium general

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>surat bukti sedang tidak memninjam buku di perpustakaan

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>surat bukti telah menyumbang ke perpustakaan

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Pas photo Hitam putih terbaru : <br>- ukuran 4x6 : 2 (dua) lembar
                        <br>- ukuran 3x4 : 4 (empat) lembar</br>
                        <br>
                        Berwarna - ukuran 3x4 :<br> 1 (satu) lembar
                        Pria berdasi & Berjas / Almamater, Wanita berkemeja dan memakai Blazer / Almamater



                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Bukti lunas kuitansi pembayaran sidang

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>Form penilain kolokium / Seminar

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">13</th>
                    <td>Form bimbingan tugas akhir yang telah di tandatanganipembimbing dan Ka. Jur.

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td>Form isian data untuk ijasah dan rencana keikutsertaan wisuda

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td>5 (lima) lembar sertifikat (CISCO / JENI )

                    </td>
                    <td>
                        @if (session()->has('message'))
                            <p>{{ session()->get('message') }}</p>
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="group">

                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif --}}




        </form>
    </div>


    </body>

    </html>
@endsection
