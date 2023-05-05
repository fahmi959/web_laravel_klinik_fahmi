<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasienIms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_ims', function (Blueprint $table) {
        $table->id();
        // $table->id('nomer_id'); //tipe data id itu sudah menjadi primary key
        $table->double('no_cm');
        $table->string('nama');
        // $table->double('nik')->unique(); // kalau mau Unique tidak boleh sama
         $table->string('nik')->nullable();
        $table->date('tanggal_lahir');
        $table->date('tanggal_kunjungan');
        $table->text('alamat');
        $table->char('diagnosa', 255);
        $table->char('status')->nullable(); // nullable Artinya datanya boleh kosong
        $table->string('kelurahan');
        $table->char('jenis_kelamin')->nullable();
        $table->string('puskesmas');

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
        Schema::drop('pasien');
    }
}
