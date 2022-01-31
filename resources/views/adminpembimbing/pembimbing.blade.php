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
            <a href="{{ url('pembimbing') }}" class="nav-link">
                <i class=""></i>
                <p>
                    halaman utama pembimbing

                </p>
                <a href="{{ url('hasilcari') }}" class="nav-link">

                    <p>
                        lihat data mahasiswa
                    </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>
<section class="content">
    <div class="container">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <a class="col-lg btn btn-light mr-2 " class="">
                    <img src="{{ asset('images/teacher.png') }}" alt="BAAK" class="float-left">
                    <h4>login pembimbing</h4>
                    <p>khusus mahasiswa</p>
                </a>


            </div>

        </div>
    </div>


    </body>

    </html>
@endsection
