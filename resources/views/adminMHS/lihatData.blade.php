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
            <a href="{{ url('') }}" class="nav-link">
                <i class=""></i>
                <p>
                    ini mahasiswa

                </p>
                <a href="{{ url('mahasiswa') }}" class="nav-link">

                    <p>
                        ini mahasiswa
                    </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>
<section class="content">

    <!-- Default box -->
    <tbody>
        @if ($medias->count())
            @foreach ($medias as $media)
                <tr>
                    <td>
                        <div>Nama: {{ $media->name }}</div>
                        <div>File: {{ $media->file }}</div>
                        <div>Ekstensi: {{ $media->extension }}</div>
                        <div>Ukuran: {{ $media->size }}</div>
                        <div>Mime: {{ $media->mime }}</div>
                    </td>
                    <td align="center"><a href="{{ url('uploads/' . $media->file) }}" download>Download</a></td>
                    <td align="center">
                        <button form="delete-file"
                            onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                        <form action="{{ route('media.destroy', $media->id) }}" method="post" id="delete-file">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td align="center" colspan="3">Belum ada file</td>
            </tr>
        @endif
        @if ($medias->count())
        @foreach ($medias as $media)
            <tr>
                <td>
                    <div>Nama: {{ $media->name }}</div>
                    <div>File: {{ $media->file }}</div>
                    <div>Ekstensi: {{ $media->extension }}</div>
                    <div>Ukuran: {{ $media->size }}</div>
                    <div>Mime: {{ $media->mime }}</div>
                </td>
                <td align="center"><a href="{{ url('uploads/' . $media->file) }}" download>Download</a></td>
                <td align="center">
                    <button form="delete-file"
                        onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                    <form action="{{ route('media.destroy', $media->id) }}" method="post" id="delete-file">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td align="center" colspan="3">Belum ada file</td>
        </tr>
    @endif
    </tbody>
@endsection
