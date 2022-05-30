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
            <a href="{{ url('/home') }}" class="nav-link">
                <i class=""></i>
                <p> 
                    <i class="fa fa-home" aria-hidden="true"></i> Halaman Profile 

               </p>
            </a>

            @endguest
    </li>
    </nav>
@endsection
<div class="container">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">


            <form action="{{ url('hasilcari') }}" action="GET">
                {{ @csrf_field() }}
                <input type="text" name="name" placeholder="cari mahasiswa wali" class="form-control"><br>
                <input type="submit" class="btn btn-md btn-outline-primary">
            </form>
            <hr>
            {{-- @foreach ($article as $row)
                <a href="{{ url('lihatmhs' . $row->id) }}" class="nav-link">knadknan</a>
            @endforeach --}}
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>

                    <th>Name</th>
                    <th>Aksi</th>
                    <th>role</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>

                        <td>{{ $category->user->name }}</td>
                        <td> <a href="{{ url('lihatsyaratmhs' . $category->id) }}" class="btn btn-primary">Lihat
                                syarat
                            </a>
                            <a href="{{ url('delete/' . $category->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>{{ $category->role }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
        </section>
        </table>
    @endsection
