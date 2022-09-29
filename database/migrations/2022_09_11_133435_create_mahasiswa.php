<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('idnama');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('jeniskelamin');
            $table->string('agama');
            $table->integer('nik');
            $table->integer('nisn');
            $table->string('alamatasal');
            $table->string('alamatdomisili');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rtrw');
            $table->string('jenistinggal')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('beasiswa')->nullable();
            $table->string('namaayah');
            $table->date('ttlayah');
            $table->string('pendidikanayah');
            $table->string('pekerjaanayah');
            $table->string('penghasilanayah');
            $table->string('namaibu');
            $table->string('ttlibu');
            $table->string('pendidikanibu');
            $table->string('pekerjaanibu');
            $table->string('penghasilanibu');
            $table->string('namawali')->nullable();
            $table->string('ttlwali')->nullable();
            $table->string('pendidikanwali')->nullable();
            $table->string('pekerjaanwali')->nullable();
            $table->string('penghasilanwali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
