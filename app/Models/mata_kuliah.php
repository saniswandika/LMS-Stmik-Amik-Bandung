<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mata_kuliah extends Model
{
    use HasFactory;

        protected $table = "mata_kuliah";
        protected $guarded = ['id'];
        protected $fillable = [
            'kode_matkul',
            'nama_matkul',
            'sks',
            'created_at'
        ];

}
