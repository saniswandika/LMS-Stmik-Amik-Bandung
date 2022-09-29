@extends('layouts.admapp')
@section('isi')

<div class="container">
    @include('sweetalert::alert')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-list-alt"></i> Tambah Mata Kuliah </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">

                        <form method="POST" action="{{ url('inputmatakuliah') }}" enctype="multipart/form-data">
                            @csrf
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Matkul</label>
                                <input type="text" class="form-control" name="kode_matkul" id="kode_matkul"
                                    placeholder="Masukan kode matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Matkul</label>
                                <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Masukan nama matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jumlah SKS</label>
                                <input type="number" class="form-control" name="sks" id="sks"  style="max-width: 110px" placeholder="SKS">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan"  style="max-width: 110px" placeholder="Jurusan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Semester</label>
                                <input type="number" class="form-control" name="Semester" id="Semester"  style="max-width: 110px" placeholder="Semester">
                            </div>
                         </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection






