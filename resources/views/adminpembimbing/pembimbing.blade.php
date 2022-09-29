@extends('layouts.dsnapp')

@section('isi')


<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center">Profile Data {{ Auth::user()->name }}</h3>
            </div>
            <div class="container-fluid">
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" width="100px" height="100px"
                            src="{{ \Auth::user()->image }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Jabatan</b>
                                <p class="float-center">-</p>
                            </li>
                            <li class="list-group-item">
                                <b>Nomer Induk Dosen Nasional (NIDN)</b>
                                <p class="float-center">{{ Auth::user()->npm}}</p>
                            </li>
                            <li class="list-group-item">
                                <b>Pendidikan Tertinggi</b>
                                <p class="float-center">S2</p>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b>
                                <p class="float-center">{{ Auth::user()->email}}</p>
                            </li>
                            <li class="list-group-item">
                                <b>Kode Dosen</b>
                                <p class="float-center">-</p>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
             </div>
                
            <br>
            
        </div>
</section>
@endsection
