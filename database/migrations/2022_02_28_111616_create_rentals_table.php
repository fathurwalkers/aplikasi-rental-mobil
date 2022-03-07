<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->id();

            $table->string('rental_kode')->nullable();
            $table->dateTime('rental_waktu_pemesanan')->nullable();
            $table->string('rental_durasi')->nullable();
            $table->string('rental_satuan_waktu')->nullable();
            $table->string('rental_status')->nullable(); // Ready - Pending - Berlangsung
            $table->string('rental_bukti_ktp')->nullable();
            $table->string('rental_bukti_lain')->nullable();

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data_pengguna')->onDelete('cascade');

            $table->unsignedBigInteger('kendaraan_id')->nullable()->default(null);
            $table->foreign('kendaraan_id')->references('id')->on('kendaraan')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rental');
    }
}
