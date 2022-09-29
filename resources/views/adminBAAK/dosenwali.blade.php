@extends('layouts.admapp')
@extends('layouts.ajig')

@section('isi')
@section('sana')

    {{-- @guest
        @if (Route::has('login'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           with font-awesome or any other icon font library -->
        @endif
        <li class="nav-item">
        @else --}}
            {{-- <a href="{{ url('') }}" class="nav-link">
                <i class=""></i>
                <p>
                    lihat hasil persyaratan

                </p> --}}
            {{-- <a href="{{ url('/role-baak') }}" class="nav-link">

                <p>
                    lihat file seluruh mahasiswa
                </p>
                @csrf
            </a>
        @endguest --}}
    {{-- </li>
    </nav> --}}
@endsection
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-chalkboard-teacher"></i> Pemilihan Dosen Wali </h3>
                        </div>
                        <div class="card-body">
                            <table>
                                @if (session('status'))
                                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <tbody>
                                    {{-- <tr>
                                        <td width="15%">nama file syarat </td>
                                        <td>: {{ $syarat->name }}</td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td width="15%">nama file syarat </td>
                                        <td>: {{ $syarat->npm }}</td>
                                    </tr> --}}
                                    <tr>

                                    </tr>

                                </tbody>
                            </table>
                            <form method="POST" action="{{ url('inputdosen' . $syarat->id) }}">
                                @csrf

                                {{-- <div class="form-group">
                                    <label for="konfirmasi">Konfirmasi syarat :</label>
                                    <select class="form-control" name="status" id="status" value="{{ $syarat->id }}">
                                        <option value="{{ $syarat->status }}">diterima</option>
                                        <option>revisi</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi">Konfirmasi oleh :</label>
                                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $syarat->id }}">
                                    <select class="form-control" name="konfirmasi" id="konfirmasi"
                                        value="{{ $syarat->konfirmasi }}">
                                        <option>ADMIN</option>


                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="keterangan">Keterangan :</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" value=""
                                        rows="3">{{ $syarat->keterangan }}</textarea>
                                </div>
            
                                <div class="form-group">
                                    <label for="nama_pembimbing">Dosen wali :</label>
                                    <select class="form-control" id="nama_pembimbing" name="nama_pembimbing" >
                                        <option readonly>--Pilih Dosen Wali--</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                        
                                {{-- <div class="form-group">
                                    <input name="keterangan" id="keterangan" value="{{ $syarat->keterangan }}" type="text"
                                        placeholder="Body...">

                                </div> --}}
                                <button class="btn btn-lg btn-primary" type="submit">Submit</button>

                            </form>

                            @if ($message = Session::get('success'))
                                <p>{{ $message }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>


@endsection
