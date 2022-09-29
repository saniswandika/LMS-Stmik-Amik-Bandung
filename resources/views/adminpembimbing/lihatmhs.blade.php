@extends('layouts.dsnapp')


@section('isi')


    <section class="content">
    <div class="container">
        
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    @include('sweetalert::alert')
                <h3 class="card-title text-center" style="font-size: 22px" style="font-family: Times New Roman"> <i
                        class="nav-icon fas fa-user"></i> Konformasi Perwalian </h3>
            

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">

                        </button>

                    </div>
                </div>
                
                @if (session()->has('message'))
                    <p>{{ session()->get('message') }}</p>
                @endif

                <table class="table-bordered" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center;" <th width="5%">No. </th>
                            <th style="text-align:center;" <th width="15%">Nama Mahasiswa</th>
                            <th style="text-align:center;" <th width="10%">Nomer Induk Mahasiswa (NPM)</th>
                            {{-- <th style="text-align:center;" align="left" width="10%">File</th> --}}
                            <th style="text-align:center;" align="left" width="10%">Mata Kuliah Yang Dikontrak</th>
                            <th style="text-align:center;" align="left" width="10%">Status Admin</th>

                            {{-- <th style="text-align:center;" width="10%">Download</th> --}}
                            <th style="text-align:center;" width="10%">Tindakan</th>

                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    <tbody>
                        @if ($medias->count())
                            @foreach ($medias as $media)

                                <tr>
                                    <td class="text-center">{{ $no++ }}.</td>
                                    <td class="text-center">{{ $media->user->name }}</td>
                                    <td class="text-center">{{ $media->user->npm }}</td>
                                    {{-- <td>
                                        <div>Nama: {{ $media->name }}</div>
                                        <div>File: {{ $media->file }}</div>
                                        <div>Ekstensi: {{ $media->extension }}</div>
                                        <div>Ukuran: {{ $media->size }}</div>
                                        <div>Mime: {{ $media->mime }}</div>
                                    </td> --}}
                                    <td>
                                        <div class="ml-3 mt-3 mb-3">{{ $media->mata_kuliah }}</div>
                                    </td>    
                                    <td align="center">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#DaftarNilai-{{ $media->id }}">
                                            {{ $media->status }}
                                        </button>
                                    </td>
                                    {{-- <td align="center">
                                        <a href="{{ url('uploads/' . $media->file) }}" download><button
                                                class="btn btn-info">Download</button></a>
                                    </td> --}}
                                    <td align="center">
                                        <a href="{{ url('form-syarat-pembimbing' . $media->id) }}"
                                            class="btn btn-primary ml-2 "> Konformasi</a>


                                    </td>

                                </tr>


                            @endforeach
                        @endif
                        @foreach ($medias as $data)
                            <tr>
                                <div class="modal fade" id="DaftarNilai-{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Status Perwalian
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('media.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Keterangan :</label>
                                                            <div class="input-group">
                                                                <textarea type="text" class="form-control"
                                                                    name="keterangan" id="keterangan" rows="5" disabled>{{ $data->keterangan }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dikonfirmasi Oleh :</label>
                                                            <div class="input-group">
                                                                <p type="text" class="form-control" name="keterangan"
                                                                    id="keterangan">{{ $data->konfirmasi }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Kembali</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tr>


                    </tbody>
            </div>
        </div>
</section>
</table>
@endsection


