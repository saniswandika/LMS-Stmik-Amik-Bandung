<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');
            $table->string('mata_kuliah');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->oneDelete('cascade'); 
            $table->string('file');
            $table->string('extension');
            $table->integer('size');
            $table->string('mime');
            $table->string('status');
            $table->unsignedBigInteger('nama_pembimbing');
            $table->foreign('nama_pembimbing')->references('id')->on('users')->oneDelete('cascade'); 
            $table->string('keterangan', 1000)->nullable();
            $table->string('konfirmasi', 50)->nullable();
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
        Schema::dropIfExists('media');
        // $table->dropForeign('nama_pembimbing');
    }
}
