@extends('layouts.adminapp')

@section('isi')
@section('sana')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
<link rel="stylesheet" type="text/css" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>

<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href={{ asset('plugins/jqvmap/jqvmap.min.css') }}>


<link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css?v=3.2.0') }}>

<link rel="stylesheet" type="text/css" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>

<link rel="stylesheet" src={{ asset('plugins/daterangepicker/daterangepicker.css') }}>


    @guest
        @if (Route::has('login'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   with font-awesome or any other icon font library -->
        @endif
        <li class="nav-item menu-open">
        @else
            <a href="{{ url('lihat') }}" class="nav-link active">
                <p> 
                 <i class="nav-icon fa fa-eye"></i> Hasil Input perwalian
                </p>
                
                
                <a href="{{ url('/home') }}" class="nav-link active">

                    <p> 
    
                        <i class="nav-icon 	fa fa-home"></i> Profile mahasiswa
                       </p>
                    @csrf
                </a>
    
            @endguest
    </li>
    </nav>

@endsection

<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title">Input data perwalian</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <br>
            <form action="{{ route('media.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered" style="width= 100%">
                
                        <thead>
                            <tr>
                                <th scope="col">kode mata kuliah</th>
                                <th scope="col">Daftar mata kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pegawai as $p)
                             <tr>
                                    {{-- nomer --}}
                                    
                                    <th scope="row "> {{ $p->kode_matkul }}</th>
                                    {{-- daftar --}}
                                    
                                    <td>
                                            <label>
                                            {{ $p->nama_matkul }}
                                        </td>
                                        <td>
                                            <label>
                                            {{ $p->sks }}
                                        </td>
                                    <td>
                                    <div>
                                        {{-- aksi --}}
                                        
                                        <input type="checkbox" name="mata_kuliah[]" value=" {{ $p->nama_matkul }}"></label>

                                       
                                    </td>
                           
                            </tr>
                        @endforeach
              
                       {{-- daftar --}}
                    
                         <td>
                        
                                <div class="form-group">
                                    <label for="exampleInputFile">Masukan bukti pembayaran</label>
                                   


                        </td>
                    <td>
                        <div>
                          {{-- aksi --}}
                          <div class="input-group">
                            <input type="file" class="form-control" name="file" id="file">
                        </div>

                       
                    </td>
                </tr>
                </tbody>
           
            </table>
               
            <div >
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
            </form>
        </div>
</section>
<!-- Default box -->



</body>

</html>
@endsection
