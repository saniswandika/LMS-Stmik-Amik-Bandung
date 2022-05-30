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
            {{-- <a href="{{ url('') }}" class="nav-link">
                <i class=""></i>
                <p>
                    lihat hasil persyaratan

                </p> --}}
            <a href="{{ url('/home') }}" class="nav-link">

                <p>
                    lihat file seluruh mahasiswa

                </p>
                @csrf
            </a>

        @endguest
    </li>
    </nav>
@endsection
<div class="container">
    @include('sweetalert::alert')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Masukan Mata Kuliah</div>
                <div class="card-body">
                    <div class="form-group">

                        <form method="POST" action="{{ url('inputmatakuliah') }}" enctype="multipart/form-data">
                            @csrf
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">kode matkul</label>
                                <input type="text" class="form-control" name="kode_matkul" id="kode_matkul"
                                    placeholder="Masukan kode matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">nama matkul</label>
                                <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Masukan nama matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">jumlah sks</label>
                                <input type="number" class="form-control" name="sks" id="sks"  placeholder="Masukan jumlah sks">
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




