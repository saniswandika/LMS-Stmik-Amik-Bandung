@extends('layouts.admapp')

@section('isi')

<div class="container">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
                @include('sweetalert::alert')
            <h3 class="card-title text-center mt-2 mb-3" style="font-size: 22px"> <i class="nav-icon fas fa-info"></i> Pengumuman </h3>
            <div class="card-tools mt-2 mb-4">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                </button>
                     <a href="{{ url('tambahpengumuman') }}"><button type="button" class="btn btn-outline-primary" ><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Pengumuman</button></a>
              
            </div>
            <table class="table table-bordered text-black">
                <tr>
                    <th>No.</th>
                    <th>Pengumuman</th>
                    <th class="text-center">Foto</th>
                    <th>Opsi</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach($pengumuman as $input)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $input->pengumuman }}</td>
                    <td><center><img src="\{{ $input->image }}" style="max-height: 400px; max-width: 400px;" ></center></td>
                    <td>
                        <a href="/deletepengumuman/{{ $input->id }}" class="btn btn-danger" role="alert" onclick="javascript:return confirm('Anda Yakin Menghapus Pengumuan ini ?');" >Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        </table>
        <ul>
        </ul>
@endsection

