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
            <a href="{{ url('') }}" class="nav-link">
                <i class=""></i>
                <p>
                    ini pembimbing

                </p>
                <a href="{{ url('mahasiswa') }}" class="nav-link">

                    <p>
                        ini pembimbing

                    </p>
                    @csrf
                </a>

            @endguest
    </li>
@endsection
</nav>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">pembimbing</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Daftar Persyaratan Sidang</th>
                    <th scope="col">Status</th>

                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td></td>
                    <td>
                        <div class="form-group">
                            <label></label>
                            <input type="file" id="filecount" multiple="multiple">
                        </div>


                    </td>

            </tbody>
        </table>
    </div>


    </body>

    </html>
@endsection
