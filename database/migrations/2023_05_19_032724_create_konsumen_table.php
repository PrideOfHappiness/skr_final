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
            $table->id();
            $table->string('kode_konsumen', 8);
            $table->string('nama');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->bigInteger('wilayah')->unsigned();
            $table->string('no_ktp', 16);
            $table->string('no_telp', 15);
            $table->string('namaFileKtp');
            $table->timestamps();

            $table->foreign('wilayah')->references('id')->on('wilayah');
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
