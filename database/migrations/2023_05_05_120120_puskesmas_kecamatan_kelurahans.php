<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PuskesmasKecamatanKelurahans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskesmas_kecamatan_kelurahans', function (Blueprint $table) {
            $table->string('kode_kd')->primary(); // tambahkan -> unique() jika tidak boleh ada data yang sama atau harus beda
            $table->string('kelurahan');
            $table->string('kode_puskesmas');
            $table->string('nama_puskesmas');
            $table->string('kode_kecamatan');
            $table->string('nama_kecamatan');
            $table->string('kode_kelurahan');

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
        Schema::drop('puskesmas_kecamatan_kelurahans');
    }
}

