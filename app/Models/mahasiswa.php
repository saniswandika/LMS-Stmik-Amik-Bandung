<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $guarded = ['id'];
    protected $fillable = [
            'idnama',
            'tempatlahir',
            'tanggallahir',
            'jeniskelamin',
            'agama',
            'nik',
            'nisn',
            'alamatasal',
            'alamatdomisili',
            'provinsi',
            'kota',
            'kecamatan',
            'kelurahan',
            'rtrw',
            'jenistinggal',
            'transportasi',
            'beasiswa',
            'namaayah',
            'ttlayah',
            'pendidikanayah',
            'pekerjaanayah',
            'penghasilanayah',
            'namaibu',
            'ttlibu',
            'pendidikanibu',
            'pekerjaanibu',
            'penghasilanibu',
            'namawali',
            'ttlwali',
            'pendidikanwali',
            'pekerjaanwali',
            'penghasilanwali'
    ];
}
