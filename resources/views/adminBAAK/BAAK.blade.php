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
                <a href="{{ url('role-baak') }}" class="nav-link">

                    <p> 
                        <i class="nav-icon fa fa-eye"></i> Lihat Mahasiswa
    
                   </p>
                    @csrf
                </a>
                <a href="{{ url('matakuliah') }}" class="nav-link">

                    <p> 
                        <i class="nav-icon fas fa-edit"></i> Masukan Data Mata Kuliah
    
                   </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>

                    <section class="content">
                        <div class="container center">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    @include('sweetalert::alert')
                                    
                                    <h3 class="card-title text-center">Profile Data {{ Auth::user()->name }}</h3>

                                    
                                    </div>
                                    <div class="container-fluid">
                                     <div class="row" style="margin-top: 22px;">
                                        <div class="col-md-12">
                                            
                                            <div class="card card-primary card-outline mb-3">
                                                <div class="card-body box-profile">
                                                    <div class="text-center">
                                            {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
                                                    </div>
                                                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                                            <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item">
                                                                        <b>Nomer Induk Mahasiswa</b> <a class="float-right">{{ Auth::user()->npm}}</a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                        <b>Keterangan</b> <a class="float-right">{{ Auth::user()->role }}</a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>E-mail</b> <a class="float-right">{{ Auth::user()->email}}</a>
                                                                </li>
                                                            </ul>
                                                        <a href="/role-baak" class="btn btn-primary btn-block"><b>Lihat mahasiswa</b></a>
                                                </div>
                                            
                                            </div>
                                    </div>
                                </div>
                                    
                                <br>
                                
                            </div>
                    </section>
@endsection
