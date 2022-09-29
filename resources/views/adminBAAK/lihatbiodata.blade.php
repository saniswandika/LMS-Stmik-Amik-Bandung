@extends('layouts.admapp')


@section('isi')


<section class="content">
    <div class="container center">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <h3 class="card-title text-center" style="font-size: 22px" style="font-family: Times New Roman"> <i
                    class="nav-icon fas fa-file-alt"></i> Biodata Mahasiswa </h3>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top: 25px;">
                    <div class="col-md-12">
                        
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
            @foreach($user as $bio)
            <img class="profile-user-img img-fluid img-circle" width="100px" height="100px"
                src="\{{ $bio->image }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $bio->name }}</h3>
                  <p class="text-muted text-center mt-2">{{ $bio->npm }}</p> 
        </div>
            @endforeach
            @foreach($biodata as $mhs)
        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Tempat Lahir</b>
                <p class="float-center">{{ $mhs->tempatlahir }}</p>
            </li>
            <li class="list-group-item">
                <b>Tanggal Lahir</b>
                <p class="float-center">{{ $mhs->tanggallahir }}</p>
            </li>
            <li class="list-group-item">
                <b>Jenis Kelamin</b>
                @if($mhs->jeniskelamin == '1')
                <p class="float-center">Laki - Laki</p>
                @else
                <p class="float-center">Perempuan</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Agama</b>
                @if($mhs->agama == '1')
                <p class="float-center">Islam</p>
                @elseif($mhs->agama == '2')
                <p class="float-center">Katholik</p>
                @elseif($mhs->agama == '3')
                <p class="float-center">Protestan</p>
                @elseif($mhs->agama == '4')
                <p class="float-center">Hindu</p>
                @elseif($mhs->agama == '5')
                <p class="float-center">Budha</p>
                @elseif($mhs->agama == '6')
                <p class="float-center">Kong Hu Cu</p>
                @else
                <p class="float-center">Kepercayaan Lainnya</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>NIK (Nomer Induk Kependudukan)</b>
                <p class="float-center">{{ $mhs->nik }}</p>
            </li>
            <li class="list-group-item">
                <b>NISN (Nomer Induk Siswa Nasional)</b>
                <p class="float-center">{{ $mhs->nisn }}</p>
            </li>
            <li class="list-group-item">
                <b>Alamat Asal</b>
                <p class="float-center">{{ $mhs->alamatasal }}</p>
            </li>
            <li class="list-group-item">
                <b>Alamat Domisili</b>
                <p class="float-center">{{ $mhs->alamatdomisili }}</p>
            </li>
            <li class="list-group-item">
                <b>Provinsi / Kota / Kecamatan / Kelurahan / RT / RW</b>
                <p class="float-center"> {{ $mhs->provinsi}} / {{ $mhs->kota}} / {{ $mhs->kecamatan}} / {{ $mhs->kelurahan}} / {{ $mhs->rtrw}} </p>
            </li>
            <li class="list-group-item">
                <b>Jenis Tinggal</b>
                @if($mhs->agama == '1')
                <p class="float-center">Bersama Orang Tua</p>
                @elseif($mhs->agama == '2')
                <p class="float-center">Bersama Wali</p>
                @elseif($mhs->agama == '3')
                <p class="float-center">Kost</p>
                @elseif($mhs->agama == '4')
                <p class="float-center">Asrama</p>
                @elseif($mhs->agama == '5')
                <p class="float-center">Panti Asuhan</p>
                @else
                <p class="float-center">Lainnya</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Alat Transportasi</b>
                @if($mhs->agama == '1')
                <p class="float-center">Jalan Kaki</p>
                @elseif($mhs->agama == '2')
                <p class="float-center">Angkutan Umum</p>
                @elseif($mhs->agama == '3')
                <p class="float-center">Sepeda Motor</p>
                @elseif($mhs->agama == '4')
                <p class="float-center">Mobil</p>
                @elseif($mhs->agama == '5')
                <p class="float-center">Ojek Online</p>
                @else
                <p class="float-center">Lainnya</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Penerima Beasiswa</b>
                @if($mhs->beasiswa == '1')
                <p class="float-center">Ya</p>
                @else
                <p class="float-center">Tidak</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Nama Ayah</b>
                <p class="float-center">{{ $mhs->namaayah }}</p>
            </li>
            <li class="list-group-item">
                <b>Tanggal Lahir Ayah</b>
                <p class="float-center">{{ $mhs->ttlayah }}</p>
            </li>
            <li class="list-group-item">
                <b>Jenjang Pendidikan Ayah</b>
                @if($mhs->pendidikanayah == '0')
                <p class="float-center">SD / Sederajat</p>
                @elseif($mhs->pendidikanayah == '1')
                <p class="float-center">SMP / Sederajat</p>
                @elseif($mhs->pendidikanayah == '2')
                <p class="float-center">SMA / Sederajat</p>
                @elseif($mhs->pendidikanayah == '3')
                <p class="float-center">Paket A</p>
                @elseif($mhs->pendidikanayah == '4')
                <p class="float-center">Paket B</p>
                @elseif($mhs->pendidikanayah == '5')
                <p class="float-center">Paket C</p>
                @elseif($mhs->pendidikanayah == '6')
                <p class="float-center">D1</p>
                @elseif($mhs->pendidikanayah == '7')
                <p class="float-center">D2</p>
                @elseif($mhs->pendidikanayah == '8')
                <p class="float-center">D3</p>
                @elseif($mhs->pendidikanayah == '9')
                <p class="float-center">S1</p>
                @elseif($mhs->pendidikanayah == '10')
                <p class="float-center">S2</p>
                @elseif($mhs->pendidikanayah == '11')
                <p class="float-center">S2 Terapan</p>
                @else
                <p class="float-center">S3</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Pekerjaan Ayah</b>
                @if($mhs->pekerjaanayah == '0')
                <p class="float-center">Tidak Bekerja</p>
                @elseif($mhs->pekerjaanayah == '1')
                <p class="float-center">Nelayan</p>
                @elseif($mhs->pekerjaanayah == '2')
                <p class="float-center">Petani</p>
                @elseif($mhs->pekerjaanayah == '3')
                <p class="float-center">Peternak</p>
                @elseif($mhs->pekerjaanayah == '4')
                <p class="float-center">PNS / TNI / Polri</p>
                @elseif($mhs->pekerjaanayah == '5')
                <p class="float-center">Karyawan Swasta</p>
                @elseif($mhs->pekerjaanayah == '6')
                <p class="float-center">Pedagang Kecil</p>
                @elseif($mhs->pekerjaanayah == '7')
                <p class="float-center">Pedagang Besar</p>
                @elseif($mhs->pekerjaanayah == '8')
                <p class="float-center">Wiraswasta</p>
                @elseif($mhs->pekerjaanayah == '9')
                <p class="float-center">Wirausaha</p>
                @elseif($mhs->pekerjaanayah == '10')
                <p class="float-center">Buruh</p>
                @elseif($mhs->pekerjaanayah == '11')
                <p class="float-center">Pensiunan</p>
                @elseif($mhs->pekerjaanayah == '12')
                <p class="float-center">Tim Ahli / Konsultan</p>
                @elseif($mhs->pekerjaanayah == '13')
                <p class="float-center">Pimpinan / Manajerial</p>
                @else
                <p class="float-center">Tenaga Pengajar / Instruktur / Fasilitator</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Penghasilan Ayah</b>
                @if($mhs->penghasilanayah == '0')
                <p class="float-center"><- Rp. 500,000</p>
                @elseif($mhs->penghasilanayah == '1')
                <p class="float-center">Rp. 500,000 - 999,999</p>
                @elseif($mhs->penghasilanayah == '2')
                <p class="float-center">Rp. 1,000,000 - 1,999,999</p>
                @elseif($mhs->penghasilanayah == '3')
                <p class="float-center">Rp. 2,000,000 - 4,999,999</p>
                @elseif($mhs->penghasilanayah == '4')
                <p class="float-center">Rp. 5,000,000 - 20,000,000</p>
                @else
                <p class="float-center">-> Rp. 20,000,000</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Nama Ibu</b>
                <p class="float-center">{{ $mhs->namaibu }}</p>
            </li>
            <li class="list-group-item">
                <b>Tanggal Lahir Ibu</b>
                <p class="float-center">{{ $mhs->ttlibu }}</p>
            </li>
            <li class="list-group-item">
                <b>Jenjang Pendidikan Ibu</b>
                @if($mhs->pendidikanibu == '0')
                <p class="float-center">SD / Sederajat</p>
                @elseif($mhs->pendidikanibu == '1')
                <p class="float-center">SMP / Sederajat</p>
                @elseif($mhs->pendidikanibu == '2')
                <p class="float-center">SMA / Sederajat</p>
                @elseif($mhs->pendidikanibu == '3')
                <p class="float-center">Paket A</p>
                @elseif($mhs->pendidikanibu == '4')
                <p class="float-center">Paket B</p>
                @elseif($mhs->pendidikanibu == '5')
                <p class="float-center">Paket C</p>
                @elseif($mhs->pendidikanibu == '6')
                <p class="float-center">D1</p>
                @elseif($mhs->pendidikanibu == '7')
                <p class="float-center">D2</p>
                @elseif($mhs->pendidikanibu == '8')
                <p class="float-center">D3</p>
                @elseif($mhs->pendidikanibu == '9')
                <p class="float-center">S1</p>
                @elseif($mhs->pendidikanibu == '10')
                <p class="float-center">S2</p>
                @elseif($mhs->pendidikanibu == '11')
                <p class="float-center">S2 Terapan</p>
                @else
                <p class="float-center">S3</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Pekerjaan Ibu</b>
                @if($mhs->pekerjaanibu == '0')
                <p class="float-center">Tidak Bekerja</p>
                @elseif($mhs->pekerjaanibu == '1')
                <p class="float-center">Nelayan</p>
                @elseif($mhs->pekerjaanibu == '2')
                <p class="float-center">Petani</p>
                @elseif($mhs->pekerjaanibu == '3')
                <p class="float-center">Peternak</p>
                @elseif($mhs->pekerjaanibu == '4')
                <p class="float-center">PNS / TNI / Polri</p>
                @elseif($mhs->pekerjaanibu == '5')
                <p class="float-center">Karyawan Swasta</p>
                @elseif($mhs->pekerjaanibu == '6')
                <p class="float-center">Pedagang Kecil</p>
                @elseif($mhs->pekerjaanibu == '7')
                <p class="float-center">Pedagang Besar</p>
                @elseif($mhs->pekerjaanibu == '8')
                <p class="float-center">Wiraswasta</p>
                @elseif($mhs->pekerjaanibu == '9')
                <p class="float-center">Wirausaha</p>
                @elseif($mhs->pekerjaanibu == '10')
                <p class="float-center">Buruh</p>
                @elseif($mhs->pekerjaanibu == '11')
                <p class="float-center">Pensiunan</p>
                @elseif($mhs->pekerjaanibu == '12')
                <p class="float-center">Tim Ahli / Konsultan</p>
                @elseif($mhs->pekerjaanibu == '13')
                <p class="float-center">Pimpinan / Manajerial</p>
                @else
                <p class="float-center">Tenaga Pengajar / Instruktur / Fasilitator</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Penghasilan Ibu</b>
                @if($mhs->penghasilanibu == '0')
                <p class="float-center"><- Rp. 500,000</p>
                @elseif($mhs->penghasilanibu == '1')
                <p class="float-center">Rp. 500,000 - 999,999</p>
                @elseif($mhs->penghasilanibu == '2')
                <p class="float-center">Rp. 1,000,000 - 1,999,999</p>
                @elseif($mhs->penghasilanibu == '3')
                <p class="float-center">Rp. 2,000,000 - 4,999,999</p>
                @elseif($mhs->penghasilanibu == '4')
                <p class="float-center">Rp. 5,000,000 - 20,000,000</p>
                @else
                <p class="float-center">-> Rp. 20,000,000</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Nama Wali</b>
                @if($mhs->namawali)
                <p class="float-center"></p>
                @else
                <p class="float-center">-</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Tanggal Lahir Wali</b>
                @if($mhs->ttlwali)
                <p class="float-center"></p>
                @else
                <p class="float-center">-</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Jenjang Pendidikan Wali</b>
                @if($mhs->pendidikanwali == '0')
                <p class="float-center">SD / Sederajat</p>
                @elseif($mhs->pendidikanwali == '1')
                <p class="float-center">SMP / Sederajat</p>
                @elseif($mhs->pendidikanwali == '2')
                <p class="float-center">SMA / Sederajat</p>
                @elseif($mhs->pendidikanwali == '3')
                <p class="float-center">Paket A</p>
                @elseif($mhs->pendidikanwali == '4')
                <p class="float-center">Paket B</p>
                @elseif($mhs->pendidikanwali == '5')
                <p class="float-center">Paket C</p>
                @elseif($mhs->pendidikanwali == '6')
                <p class="float-center">D1</p>
                @elseif($mhs->pendidikanwali == '7')
                <p class="float-center">D2</p>
                @elseif($mhs->pendidikanwali == '8')
                <p class="float-center">D3</p>
                @elseif($mhs->pendidikanwali == '9')
                <p class="float-center">S1</p>
                @elseif($mhs->pendidikanwali == '10')
                <p class="float-center">S2</p>
                @elseif($mhs->pendidikanwali == '11')
                <p class="float-center">S2 Terapan</p>
                @else
                <p class="float-center">-</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Pekerjaan Wali</b>
                @if($mhs->pekerjaanwali == '0')
                <p class="float-center">Tidak Bekerja</p>
                @elseif($mhs->pekerjaanwali == '1')
                <p class="float-center">Nelayan</p>
                @elseif($mhs->pekerjaanwali == '2')
                <p class="float-center">Petani</p>
                @elseif($mhs->pekerjaanwali == '3')
                <p class="float-center">Peternak</p>
                @elseif($mhs->pekerjaanwali == '4')
                <p class="float-center">PNS / TNI / Polri</p>
                @elseif($mhs->pekerjaanwali == '5')
                <p class="float-center">Karyawan Swasta</p>
                @elseif($mhs->pekerjaanwali == '6')
                <p class="float-center">Pedagang Kecil</p>
                @elseif($mhs->pekerjaanwali == '7')
                <p class="float-center">Pedagang Besar</p>
                @elseif($mhs->pekerjaanwali == '8')
                <p class="float-center">Wiraswasta</p>
                @elseif($mhs->pekerjaanwali == '9')
                <p class="float-center">Wirausaha</p>
                @elseif($mhs->pekerjaanwali == '10')
                <p class="float-center">Buruh</p>
                @elseif($mhs->pekerjaanwali == '11')
                <p class="float-center">Pensiunan</p>
                @elseif($mhs->pekerjaanwali == '12')
                <p class="float-center">Tim Ahli / Konsultan</p>
                @elseif($mhs->pekerjaanwali == '13')
                <p class="float-center">Pimpinan / Manajerial</p>
                @elseif($mhs->pekerjaanwali == '14')
                <p class="float-center">Tenaga Pengajar / Instruktur / Fasilitator</p>
                @else
                <p class="float-center">-</p>
                @endif
            </li>
            <li class="list-group-item">
                <b>Penghasilan Wali</b>
                @if($mhs->penghasilanwali == '0')
                <p class="float-center"><- Rp. 500,000</p>
                @elseif($mhs->penghasilanwali == '1')
                <p class="float-center">Rp. 500,000 - 999,999</p>
                @elseif($mhs->penghasilanwali == '2')
                <p class="float-center">Rp. 1,000,000 - 1,999,999</p>
                @elseif($mhs->penghasilanwali == '3')
                <p class="float-center">Rp. 2,000,000 - 4,999,999</p>
                @elseif($mhs->penghasilanwali == '4')
                <p class="float-center">Rp. 5,000,000 - 20,000,000</p>
                @elseif($mhs->penghasilanwali == '5')
                <p class="float-center">-> Rp. 20,000,000</p>
                @else
                <p class="float-center">-</p>
                @endif
            </li>
        </ul>
    </div>
</div>
</div>
</section>
    @endforeach
@endsection