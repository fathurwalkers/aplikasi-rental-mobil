<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();

            $table->text('kendaraan_deskripsi')->nullable();
            $table->string('kendaraan_tipe')->nullable(); // MOBIL - MOTOR
            $table->string('kendaraan_merk')->nullable();
            $table->string('kendaraan_kondisi')->nullable(); // BAIK / RUSAK / DALAM PERBAIKAN
            $table->string('kendaraan_max_mil')->nullable();
            $table->string('kendaraan_tahun')->nullable();
            $table->string('kendaraan_jenis_transmisi')->nullable(); // AUTOMATIC / MANUAL / SEMI-AUTOMATIC
            $table->string('kendaraan_jenis_body')->nullable(); // COMPACT / CONVERTIBLE / COUPLE / MVP / OFF-ROAD / LAINNYA / SEDAN / SEDANO / STATION WAGON / SUV / TRANSPORTER / VAN

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
