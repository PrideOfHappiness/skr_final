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
            $table->string('surat_jalan', 18)->unique();
            $table->bigInteger('no_fj')->unsigned();
            $table->bigInteger('karyawan_pengirim')->unsigned();
            $table->text('perlengkapan');
            $table->enum('status', ['PDI', 'Barang Sedang Dikirim', 'Selesai']);
            $table->timestamp('pdi_datetime')->nullable();
            $table->timestamp('shipping_datetime')->nullable();
            $table->timestamp('selesai_datetime')->nullable();
            $table->timestamps();

            $table->foreign('no_fj')->references('id')->on('penjualan');
            $table->foreign('karyawan_pengirim')->references('id')->on('users');
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
