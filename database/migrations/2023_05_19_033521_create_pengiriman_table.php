<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('surat_jalan')->unique();
            $table->bigInteger('kode_customer')->unsigned();
            $table->bigInteger('kode_wilayah')->unsigned();
            $table->bigInteger('kode_karyawan_pengirim')->unsigned();
            $table->bigInteger('nomor_rangka')->unsigned();
            $table->text('perlengkapan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('kode_customer')->references('id')->on('konsumen');
            $table->foreign('kode_karyawan_pengirim')->references('id')->on('users');
            $table->foreign('nomor_rangka')->references('id')->on('barang');
            $table->foreign('kode_wilayah')->references('id')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
};
