@extends('layouts.dsnapp')


@section('isi')



<div class="container">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">


            {{-- <form action="{{ url('hasilcari') }}" action="GET">
                {{ @csrf_field() }}
                <input type="text" name="npm" placeholder="cari mahasiswa wali" class="form-control"><br>
                <input type="submit" class="btn btn-md btn-outline-primary">
            </form> --}}
            <hr>
            {{-- @foreach ($article as $row)
                <a href="{{ url('lihatmhs' . $row->id) }}" class="nav-link">knadknan</a>
            @endforeach --}}
            <table class="table table-bordered text-black">
                <tr>
                    <th>No.</th>

                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $category->user->npm }}</td>
                        <td>{{ $category->user->name }}</td>
                        <td> <a href="{{ url('lihatsyaratmhs' . $category->id) }}" class="btn btn-primary">Lihat
                                Persyaratan
                            </a>
                            {{-- <a href="{{ url('delete/' . $category->id) }}" class="btn btn-danger">Delete</a> --}}
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
    </table>  
    </section>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    
    <script>
        //datatables
        $(document).ready( function () {
            $('#table_cari').DataTable();
        } );
    </script>
        
@endsection

   
