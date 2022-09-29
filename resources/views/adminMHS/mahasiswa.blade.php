@extends('layouts.mhsapp')

@section('isi')

<head>
    <style>
        th {
            max-width: 80px;
            max-height: 5px;
        }
    </style>
</head>


<link rel="stylesheet" href={{ asset('plugins/daterangepicker/daterangepicker.css') }}>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>




<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center" style="font-size: 22px" style="font-family: Times New Roman"> <i
                        class="nav-icon fas fa-user"></i> Profile
                    Anda </h3>
            </div>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active text-blue" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true"><i class="nav-icon fas fa-book-open"></i> Akademik</button>
                    <button class="nav-link text-blue" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false"><i class="nav-icon fas fa-id-card" onclick="getdata()"></i>
                        Biodata</button>
                    <button class="nav-link text-blue" id="nav-contact-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                        aria-selected="false"><i class="nav-icon fas fa-address-book"></i> Akun & Kontak</button>
                    <button class="nav-link text-blue" id="nav-ganti-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-ganti" type="button" role="tab" aria-controls="nav-ganti"
                        aria-selected="false"><i class="nav-icon fas fa-key"></i> Ganti Password</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="min-height: 100px; min-width: 100px"
                                    src="{{ \Auth::user()->image }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Program Studi</b>
                                    <p class="float-center">Teknik Infromatika</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomer Induk Mahasiswa</b>
                                    <p class="float-center">{{ Auth::user()->npm}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Kelas / Tahun Masuk</b>
                                    <p class="float-center">IF-P / 2018</p>
                                </li>
                                <li class="list-group-item">
                                    <b>E-mail</b>
                                    <p class="float-center">{{ Auth::user()->email}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Dosen Wali</b>
                                    <p class="float-center">-</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @if(!empty($data))
                    <form action="/updatebiodata" method="POST" id="biodatamhs">
                        @csrf
                        <table class="table table-borderless mt-3">
                            {{-- <thead>
                                <tr>
                                    <th scope="ml-2">Kode Mata Kuliah</th>
                                    <th scope="col">Daftar Mata Kuliah</th>

                                </tr>
                            </thead> --}}
                            <h4 class="mt-3 ml-3"> Mahasiswa</h4>
                            <hr align color="grey" width="98%" required>
                            <tbody>
                                <tr>
                                    <th> Nama <i class="nav-icon fas fa-lock text-red"></i></th>
                                    <td>
                                        {{ Auth::user()->name }}
                                        <input type="hidden" class="form-control" id="idnama" placeholder="Tempat Lahir"
                                            name="idnama" value="{{ Auth::user()->id }}">
                                            <input type="hidden" value="{{ $data->id }}" name="id">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Lahir </th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control mr-3" id="tempatlahir"
                                            placeholder="Tempat Lahir" name="tempatlahir"
                                            value="{{ $data->tempatlahir }}" required>
                                        @else
                                        <input type="text" class="form-control mr-3" id="tempatlahir"
                                            placeholder="Tempat Lahir" name="tempatlahir" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Lahir </th>
                                    <td>
                                        @if (!$data->idnama != Auth::user())
                                        <input type="date" class="form-control" id="tanggallahir"
                                            placeholder="Tanggal Lahir" name="tanggallahir"
                                            value="{{ $data->tanggallahir }}" required>
                                        @else
                                        <input type="date" class="form-control" id="tanggallahir"
                                            placeholder="Tanggal Lahir" name="tanggallahir" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>
                                        <div class="dropdown mb-3">
                                            <select class="form-control form-control-select mr-4"
                                                aria-labelledby="dropdownMenuLink" id="jeniskelamin" name="jeniskelamin"
                                                required>
                                                @if (!empty($data))
                                                <option class="dropdown-item" value="{{ $data->jeniskelamin }}">
                                                    @if($data->jeniskelamin == '1') Laki - Laki @else Perempuan @endif
                                                </option>
                                                @else
                                                <option class="dropdown-item">--Pilih Jenis Kelamin--</option>
                                                @endif
                                                @if($data->jeniskelamin == '1')
                                                <option class="dropdown-item" value="0">Perempuan</option>
                                                @elseif($data->jeniskelamin == '0')
                                                <option class="dropdown-item" value="1">Laki - Laki</option>
                                                @else
                                                <option class="dropdown-item" value="1">Laki - Laki</option>
                                                <option class="dropdown-item" value="0">Perempuan</option>
                                                @endif
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama</th>
                                    <td>
                                        <div class="dropdown mb-3">
                                            <select class="form-control form-control-select mr-4"
                                                aria-labelledby="dropdownMenuLink" id="agama" name="agama" required>
                                                @if (!empty($data))
                                                <option class="dropdown-item" value="{{ $data->agama }}">
                                                    @if($data->agama ==
                                                    '1') Islam @elseif ($data->agama == '2') Katholik
                                                    @elseif($data->agama ==
                                                    '3') Protestan @elseif($data->agama == '4') Hindu
                                                    @elseif($data->agama ==
                                                    '5') Budha @elseif($data->agama == '6') Kong Hu Cu @else Kepercayaan
                                                    Lainnya @endif </option>
                                                @else
                                                <option class="dropdown-item">--Pilih Agama--</option>
                                                @endif
                                                @if($data->agama == '1')
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '2')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '3')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '4')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '5')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '6')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @elseif($data->agama == '7')
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                @else
                                                <option class="dropdown-item" value="1">Islam</option>
                                                <option class="dropdown-item" value="2">Katholik</option>
                                                <option class="dropdown-item" value="3">Protestan</option>
                                                <option class="dropdown-item" value="4">Hindu</option>
                                                <option class="dropdown-item" value="5">Budha</option>
                                                <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                                <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                                @endif
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="number" class="form-control" id="nik"
                                            placeholder="Nomer Induk Kependudukan" name="nik" value="{{ $data->nik }}"
                                            required>
                                        @else
                                        <input type="number" class="form-control" id="nik"
                                            placeholder="Nomer Induk Kependudukan" name="nik" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">NISN</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="number" class="form-control" id="nisn"
                                            placeholder="Nomer Induk Siswa Nasional" name="nisn"
                                            value="{{ $data->nisn }}" required>
                                        @else
                                        <input type="number" class="form-control" id="nisn"
                                            placeholder="Nomer Induk Siswa Nasional" name="nisn" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Alamat Asal</th>
                                    <td>
                                        @if (!empty($data))
                                        <textarea class="form-control" placeholder="Alamat KTP" id="alamatasal"
                                            style="height: 100px" name="alamatasal" required>{{ $data->alamatasal }}
                                        @else
                                        <textarea class="form-control" placeholder="Alamat KTP" id="alamatasal" style="height: 100px" name="alamatasal" required>
                                        @endif
                                            </textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row ml-3">Alamat Domisili</th>
                                    <td>
                                        {{-- <div class="form-floating"> --}}
                                            @if (!empty($data))
                                            <textarea class="form-control" placeholder="Alamat Tempat Tinggal"
                                                id="alamatdomisili" style="height: 100px" name="alamatdomisili"
                                                required>{{ $data->alamatdomisili }} 
                                        @else
                                        <textarea class="form-control" placeholder="Alamat Tempat Tinggal" id="alamatdomisili" style="height: 100px" name="alamatdomisili" required>
                                        @endif
                                            
                                            </textarea>
                                            {{--
                                        </div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Provinsi</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="provinsi" placeholder="Provinsi"
                                            name="provinsi" value="{{ $data->provinsi }}" required>
                                        @else
                                        <input type="text" class="form-control" id="provinsi" placeholder="Provinsi"
                                            name="provinsi" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Kota / Kabupaten</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="kota" placeholder="Kota / Kapubaten"
                                            name="kota" value="{{ $data->kota }}" required>
                                        @else
                                        <input type="text" class="form-control" id="kota" placeholder="Kota / Kapubaten"
                                            name="kota" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Kecamatan</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan"
                                            name="kecamatan" value="{{ $data->kecamatan }}" required>
                                        @else
                                        <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan"
                                            name="kecamatan" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Kelurahan / Desa</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="kelurahan"
                                            placeholder="Kelurahan / Desa" name="kelurahan"
                                            value="{{ $data->kelurahan }}" required>
                                        @else
                                        <input type="text" class="form-control" id="kelurahan"
                                            placeholder="Kelurahan / Desa" name="kelurahan" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">RT / RW</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="rtrw" placeholder="RT / RW"
                                            name="rtrw" value="{{ $data->rtrw }}" required>
                                        @else
                                        <input type="text" class="form-control" id="rtrw" placeholder="RT / RW"
                                            name="rtrw" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Jenis Tinggal</th>
                                    <td>
                                        <div class="dropdown mb-3">
                                            <select class="form-control form-control-select mr-4"
                                                aria-labelledby="dropdownMenuLink" id="jenistinggal" name="jenistinggal"
                                                required>
                                                @if (!empty($data))
                                                <option class="dropdown-item" value="{{ $data->jenistinggal }}">
                                                    @if($data->jenistinggal == '1') Bersama Orang Tua
                                                    @elseif($data->jenistinggal == '2') Bersama Wali
                                                    @elseif($data->jenistinggal ==
                                                    '3') Kost @elseif($data->jenistinggal == '4') Asrama
                                                    @elseif($data->jenistinggal == '5') Panti Asuhan @else Lainnya
                                                    @endif
                                                </option>
                                                @else
                                                <option class="dropdown-item">--Pilih Jenis Tinggal--</option>
                                                @endif
                                                @if($data->jenistinggal == '1')
                                                <option class="dropdown-item" value="2">Bersama Wali</option>
                                                <option class="dropdown-item" value="3">Kost</option>
                                                <option class="dropdown-item" value="4">Asrama</option>
                                                <option class="dropdown-item" value="5">Panti Asuhan</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->jenistinggal == '2')
                                                <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                                                <option class="dropdown-item" value="3">Kost</option>
                                                <option class="dropdown-item" value="4">Asrama</option>
                                                <option class="dropdown-item" value="5">Panti Asuhan</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->jenistinggal == '3')
                                                <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                                                <option class="dropdown-item" value="2">Bersama Wali</option>
                                                <option class="dropdown-item" value="4">Asrama</option>
                                                <option class="dropdown-item" value="5">Panti Asuhan</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->jenistinggal == '4')
                                                <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                                                <option class="dropdown-item" value="2">Bersama Wali</option>
                                                <option class="dropdown-item" value="3">Kost</option>
                                                <option class="dropdown-item" value="5">Panti Asuhan</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->jenistinggal == '5')
                                                <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                                                <option class="dropdown-item" value="2">Bersama Wali</option>
                                                <option class="dropdown-item" value="3">Kost</option>
                                                <option class="dropdown-item" value="4">Asrama</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @else
                                                <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                                                <option class="dropdown-item" value="2">Bersama Wali</option>
                                                <option class="dropdown-item" value="3">Kost</option>
                                                <option class="dropdown-item" value="4">Asrama</option>
                                                <option class="dropdown-item" value="5">Panti Asuhan</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @endif
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Alat Transportasi</th>
                                    <td>
                                        <div class="dropdown mb-3">
                                            <select class="form-control form-control-select mr-4"
                                                aria-labelledby="dropdownMenuLink" id="transportasi" name="transportasi"
                                                required>
                                                @if (!empty($data))
                                                <option class="dropdown-item" value="{{ $data->transportasi }}">
                                                    @if($data->transportasi == '1') Jalan Kaki 
                                                    @elseif($data->transportasi =='2') Angkutan Umum @elseif($data->transportasi == '3') Sepeda Motor
                                                    @elseif($data->transportasi == '4') Mobil
                                                    @elseif($data->transportasi ==
                                                    '5') Ojek Online @else Lainnya @endif </option>
                                                @else
                                                <option class="dropdown-item">--Pilih Alat Transportasi--</option>
                                                @endif
                                                @if($data->transportasi == '1')
                                                <option class="dropdown-item" value="2">Angkutan Umum</option>
                                                <option class="dropdown-item" value="3">Sepeda Motor</option>
                                                <option class="dropdown-item" value="4">Mobil</option>
                                                <option class="dropdown-item" value="5">Ojek Online</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->transportasi == '2')
                                                <option class="dropdown-item" value="1">Jalan Kaki</option>
                                                <option class="dropdown-item" value="3">Sepeda Motor</option>
                                                <option class="dropdown-item" value="4">Mobil</option>
                                                <option class="dropdown-item" value="5">Ojek Online</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->transportasi == '3')
                                                <option class="dropdown-item" value="1">Jalan Kaki</option>
                                                <option class="dropdown-item" value="2">Angkutan Umum</option>
                                                <option class="dropdown-item" value="4">Mobil</option>
                                                <option class="dropdown-item" value="5">Ojek Online</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->transportasi == '4')
                                                <option class="dropdown-item" value="1">Jalan Kaki</option>
                                                <option class="dropdown-item" value="2">Angkutan Umum</option>
                                                <option class="dropdown-item" value="3">Sepeda Motor</option>
                                                <option class="dropdown-item" value="5">Ojek Online</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @elseif($data->transportasi == '5')
                                                <option class="dropdown-item" value="1">Jalan Kaki</option>
                                                <option class="dropdown-item" value="2">Angkutan Umum</option>
                                                <option class="dropdown-item" value="3">Sepeda Motor</option>
                                                <option class="dropdown-item" value="4">Mobil</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @else
                                                <option class="dropdown-item" value="1">Jalan Kaki</option>
                                                <option class="dropdown-item" value="2">Angkutan Umum</option>
                                                <option class="dropdown-item" value="3">Sepeda Motor</option>
                                                <option class="dropdown-item" value="4">Mobil</option>
                                                <option class="dropdown-item" value="5">Ojek Online</option>
                                                <option class="dropdown-item" value="6">Lainnya</option>
                                                @endif
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row ml-3">Penerima Beasiswa</th>
                                    <td>
                                        <div class="dropdown mb-3">
                                            <select class="form-control form-control-select mr-4"
                                                aria-labelledby="dropdownMenuLink" id="beasiswa" name="beasiswa">
                                                @if (!empty($data))
                                                <option class="dropdown-item" value="{{ $data->beasiswa }}">
                                                    @if($data->beasiswa == '1') Ya @else Tidak @endif</option>
                                                @else
                                                <option class="dropdown-item">--Pilih Status Penerima--</option>
                                                @endif
                                                @if($data->beasiswa == '1')
                                                <option class="dropdown-item" value="0">Tidak</option>
                                                @elseif($data->beasiswa == '0')
                                                <option class="dropdown-item" value="1">Ya</option>
                                                @else
                                                <option class="dropdown-item" value="1">Ya</option>
                                                <option class="dropdown-item" value="0">Tidak</option>
                                                @endif
                                            </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tr>
                                <th>
                                    <h4 class="">Orang Tua Mahasiswa</h4>
                                </th>
                                <td>
                                    <h5 class="mt-3 text-lightblue">Ayah</h5>
                                    <hr align color="grey" width="100%">
                                </td>
                            </tr>
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="text" class="form-control" id="namaayah" placeholder="Nama Ayah"
                                            name="namaayah" value="{{ $data->namaayah }}" required>
                                        @else
                                        <input type="text" class="form-control" id="namaayah" placeholder="Nama Ayah"
                                            name="namaayah" required>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>
                                        @if (!empty($data))
                                        <input type="date" class="form-control" id="ttlayah" placeholder="Tanggal Lahir"
                                            name="ttlayah" value="{{ $data->ttlayah }}" required>
                                        @else
                                        <input type="date" class="form-control" id="ttlayah" placeholder="Tanggal Lahir"
                                            name="ttlayah" required>
                                        @endif
                                    </td>
                                </tr>
                </div>
                <tr>
                    <th>Pendidikan Ayah</th>
                    <td>
                        <div class="dropdown mb-3">
                            <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                                id="pendidikanayah" name="pendidikanayah" required>
                                @if (!empty($data))
                                <option class="dropdown-item" value="{{ $data->pendidikanayah }}">
                                    @if($data->pendidikanayah ==
                                    '0') SD / Sederajat @elseif ($data->pendidikanayah == '1') SMP / Sederajat
                                    @elseif($data->pendidikanayah == '2') SMA / Sederajat @elseif($data->pendidikanayah
                                    ==
                                    '3') Paket A @elseif($data->pendidikanayah == '4') Paket B
                                    @elseif($data->pendidikanayah
                                    == '5') Paket C @elseif($data->pendidikanayah == '6') D1
                                    @elseif($data->pendidikanayah ==
                                    '7') D2 @elseif($data->pendidikanayah == '8') D3 @elseif($data->pendidikanayah ==
                                    '9') S1
                                    @elseif($data->pendidikanayah == '10') S2 @elseif($data->pendidikanayah == '11') S2
                                    Terapan @else S3 @endif </option>
                                @else
                                <option class="dropdown-item">--Pilih Jenjang Pendidikan Ayah--</option>
                                @endif
                                @if($data->pendidikanayah == '0')
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '1')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '2')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '3')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '4')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '5')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '6')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '7')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '8')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '9')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '10')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @elseif($data->pendidikanayah == '11')
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @else
                                <option class="dropdown-item" value="0">SD / Sederajat</option>
                                <option class="dropdown-item" value="1">SMP / Sederajat</option>
                                <option class="dropdown-item" value="2">SMA / Sederajat</option>
                                <option class="dropdown-item" value="3">Paket A</option>
                                <option class="dropdown-item" value="4">Paket B</option>
                                <option class="dropdown-item" value="5">Paket C</option>
                                <option class="dropdown-item" value="6">D1</option>
                                <option class="dropdown-item" value="7">D2</option>
                                <option class="dropdown-item" value="8">D3</option>
                                <option class="dropdown-item" value="9">S1</option>
                                <option class="dropdown-item" value="10">S2</option>
                                <option class="dropdown-item" value="11">S2 Terapan</option>
                                <option class="dropdown-item" value="12">S3</option>
                                @endif
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan Ayah</th>
                    <td>
                        <div class="dropdown mb-3">
                            <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                                id="pekerjaanayah" name="pekerjaanayah" required>
                                @if (!empty($data))
                                <option class="dropdown-item" value="{{ $data->pekerjaanayah }}">
                                    @if($data->pekerjaanayah ==
                                    '0') Tidak Bekerja @elseif ($data->pekerjaanayah == '1') Nelayan
                                    @elseif($data->pekerjaanayah == '2') Petani @elseif($data->pekerjaanayah == '3')
                                    Peternak
                                    @elseif($data->pekerjaanayah == '4') PNS / TNI / Polri @elseif($data->pekerjaanayah
                                    ==
                                    '5') Karyawan Swasta @elseif($data->pekerjaanayah == '6') Pedagang Kecil
                                    @elseif($data->pekerjaanayah == '7') Pedagang Besar @elseif($data->pekerjaanayah ==
                                    '8')
                                    Wiraswasta @elseif($data->pekerjaanayah == '9') Wirausaha
                                    @elseif($data->pekerjaanayah ==
                                    '10') Buruh @elseif($data->pekerjaanayah == '11') Pensiunan
                                    @elseif($data->pekerjaanayah
                                    == '12') Tim Ahli / Konsultan @elseif($data->pekerjaanayah == '13') Pimpinan /
                                    Manajerial @else Tenaga Pengajar / Intruktur / Fasilitator @endif </option>
                                @else
                                <option class="dropdown-item">--Pilih Jenjang Pekerjaan Ayah--</option>
                                @endif
                                @if($data->pekerjaanayah == '0')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '1')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '2')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '3')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '4')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '5')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '6')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '7')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '8')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '9')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '10')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '11')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '12')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @elseif($data->pekerjaanayah == '13')
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @else
                                <option class="dropdown-item" value="0">Tidak Bekerja</option>
                                <option class="dropdown-item" value="1">Nelayan</option>
                                <option class="dropdown-item" value="2">Petani</option>
                                <option class="dropdown-item" value="3">Peternak</option>
                                <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                                <option class="dropdown-item" value="5">Karyawan Swasta</option>
                                <option class="dropdown-item" value="6">Pedagang Kecil</option>
                                <option class="dropdown-item" value="7">Pedagang Besar</option>
                                <option class="dropdown-item" value="8">Wiraswasta</option>
                                <option class="dropdown-item" value="9">Wirausaha</option>
                                <option class="dropdown-item" value="10">Buruh</option>
                                <option class="dropdown-item" value="11">Pensiunan</option>
                                <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                                <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                                <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator
                                </option>
                                @endif
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Penghasilan Ayah Per-Bulan</th>
                    <td>
                        <div class="dropdown mb-3">
                            <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                                id="penghasilanayah" name="penghasilanayah" required>
                                @if (!empty($data))
                                <option class="dropdown-item" value="{{ $data->penghasilanayah }}">
                                    @if($data->penghasilanayah
                                    == '0') <- Rp. 500,000 @elseif ($data->penghasilanayah == '1') Rp. 500,000 - 999,999
                                        @elseif($data->penghasilanayah == '2') Rp. 1,000,000 - 1,999,999
                                        @elseif($data->penghasilanayah == '3') Rp. 2,000,000 - 4,999,999
                                        @elseif($data->penghasilanayah == '4') Rp. 5,000,000 - 20,000,000 @else -> Rp.
                                        20,000,000 @endif </option>
                                @else
                                <option class="dropdown-item">--Pilih Jenjang Penghasilan Ayah--</option>
                                @endif
                                @if($data->penghasilanayah == '0')
                                <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                                <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                                <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @elseif($data->penghasilanayah == '1')
                                <option class="dropdown-item" value="0">
                                    <- Rp. 500,000 </option>
                                <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                                <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @elseif($data->penghasilanayah == '2')
                                <option class="dropdown-item" value="0">
                                    <- Rp. 500,000 </option>
                                <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                                <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @elseif($data->penghasilanayah == '3')
                                <option class="dropdown-item" value="0">
                                    <- Rp. 500,000 </option>
                                <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                                <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @elseif($data->penghasilanayah == '4')
                                <option class="dropdown-item" value="0">
                                    <- Rp. 500,000 </option>
                                <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                                <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                                <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @else
                                <option class="dropdown-item" value="0">
                                    <- Rp. 500,000 </option>
                                <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                                <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                                <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                                <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                                <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                                @endif
                            </select>
                        </div>
                    </td>
                </tr>
                </tbody>

                <tr>
                    <th>
                        <h4 class="">Orang Tua Mahasiswa</h4>
                    </th>
                    <td>
                        <h5 class="mt-3 text-lightblue">Ibu</h5>
                        <hr align color="grey" width="100%">
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>
                            @if (!empty($data))
                            <input type="text" class="form-control" id="namaibu" placeholder="Nama Ibu" name="namaibu"
                                value="{{ $data->namaibu }}" required>
                            @else
                            <input type="text" class="form-control" id="namaibu" placeholder="Nama Ibu" name="namaibu"
                                required>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>
                            @if (!empty($data))
                            <input type="date" class="form-control" id="ttlibu" placeholder="Tanggal Lahir"
                                name="ttlibu" value="{{ $data->ttlibu }}" required>
                            @else
                            <input type="date" class="form-control" id="ttlibu" placeholder="Tanggal Lahir"
                                name="ttlibu" required>
                            @endif
            </div>
            </td>
            </tr>
            <tr>
                <th>Pendidikan Ibu</th>
                <td>
                    <div class="dropdown mb-3">
                        <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                            id="pendidikanibu" name="pendidikanibu" required>
                            @if (!empty($data))
                            <option class="dropdown-item" value="{{ $data->pendidikanibu }}">@if($data->pendidikanibu ==
                                '0')
                                SD / Sederajat @elseif ($data->pendidikanibu == '1') SMP / Sederajat
                                @elseif($data->pendidikanibu == '2') SMA / Sederajat @elseif($data->pendidikanibu ==
                                '3')
                                Paket A @elseif($data->pendidikanibu == '4') Paket B @elseif($data->pendidikanibu ==
                                '5')
                                Paket C @elseif($data->pendidikanibu == '6') D1 @elseif($data->pendidikanibu == '7') D2
                                @elseif($data->pendidikanibu == '8') D3 @elseif($data->pendidikanibu == '9') S1
                                @elseif($data->pendidikanibu == '10') S2 @elseif($data->pendidikanibu == '11') S2
                                Terapan
                                @else S3 @endif </option>
                            @else
                            <option class="dropdown-item">--Pilih Jenjang Pendidikan Ibu--</option>
                            @endif
                            @if($data->pendidikanibu == '0')
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '1')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '2')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '3')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '4')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '5')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '6')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '7')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '8')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '9')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '10')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @elseif($data->pendidikanibu == '11')
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @else
                            <option class="dropdown-item" value="0">SD / Sederajat</option>
                            <option class="dropdown-item" value="1">SMP / Sederajat</option>
                            <option class="dropdown-item" value="2">SMA / Sederajat</option>
                            <option class="dropdown-item" value="3">Paket A</option>
                            <option class="dropdown-item" value="4">Paket B</option>
                            <option class="dropdown-item" value="5">Paket C</option>
                            <option class="dropdown-item" value="6">D1</option>
                            <option class="dropdown-item" value="7">D2</option>
                            <option class="dropdown-item" value="8">D3</option>
                            <option class="dropdown-item" value="9">S1</option>
                            <option class="dropdown-item" value="10">S2</option>
                            <option class="dropdown-item" value="11">S2 Terapan</option>
                            <option class="dropdown-item" value="12">S3</option>
                            @endif
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Pekerjaan Ibu</th>
                <td>
                    <div class="dropdown mb-3">
                        <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                            id="pekerjaanibu" name="pekerjaanibu" required>
                            @if (!empty($data))
                            <option class="dropdown-item" value="{{ $data->pekerjaanibu }}">@if($data->pekerjaanibu ==
                                '0')
                                Tidak Bekerja @elseif ($data->pekerjaanibu == '1') Nelayan @elseif($data->pekerjaanibu
                                == '2')
                                Petani @elseif($data->pekerjaanibu == '3') Peternak @elseif($data->pekerjaanibu == '4')
                                PNS /
                                TNI / Polri @elseif($data->pekerjaanibu == '5') Karyawan Swasta
                                @elseif($data->pekerjaanibu ==
                                '6') Pedagang Kecil @elseif($data->pekerjaanibu == '7') Pedagang Besar
                                @elseif($data->pekerjaanibu == '8') Wiraswasta @elseif($data->pekerjaanibu == '9')
                                Wirausaha
                                @elseif($data->pekerjaanibu == '10') Buruh @elseif($data->pekerjaanibu == '11')
                                Pensiunan
                                @elseif($data->pekerjaanibu == '12') Tim Ahli / Konsultan @elseif($data->pekerjaanibu ==
                                '13')
                                Pimpinan / Manajerial @else Tenaga Pengajar / Intruktur / Fasilitator @endif </option>
                            @else
                            <option class="dropdown-item">--Pilih Jenjang Pekerjaan Ibu--</option>
                            @endif
                            @if($data->pekerjaanibu == '0')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '1')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '2')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '3')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '4')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '5')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '6')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '7')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '8')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '9')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '10')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '11')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '12')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @elseif($data->pekerjaanibu == '13')
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @else
                            <option class="dropdown-item" value="0">Tidak Bekerja</option>
                            <option class="dropdown-item" value="1">Nelayan</option>
                            <option class="dropdown-item" value="2">Petani</option>
                            <option class="dropdown-item" value="3">Peternak</option>
                            <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                            <option class="dropdown-item" value="5">Karyawan Swasta</option>
                            <option class="dropdown-item" value="6">Pedagang Kecil</option>
                            <option class="dropdown-item" value="7">Pedagang Besar</option>
                            <option class="dropdown-item" value="8">Wiraswasta</option>
                            <option class="dropdown-item" value="9">Wirausaha</option>
                            <option class="dropdown-item" value="10">Buruh</option>
                            <option class="dropdown-item" value="11">Pensiunan</option>
                            <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                            <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                            <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                            @endif
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Penghasilan Ibu Per-Bulan</th>
                <td>
                    <div class="dropdown mb-3">
                        <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                            id="penghasilanibu" name="penghasilanibu" required>
                            @if (!empty($data))
                            <option class="dropdown-item" value="{{ $data->penghasilanibu }}">@if($data->penghasilanibu
                                ==
                                '0') <- Rp. 500,000 @elseif ($data->penghasilanibu == '1') Rp. 500,000 - 999,999
                                    @elseif($data->penghasilanibu == '2') Rp. 1,000,000 - 1,999,999
                                    @elseif($data->penghasilanibu == '3') Rp. 2,000,000 - 4,999,999
                                    @elseif($data->penghasilanibu == '4') Rp. 5,000,000 - 20,000,000 @else -> Rp.
                                    20,000,000 @endif </option>
                            @else
                            <option class="dropdown-item">--Pilih Penghasilan Ibu--</option>
                            @endif
                            @if($data->penghasilanibu == '0')
                            <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                            <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                            <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @elseif($data->penghasilanibu == '1')
                            <option class="dropdown-item" value="0">
                                <- Rp. 500,000 </option>
                            <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                            <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @elseif($data->penghasilanibu == '2')
                            <option class="dropdown-item" value="0">
                                <- Rp. 500,000 </option>
                            <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                            <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @elseif($data->penghasilanibu == '3')
                            <option class="dropdown-item" value="0">
                                <- Rp. 500,000 </option>
                            <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                            <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @elseif($data->penghasilanibu == '4')
                            <option class="dropdown-item" value="0">
                                <- Rp. 500,000 </option>
                            <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                            <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                            <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @else
                            <option class="dropdown-item" value="0">
                                <- Rp. 500,000 </option>
                            <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                            <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                            <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                            <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                            <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                            @endif
                        </select>
                    </div>
                </td>
            </tr>
            </tbody>

            <tr>
                <th>
                    <h4 class="">Orang Tua Wali</h4>
                </th>
                <td>
                    <h5 class="mt-3 text-lightblue">Wali</h5>
                    <hr align color="grey" width="98%">
                </td>
            </tr>

            <tbody>
                <tr>
                    <th>Nama</th>
                    <td>
                        @if (!empty($data))
                        <input type="text" class="form-control" id="namawali" placeholder="Nama Orang Tua Wali"
                            name="namawali" value="{{ $data->namawali }}">
                        @else
                        <input type="text" class="form-control" id="namawali" placeholder="Nama Orang Tua Wali"
                            name="namawali">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>
                        @if (!empty($data))
                        <input type="date" class="form-control" id="ttlwali" placeholder="Tanggal Lahir" name="ttlwali"
                            value="{{ $data->ttlwali }}">
                        @else
                        <input type="date" class="form-control" id="ttlwali" placeholder="Tanggal Lahir" name="ttlwali">
                        @endif
        </div>

        </td>
        </tr>
        <tr>
            <th>Pendidikan Wali</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pendidikanwali" name="pendidikanwali">
                        @if (!empty($data))
                        <option class="dropdown-item" value="{{ $data->pendidikanwali }}">@if($data->pendidikanwali ==
                            '0') SD
                            / Sederajat @elseif ($data->pendidikanwali == '1') SMP / Sederajat
                            @elseif($data->pendidikanwali
                            == '2') SMA / Sederajat @elseif($data->pendidikanwali == '3') Paket A
                            @elseif($data->pendidikanwali == '4') Paket B @elseif($data->pendidikanwali == '5') Paket C
                            @elseif($data->pendidikanwali == '6') D1 @elseif($data->pendidikanwali == '7') D2
                            @elseif($data->pendidikanwali == '8') D3 @elseif($data->pendidikanwali == '9') S1
                            @elseif($data->pendidikanwali == '10') S2 @elseif($data->pendidikanwali == '11') S2 Terapan
                            @else
                            S3 @endif </option>
                        @else
                        <option class="dropdown-item">--Pilih Jenjang Pendidikan Wali--</option>
                        @endif
                        @if($data->pendidikanwali == '0')
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '1')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '2')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '3')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '4')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '5')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '6')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '7')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '8')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '9')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '10')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @elseif($data->pendidikanwali == '11')
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @else
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                        @endif
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pekerjaan wali</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pekerjaanwali" name="pekerjaanwali">
                        @if (!empty($data))
                        <option class="dropdown-item" value="{{ $data->pekerjaanwali }}">@if($data->pekerjaanwali ==
                            '0')
                            Tidak Bekerja @elseif ($data->pekerjaanwali == '1') Nelayan @elseif($data->pekerjaanwali ==
                            '2')
                            Petani @elseif($data->pekerjaanwali == '3') Peternak @elseif($data->pekerjaanwali == '4')
                            PNS /
                            TNI / Polri @elseif($data->pekerjaanwali == '5') Karyawan Swasta
                            @elseif($data->pekerjaanwali ==
                            '6') Pedagang Kecil @elseif($data->pekerjaanwali == '7') Pedagang Besar
                            @elseif($data->pekerjaanwali == '8') Wiraswasta @elseif($data->pekerjaanwali == '9')
                            Wirausaha
                            @elseif($data->pekerjaanwali == '10') Buruh @elseif($data->pekerjaanwali == '11') Pensiunan
                            @elseif($data->pekerjaanwali == '12') Tim Ahli / Konsultan @elseif($data->pekerjaanwali ==
                            '13')
                            Pimpinan / Manajerial @else Tenaga Pengajar / Intruktur / Fasilitator @endif </option>
                        @else
                        <option class="dropdown-item">--Pilih Jenjang Pekerjaan wali--</option>
                        @endif
                        @if($data->pekerjaanwali == '0')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '1')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '2')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '3')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '4')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '5')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '6')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '7')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '8')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '9')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '10')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '11')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '12')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @elseif($data->pekerjaanwali == '13')
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @else
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                        @endif
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Penghasilan Wali Per-Bulan</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="penghasilanwali" name="penghasilanwali">
                        @if (!empty($data))
                        <option class="dropdown-item" value="{{ $data->penghasilanwali }}">@if($data->penghasilanwali ==
                            '0')
                            <- Rp. 500,000 @elseif ($data->penghasilanwali == '1') Rp. 500,000 - 999,999
                                @elseif($data->penghasilanwali == '2') Rp. 1,000,000 - 1,999,999
                                @elseif($data->penghasilanwali == '3') Rp. 2,000,000 - 4,999,999
                                @elseif($data->penghasilanwali == '4') Rp. 5,000,000 - 20,000,000 @else -> Rp.
                                20,000,000
                                @endif
                        </option>
                        @else
                        <option class="dropdown-item">--Pilih Penghasilan Wali--</option>
                        @endif
                        @if($data->penghasilanwali == '0')
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @elseif($data->penghasilanwali == '1')
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @elseif($data->penghasilanwali == '2')
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @elseif($data->penghasilanwali == '3')
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @elseif($data->penghasilanwali == '4')
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @else
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                        @endif
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <div>
                    </th>
                    @if (!empty($data))
                    <button class="btn btn-primary ml-3 mr-2" type="submit"><i
                            class="nav-icon fas fa-save"></i>Update</button>
                    @else
                    <button class="btn btn-primary ml-3 mr-2" type="submit"><i
                            class="nav-icon fas fa-save"></i> Simpan</button>
                    @endif
                    {{-- <button class="btn btn-primary" onclick="reset()"><i class="nav-icon fas fa-eraser"></i>
                        Reset</button> --}}
                </div>
            </td>
        </tr>
        </tbody>
        </table>
        </form>

        @else
        <form action="/inputbiodata" method="POST" id="biodatamhs">
            @csrf
            <table class="table table-borderless mt-3">
                {{-- <thead>
                    <tr>
                        <th scope="ml-2">Kode Mata Kuliah</th>
                        <th scope="col">Daftar Mata Kuliah</th>

                    </tr>
                </thead> --}}
                <h4 class="mt-3 ml-3"> Mahasiswa</h4>
                <tbody>
                    <tr>
                        <th> Nama <i class="nav-icon fas fa-lock text-red"></i></th>
                        <td>
                            {{ Auth::user()->name }}
                            <input type="hidden" class="form-control" id="idnama" placeholder="Tempat Lahir"
                                name="idnama" value="{{ Auth::user()->id }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Tempat Lahir </th>
                        <td>
                            <input type="text" class="form-control mr-3" id="tempatlahir" placeholder="Tempat Lahir"
                                name="tempatlahir" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Lahir </th>
                        <td>
                            <input type="date" class="form-control" id="tanggallahir" placeholder="Tanggal Lahir"
                                name="tanggallahir" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>
                            <div class="dropdown mb-3">
                                <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                                    id="jeniskelamin" name="jeniskelamin" required>
                                    <option class="dropdown-item">--Pilih Jenis Kelamin--</option>
                                    <option class="dropdown-item" value="1">Laki - Laki</option>
                                    <option class="dropdown-item" value="0">Perempuan</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Agama</th>
                        <td>
                            <div class="dropdown mb-3">
                                <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                                    id="agama" name="agama" required>
                                    <option class="dropdown-item">--Pilih Agama--</option>
                                    <option class="dropdown-item" value="1">Islam</option>
                                    <option class="dropdown-item" value="2">Katholik</option>
                                    <option class="dropdown-item" value="3">Protestan</option>
                                    <option class="dropdown-item" value="4">Hindu</option>
                                    <option class="dropdown-item" value="5">Budha</option>
                                    <option class="dropdown-item" value="6">Kong Hu Cu</option>
                                    <option class="dropdown-item" value="7">Kepercayaan Lainnya</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">NIK</th>
                        <td>
                            <input type="number" class="form-control" id="nik" placeholder="Nomer Induk Kependudukan"
                                name="nik" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ml-3">NISN</th>
                        <td>
                            <input type="number" class="form-control" id="nisn" placeholder="Nomer Induk Siswa Nasional"
                                name="nisn" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ml-3">Alamat Asal</th>
                        <td>
                            <textarea class="form-control" placeholder="Alamat KTP" id="alamatasal"
                                style="height: 100px" name="alamatasal" required>
                                        </textarea>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row ml-3">Alamat Domisili</th>
                        <td>
                            <textarea class="form-control" placeholder="Alamat Tempat Tinggal" id="alamatdomisili"
                                style="height: 100px" name="alamatdomisili" required>
                                </textarea>
                            {{--
    </div> --}}
    </td>
    </tr>
    <tr>
        <th scope="row ml-3">Provinsi</th>
        <td>
            <input type="text" class="form-control" id="provinsi" placeholder="Provinsi" name="provinsi" required>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Kota / Kabupaten</th>
        <td>
            <input type="text" class="form-control" id="kota" placeholder="Kota / Kapubaten" name="kota" required>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Kecamatan</th>
        <td>
            <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan" required>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Kelurahan / Desa</th>
        <td>
            <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan / Desa" name="kelurahan"
                required>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">RT / RW</th>
        <td>
            <input type="text" class="form-control" id="rtrw" placeholder="RT / RW" name="rtrw" required>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Jenis Tinggal</th>
        <td>
            <div class="dropdown mb-3">
                <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                    id="jenistinggal" name="jenistinggal" required>
                    <option class="dropdown-item">--Pilih Jenis Tinggal--</option>
                    <option class="dropdown-item" value="1">Bersama Orang Tua</option>
                    <option class="dropdown-item" value="2">Bersama Wali</option>
                    <option class="dropdown-item" value="3">Kost</option>
                    <option class="dropdown-item" value="4">Asrama</option>
                    <option class="dropdown-item" value="5">Panti Asuhan</option>
                    <option class="dropdown-item" value="6">Lainnya</option>
                </select>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Alat Transportasi</th>
        <td>
            <div class="dropdown mb-3">
                <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                    id="transportasi" name="transportasi" required>
                    <option class="dropdown-item">--Pilih Alat Transportasi--</option>
                    <option class="dropdown-item" value="1">Jalan Kaki</option>
                    <option class="dropdown-item" value="2">Angkutan Umum</option>
                    <option class="dropdown-item" value="3">Sepeda Motor</option>
                    <option class="dropdown-item" value="4">Mobil</option>
                    <option class="dropdown-item" value="5">Ojek Online</option>
                    <option class="dropdown-item" value="6">Lainnya</option>
                </select>
        </td>
    </tr>
    <tr>
        <th scope="row ml-3">Penerima Beasiswa</th>
        <td>
            <div class="dropdown mb-3">
                <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink" id="beasiswa"
                    name="beasiswa">
                    <option class="dropdown-item">--Pilih Status Penerima--</option>
                    <option class="dropdown-item" value="1">Ya</option>
                    <option class="dropdown-item" value="0">Tidak</option>
                </select>
        </td>
    </tr>
    </tbody>
    <tr>
        <th>
            <h4 class="">Orang Tua Mahasiswa</h4>
        </th>
        <td>
            <h5 class="mt-3 text-lightblue">Ayah</h5>
            <hr align color="grey" width="100%" required>
        </td>
    </tr>
    <tbody>
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" class="form-control" id="namaayah" placeholder="Nama Ayah" name="namaayah" required>
            </td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <input type="date" class="form-control" id="ttlayah" placeholder="Tanggal Lahir" name="ttlayah"
                    required>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pendidikan Ayah</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pendidikanayah" name="pendidikanayah" required>
                        <option class="dropdown-item">--Pilih Jenjang Pendidikan Ayah--</option>
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pekerjaan Ayah</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pekerjaanayah" name="pekerjaanayah" required>
                        <option class="dropdown-item">--Pilih Pekerjaan Ayah--</option>
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Penghasilan Ayah Per-Bulan</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="penghasilanayah" name="penghasilanayah" required>
                        <option class="dropdown-item">--Pilih Jenjang Penghasilan Ayah--</option>
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                    </select>
                </div>
            </td>
        </tr>
    </tbody>

    <tr>
        <th>
            <h4 class="">Orang Tua Mahasiswa</h4>
        </th>
        <td>
            <h5 class="mt-3 text-lightblue">Ibu</h5>
            <hr align color="grey" width="100%">
        </td>
    </tr>
    <tbody>
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" class="form-control" id="namaibu" placeholder="Nama Ibu" name="namaibu" required>
            </td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <input type="date" class="form-control" id="ttlibu" placeholder="Tanggal Lahir" name="ttlibu" required>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pendidikan Ibu</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pendidikanibu" name="pendidikanibu" required>
                        <option class="dropdown-item">--Pilih Jenjang Pendidikan Ibu--</option>
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pekerjaan Ibu</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pekerjaanibu" name="pekerjaanibu" required>
                        <option class="dropdown-item">--Pilih Jenjang Pekerjaan Ibu--</option>
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Penghasilan Ibu Per-Bulan</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="penghasilanibu" name="penghasilanibu" required>
                        <option class="dropdown-item">--Pilih Penghasilan Ibu--</option>
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                    </select>
                </div>
            </td>
        </tr>
    </tbody>

    <tr>
        <th>
            <h4 class="">Orang Tua Wali</h4>
        </th>
        <td>
            <h5 class="mt-3 text-lightblue">Wali</h5>
            <hr align color="grey" width="98%">
        </td>
    </tr>

    <tbody>
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" class="form-control" id="namawali" placeholder="Nama Orang Tua Wali" name="namawali">
            </td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <input type="date" class="form-control" id="ttlwali" placeholder="Tanggal Lahir" name="ttlwali">
                </div>

            </td>
        </tr>
        <tr>
            <th>Pendidikan Wali</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pendidikanwali" name="pendidikanwali" required>
                        <option class="dropdown-item">--Pilih Jenjang Pendidikan Wali--</option>
                        <option class="dropdown-item" value="0">SD / Sederajat</option>
                        <option class="dropdown-item" value="1">SMP / Sederajat</option>
                        <option class="dropdown-item" value="2">SMA / Sederajat</option>
                        <option class="dropdown-item" value="3">Paket A</option>
                        <option class="dropdown-item" value="4">Paket B</option>
                        <option class="dropdown-item" value="5">Paket C</option>
                        <option class="dropdown-item" value="6">D1</option>
                        <option class="dropdown-item" value="7">D2</option>
                        <option class="dropdown-item" value="8">D3</option>
                        <option class="dropdown-item" value="9">S1</option>
                        <option class="dropdown-item" value="10">S2</option>
                        <option class="dropdown-item" value="11">S2 Terapan</option>
                        <option class="dropdown-item" value="12">S3</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Pekerjaan wali</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="pekerjaanwali" name="pekerjaanwali" required>
                        <option class="dropdown-item">--Pilih Jenjang Pekerjaan wali--</option>
                        <option class="dropdown-item" value="0">Tidak Bekerja</option>
                        <option class="dropdown-item" value="1">Nelayan</option>
                        <option class="dropdown-item" value="2">Petani</option>
                        <option class="dropdown-item" value="3">Peternak</option>
                        <option class="dropdown-item" value="4">PNS / TNI / Polri</option>
                        <option class="dropdown-item" value="5">Karyawan Swasta</option>
                        <option class="dropdown-item" value="6">Pedagang Kecil</option>
                        <option class="dropdown-item" value="7">Pedagang Besar</option>
                        <option class="dropdown-item" value="8">Wiraswasta</option>
                        <option class="dropdown-item" value="9">Wirausaha</option>
                        <option class="dropdown-item" value="10">Buruh</option>
                        <option class="dropdown-item" value="11">Pensiunan</option>
                        <option class="dropdown-item" value="12">Tim Ahli / Konsultan</option>
                        <option class="dropdown-item" value="13">Pimpinan / Manajerial</option>
                        <option class="dropdown-item" value="14">Tenaga Pengajar / Instruktur / Fasilitator</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Penghasilan Wali Per-Bulan</th>
            <td>
                <div class="dropdown mb-3">
                    <select class="form-control form-control-select mr-4" aria-labelledby="dropdownMenuLink"
                        id="penghasilanwali" name="penghasilanwali" required>
                        <option class="dropdown-item">--Pilih Penghasilan Wali--</option>
                        <option class="dropdown-item" value="0">
                            <- Rp. 500,000 </option>
                        <option class="dropdown-item" value="1">Rp. 500,000 - 999,999</option>
                        <option class="dropdown-item" value="2">Rp. 1,000,000 - 1,999,999</option>
                        <option class="dropdown-item" value="3">Rp. 2,000,000 - 4,999,999</option>
                        <option class="dropdown-item" value="4">Rp. 5,000,000 - 20,000,000</option>
                        <option class="dropdown-item" value="5">-> Rp. 20,000,000 </option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <div>
                    </th>
                    {{-- @if (!empty($data))
                    <button class="btn btn-primary ml-3 mr-2" type="submit"><i
                            class="nav-icon fas fa-save"></i>Update</button>
                    @else --}}
                    <button class="btn btn-primary ml-3 mr-2" type="submit"><i
                            class="nav-icon fas fa-save"></i> Simpan</button>
                    {{-- @endif --}}
                    <button class="btn btn-primary" onclick="reset()"><i class="nav-icon fas fa-eraser"></i>
                        Reset</button>
                </div>
            </td>
        </tr>
        </tbody>
        </table>
    </form>
    @endif
    </div>
    
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <form action="#" method="POST" id="biodatamhs">
            @csrf
            <table class="table table-bordered mt-3">
                {{-- <thead>
                    <tr>
                        <th scope="ml-2">Kode Mata Kuliah</th>
                        <th scope="col">Daftar Mata Kuliah</th>

                    </tr>
                </thead> --}}
                <tbody>
                    <tr>
                        <th scope="row">E-Mail </th>
                        <td>
                            @if (!empty($data))
                            <input type="text" class="form-control mr-3" id="email" placeholder="E-Mail" name="email"
                                value="{{ Auth::user()->email}}" required>
                            @else
                            <input type="text" class="form-control mr-3" id="email" placeholder="E-Mail" name="email"
                                required>
                            @endif
                            <button class="btn btn-primary mt-3" type="submit"><i
                                    class="nav-icon fas fa-save"></i>Update E - Mail</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">No Handphone </th>
                        <td>
                            @if (!empty($data))
                            <input type="text" class="form-control mr-3" id="nohp" placeholder="No Handphone"
                                name="nohp" value="" required>
                            @else
                            <input type="text" class="form-control mr-3" id="nohp" placeholder="No Handphone"
                                name="nohp" required>
                            @endif
                            <button class="btn btn-primary mt-3" type="submit"><i
                                    class="nav-icon fas fa-save"></i>Update No Handphone</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-ganti" role="tabpanel" aria-labelledby="nav-ganti-tab">

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{
                                        __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{
                                        __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                        __('Confirm
                                        Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Ganti Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function getdata(){
            $.get("/mahasiswa", function(data){
            $("#tempatlahir").val(data.bio.tempatlahir);
            console.log(val(data.bio.tempatlahir));
});
}


</script>
<script>
    function reset(){
    document.getElementById("biodatamhs").reset();
}
</script>
<script>
    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>


@endsection
</body>

</html>