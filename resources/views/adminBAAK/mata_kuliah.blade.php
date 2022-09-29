@extends('layouts.admapp')


@section('isi')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-list-alt"></i> Daftar Mata Kuliah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    </button>
                         <a href="{{ url('tambahmatkul') }}"><button type="button" class="btn btn-outline-primary" ><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Mata Kuliah</button></a>
                </div>
            </div>
            <br>
            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table id="table_matkul" class="display table-bordered" style="width= 100%">
                        <thead>
                            <tr>
                                <th scope="col">Kode Mata Kuliah</th>
                                <th scope="col">Daftar Mata Kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($matkul as $p)
                             <tr>
                                    {{-- nomer --}}
                                    <td> {{ $p->kode_matkul }}</td>
                                    {{-- daftar --}}
                                    <td>
                                            {{ $p->nama_matkul }}
                                    </td>
                                    <td>
                                            {{ $p->sks }}
                                    </td> 
                                    <td>
                                            {{ $p->Semester }}
                                    </td>
                                    <td>
                                            {{ $p->jurusan }}
                                    </td>
                                    <td>
                                            <a href="{{ url('/delete' . $p->kode_matkul) }}" class="btn btn-danger">Delete</a>                                 
                                    </td>
                                </tr>
                        @endforeach
                </tr>
                </tbody>
            </table>
            </form>
        </div>
</section>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<script>
    //datatables
    $(document).ready( function () {
        $('#table_matkul').DataTable();
    } );
</script>    
@endsection



{{-- <div class="container">
    @include('sweetalert::alert')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Masukan Mata Kuliah</div>
                <div class="card-body">
                    <div class="form-group">

                        <form method="POST" action="{{ url('inputmatakuliah') }}" enctype="multipart/form-data">
                            @csrf
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">kode matkul</label>
                                <input type="text" class="form-control" name="kode_matkul" id="kode_matkul"
                                    placeholder="Masukan kode matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">nama matkul</label>
                                <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Masukan nama matkul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">jumlah sks</label>
                                <input type="number" class="form-control" name="sks" id="sks"  placeholder="Masukan jumlah sks">
                            </div>
                         </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div> --}}
