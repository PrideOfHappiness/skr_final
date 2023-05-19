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
            $table->string('surat_jalan')->primary();
            $table->string('kode_customer');
            $table->string('kode_wilayah');
            $table->bigInteger('kode_karyawan_pengirim')->unsigned();
            $table->string('nomor_rangka');
            $table->string('perlengkapan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('kode_customer')->references('kode_konsumen')->on('konsumen');
            $table->foreign('kode_karyawan_pengirim')->references('id')->on('users');
            $table->foreign('nomor_rangka')->references('nomor_rangka')->on('barang');
            $table->foreign('kode_wilayah')->references('kode_wilayah')->on('wilayah');
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
