@extends('layouts.admapp')
@section('isi')

<div class="container">
    @include('sweetalert::alert')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-info"></i> Tambah Pengumuman </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">

                        <form method="POST" action="{{ url('postpengumuman') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Pengumuman</label>
                                <input type="text" class="form-control" name="pengumuman" id="kode_matkul"
                                    placeholder="Masukan Nama Pengumuman" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload Foto</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image" id="file" required>
                                </div>
                            </div>
                            <div class="card-danger">
                                <button type="submit" class="btn btn-primary" role="alert">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection






