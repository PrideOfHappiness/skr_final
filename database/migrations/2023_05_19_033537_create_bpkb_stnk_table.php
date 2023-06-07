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
            $table->bigInteger('no_fj')->unsigned();
            $table->string('nomor_bpkb', 10)->nullable();
            $table->enum('status_bpkb', ['Sedang diadministrasikan', 'Selesai', 'Sudah diambil']);
            $table->enum('status_stnk_plat', ['Sedang diadministrasikan', 'Selesai', 'Sudah diambil']);
            $table->string('nama_pengambil_stnk')->nullable();
            $table->string('ktp_pengambil_stnk', 16)->nullable();
            $table->string('alamat_pengambil_stnk')->nullable();
            $table->timestamp('tgl_ambil_stnk_plat')->nullable();
            $table->timestamp('tgl_ambil_bpkb')->nullable();
            $table->bigInteger('karyawan_cetak_surat_bpkb')->unsigned()->nullable();
            $table->bigInteger('karyawan_cetak_surat_stnk')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('no_fj')->references('id')->on('penjualan');
            $table->foreign('karyawan_cetak_surat_bpkb')->references('id')->on('users');
            $table->foreign('karyawan_cetak_surat_stnk')->references('id')->on('users');
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
