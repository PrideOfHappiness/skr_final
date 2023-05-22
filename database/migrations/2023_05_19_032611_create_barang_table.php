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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('nomor_rangka', 17)->primary();
            $table->string('nomor_mesin', 12)->unique();
            $table->string('kode_barang', 25);
            $table->string('nama_barang', 100);
            $table->string('jenis');
            $table->string('warna');
            $table->string('tahun_rakit');
            $table->string('status');
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
        Schema::dropIfExists('barang');
    }
};
