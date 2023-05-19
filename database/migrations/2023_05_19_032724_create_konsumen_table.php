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
        Schema::create('konsumen', function (Blueprint $table) {
            $table->string('kode_konsumen', 8)->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('wilayah');
            $table->string('no_ktp', 16);
            $table->string('no_telp', 15);
            $table->string('namaFileKtp');
            $table->timestamps();

            $table->foreign('wilayah')->references('kode_wilayah')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen');
    }
};
