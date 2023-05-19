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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('no_fj', 17)->primary();
            $table->string('kode_customer');
            $table->string('kode_wilayah');
            $table->string('kode_gudang');
            $table->bigInteger('kode_karyawan')->unsigned();
            $table->string('nomor_rangka');
            $table->string("dealer");
            $table->string('harga_terjual');
            $table->timestamps();

            $table->foreign('kode_customer')->references('kode_konsumen')->on('konsumen');
            $table->foreign('kode_karyawan')->references('id')->on('users');
            $table->foreign('nomor_rangka')->references('nomor_rangka')->on('barang');
            $table->foreign('kode_gudang')->references('kode_gudang')->on('gudang');
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
        Schema::dropIfExists('penjualan');
    }
};
