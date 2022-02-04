@extends('layouts.adminapp')

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
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title">Input Persyaratan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <br>

            <table class="table table-bordered" style="width= 100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Daftar Persyaratan Sidang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            Daftar NILAI AKHIR (Asli/Bersetempel)
                            dengan persyaratan IPK 2.0 dan nilai D Maksimal 2 (dua) buah bukan pada
                            Mata kuliah inti jurusan dan praktikum


                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>

                    </tr>
                    <tr>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>
                            Formulir pengajuan sidang TA/Skripsi


                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            FRS Semester berjalan (Asli/Bersetempel)
                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Laporan TA/Skripsi Asli yang telah di sahkan pembimbing
                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>scanner KTM

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>sertifikat ospek MID

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan :</label>
                                                    <textarea name="keterangan" class="form-control" id="keterangan"
                                                        value="" rows="3">

                                                    </textarea>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>sertifikat studium general

                        </td>
                        <td>

                        </td>
                        <td>

                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>surat bukti sedang tidak memninjam buku di perpustakaan

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>surat bukti telah menyumbang ke perpustakaan

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
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

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Bukti lunas kuitansi pembayaran sidang

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>Form penilain kolokium / Seminar

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Form bimbingan tugas akhir yang telah di tandatanganipembimbing dan Ka. Jur.

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-2" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan :</label>
                                                    <textarea name="keterangan" class="form-control" id="keterangan"
                                                        value="" rows="3"></textarea>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>Form isian data untuk ijasah dan rencana keikutsertaan wisuda

                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile"></label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>5 (lima) lembar sertifikat (CISCO / JENI )



                        </td>
                        <td>

                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#DaftarNilai">
                                upload
                            </button>
                        </td>
                        <div class="modal fade" id="DaftarNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Foto Baru</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('media.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Masukan file Baru</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file"
                                                            id="file">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <div class="group">
                                                    <button class="btn btn-primary save">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>

                </tbody>
            </table>
        </div>
</section>
<!-- Default box -->



</body>

</html>
@endsection
