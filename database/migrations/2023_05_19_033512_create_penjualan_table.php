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
            $table->id();
            $table->string('no_fj', 17);
            $table->bigInteger('kode_customer')->unsigned();
            $table->bigInteger('kode_wilayah')->unsigned();
            $table->bigInteger('kode_gudang')->unsigned();
            $table->bigInteger('kode_karyawan')->unsigned();
            $table->bigInteger('nomor_rangka')->unsigned();
            $table->string("dealer");
            $table->string('harga_terjual');
            $table->string('jenis_bayar', 30);
            $table->timestamps();

            $table->foreign('kode_customer')->references('id')->on('konsumen');
            $table->foreign('kode_karyawan')->references('id')->on('users');
            $table->foreign('nomor_rangka')->references('id')->on('barang');
            $table->foreign('kode_gudang')->references('id')->on('gudang');
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
        Schema::dropIfExists('penjualan');
    }
};
