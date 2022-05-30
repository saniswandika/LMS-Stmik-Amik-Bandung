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
                {{-- <a href="{{ url('pembimbing') }}" class="nav-link">

                    <p>
                        lihat data mahasiswa

                    </p> --}}
                @csrf
            </a>

        @endguest
    </li>
    </nav>
@endsection
<div class="container">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">


            <form action="{{ url('hasilcari-baak') }}" action="GET">
                {{ @csrf_field() }}
                <input type="text" name="name" placeholder="Ingin mencari apa ?" class="form-control"><br>
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
                    <th>mahasiswa</th>
                    <th>Dosen wali</th>
               
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>

                        <td>{{ $category->name }}</td>
                      
                        <td> 
                            <a href="{{ url('/lihatmhsbaak' . $category->id) }}" class="btn btn-primary">Lihat Perwalian</a>
                        </td>   
                        <td>
                                <a href="{{ route('input_dosen_wali' , $category->id) }}" class="btn btn-primary">Input Dosen Wali Mahasiswa</a>
                        </td>
                     
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
        </section>
        </table>

        <ul>
           {{-- @foreach ($user_post as $a)
                            
                            <li>nama pembimbing :   {{$a->nama_pembimbing}}</li>
                           
                            @foreach ($a->media_user as $tag )
                                 <td></td>
                                 <td>{{ $tag->name}}</td>
                            @endforeach
            @endforeach
                    </ul>
                    <ul>
                 --}}
                                
                
        </ul>
    @endsection
