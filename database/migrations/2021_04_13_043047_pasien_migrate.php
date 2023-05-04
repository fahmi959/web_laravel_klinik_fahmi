<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasienMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pasien', function (Blueprint $table) {

        $table->id();
        $table->string('nama');
        $table->string('penyakit');
        $table->string('telepon');
        $table->text('alamat');
        $table->date('tanggal_lahir');
        $table->date('tanggal_masuk');
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
