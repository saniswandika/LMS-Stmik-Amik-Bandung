@extends('layouts.adminapp')

@section('isi')
@section('sana')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/logo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/data.css') }}">
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
                        Masuka Data Persyaratan
                    </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>
<section class="content">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">DETAILS</th>
                <th scope="col">File</th>
                <th scope="col">Aksi</th>

            </tr>
            @if ($medias->count())
                @foreach ($medias as $media)
                    @if ($media->user->id == Auth::user()->id)
                        <tr>
                            <td>
                                <div>Nama: {{ $media->name }}</div>
                                <div>File: {{ $media->file }}</div>
                                <div>Ekstensi: {{ $media->extension }}</div>
                                <div>Ukuran: {{ $media->size }}</div>
                                <div>Mime: {{ $media->mime }}</div>
                            </td>
                            <td align="center"><a href="{{ url('uploads/' . $media->file) }}" download>Download</a>
                            </td>
                            <td align="center">
                                <button form="delete-file"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                              
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td align="center" colspan="3">Belum ada file</td>
                </tr>
            @endif
            </tbody>
    </table>
    <!-- Default box -->
    <tbody>

    </tbody>
@endsection
