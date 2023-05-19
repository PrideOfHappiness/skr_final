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
        Schema::create('bpkb_stnk', function (Blueprint $table) {
            $table->string('no_plat', 9)->primary();
            $table->string('kode_customer');
            $table->string('nomor_rangka');
            $table->string('nomor_bpkb', 10);
            $table->string('status_bpkb');
            $table->string('status_stnk_plat');
            $table->datetime('tgl_ambil_stnk_plat');
            $table->datetime('tgl_ambil_bpkb');
            $table->timestamps();

            $table->foreign('kode_customer')->references('kode_konsumen')->on('konsumen');
            $table->foreign('nomor_rangka')->references('nomor_rangka')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpkb_stnk');
    }
};
