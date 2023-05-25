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
            $table->id();
            $table->string('no_plat', 9)->unique();
            $table->bigInteger('kode_customer')->unsigned();
            $table->bigInteger('nomor_rangka')->unsigned();
            $table->string('nomor_bpkb', 10);
            $table->string('status_bpkb');
            $table->string('status_stnk_plat');
            $table->datetime('tgl_ambil_stnk_plat');
            $table->datetime('tgl_ambil_bpkb');
            $table->timestamps();

            $table->foreign('kode_customer')->references('id')->on('konsumen');
            $table->foreign('nomor_rangka')->references('id')->on('barang');
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
