@extends('layouts.mhsapp')

@section('isi')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center" style="font-size: 22px"> <i class="nav-icon fas fa-edit"></i> Pengisian Rencana Studi</h3>
         
            
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <br>
            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <table id="table_mhs" class="display table-bordered table-responsive-sm-lg">

                    <thead>
                        <tr>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Daftar mata kuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawai as $p)
                        <tr>
                            {{-- nomer --}}

                            <td scope="row"> 
                                {{ $p->kode_matkul }}
                            </td>
                            {{-- daftar --}}

                            <td>
                             
                                    {{ $p->nama_matkul }}
                              
                            </td>
                            <td>
                               
                                    {{ $p->sks }}
                              
                            </td>
                            <td>

                                {{-- aksi --}}

                                <input type="checkbox" name="mata_kuliah[]" value="{{ $p->nama_matkul }}"></label>


                            </td>

                        </tr>
                        @endforeach

                        {{-- daftar --}}
                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>


                                <label for="exampleInputFile">Masukan bukti pembayaran</label>



                            </td>
                            <td>

                                {{-- aksi --}}
                                <div class="input-group">
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>


                            </td>
                            <td>
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tfoot>

                </table>
              
            </form>
        </div>
</section>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<script>
    //datatables
    $(document).ready( function () {
        $('#table_mhs').DataTable();
    } );
</script>

@endsection
</body>

</html>