@extends('layouts.mhsapp')

@section('isi')


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>

<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" type="text/css" href={{
    asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/jqvmap/jqvmap.min.css') }}>


<link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css?v=3.2.0') }}>

<link rel="stylesheet" type="text/css" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>

<link rel="stylesheet" src={{ asset('plugins/daterangepicker/daterangepicker.css') }}>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  

<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center" style="font-size: 22px"> <i class="nav-icon fas fa-newspaper"></i>  Kurikulum </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <br>
            
            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <form method="POST" action="{{ route('kurikulum') }}">
                    <div class="dropdown mb-3">
                        <select id="filter" class="form-control form-control-select ml-3" style="max-width : 250px;" aria-labelledby="dropdownMenuLink">
                            <option class="dropdown-item" value="0">--Pilih Program Studi--</option>
                            <option class="dropdown-item" value="IF">Teknik Informatika</option>
                            <option class="dropdown-item" value="SI">Sistem Informasi</option>
                        </select>
            </div> 
                </form>
                <table id="table_kurikulum" class="display table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Daftar Mata Kuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $p)
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
    $('#table_kurikulum').DataTable();
} );

$('#filter').change(function(){
  var filter=$(this).val();
  var table=$('#table_kurikulum').DataTable();
  table.column(4).search(filter).draw();
});
</script>
@endsection
</body>
</html>