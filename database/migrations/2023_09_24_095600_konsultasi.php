<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Konsultasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nrp');
            $table->foreign('nrp')->references('nrp')->on('users')->onDelete('cascade');
            $table->string('shift');
            $table->string('kode_reject')->nullable();
            $table->foreign('kode_reject')->references('id_reject')->on('db_reject')->onDelete('cascade');
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
        Schema::dropIfExists('db_konsultasi');
    }
}
