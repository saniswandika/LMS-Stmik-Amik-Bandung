@extends('layouts.admapp')


@section('isi')

<div class="container">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">


            <form action="{{ url('hasilcari-baak') }}" action="GET">
                {{ @csrf_field() }}
                <input type="text" name="npm" placeholder="Cari Berdasarkan NPM" class="form-control"><br>
                <input type="submit" class="btn btn-md btn-outline-primary">
            </form>
            <hr>
            {{-- @foreach ($article as $row)
            <a href="{{ url('lihatmhs' . $row->id) }}" class="nav-link">knadknan</a>
            @endforeach --}}

            <table class="table table-bordered text-black">
                <tr>
                    <th>No.</th>
                   
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Status Perwalian</th>
                    <th>Dosen wali</th>
                    <th>Biodata Mahasiswa</th>

                </tr>
                @php
                $no = 1;
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->npm }}</td>
                    <td>{{ $category->name }}</td>

                    <td>
                        <a href="{{ url('/lihatmhsbaak' . $category->id) }}" class="btn btn-success">Bukti Pembayaran</a>
                    </td>
                    <td>
                        <a href="{{ route('input_dosen_wali' , $category->id) }}" class="btn btn-primary">Pilih Dosen
                            Wali Mahasiswa</a>
                    </td>
                    <td>
                        <a href="/lihatbiodata/{{ $category->id }}" class="btn btn-info">Lihat Biodata</a>
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

            <li>nama pembimbing : {{$a->nama_pembimbing}}</li>

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