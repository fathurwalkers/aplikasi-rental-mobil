<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();

            $table->string('mobil_merk')->nullable();
            $table->string('mobil_kondisi')->nullable();
            $table->string('mobil_tipe_model')->nullable();
            $table->string('mobil_max_mil')->nullable();
            $table->string('mobil_tahun')->nullable();
            $table->string('mobil_jenis_transmisi')->nullable(); // AUTOMATIC / MANUAL / SEMI-AUTOMATIC
            $table->string('mobil_jenis_body')->nullable(); // COMPACT / CONVERTIBLE / COUPLE / MVP / OFF-ROAD / LAINNYA / SEDAN / SEDANO / STATION WAGON / SUV / TRANSPORTER / VAN
            $table->string('m')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobil');
    }
}
