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


<form action="{{ route('media.store') }}" method="POST" class="align-center" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="group">
        <label for="file">Upload File</label>
        <input type="file" id="file" name="file">
        @if ($errors->has('file'))
            <small class="error">{{ $errors->first('file') }}</small>
        @endif
    </div>
    <div class="group">
        <button class="save">Upload</button>
    </div>
</form>

@endsection
