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
            <a href="{{ url('lihatmhsbaak' . $syarat->user_id) }}" class="nav-link">

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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Data</div>
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
                    <form method="POST" action="{{ url('form-simpan-baak' . $syarat->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi syarat :</label>
                            <input class="form-control" type="hidden" name="id" id="id" value="{{ $syarat->id }}">
                            <select class="form-control" name="status" id="status" value="{{ $syarat->status }}">
                                <option>diterima</option>
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
