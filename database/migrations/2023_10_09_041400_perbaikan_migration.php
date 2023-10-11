<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerbaikanMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_perbaikan', function (Blueprint $table) {
            $table->id();
            $table->longText('keterangan');
            // $table->string('kode_gejala')->nullable();
            // $table->foreign('kode_gejala')->references('kode_gejala')->on('db_gejala')->onDelete('cascade');
            $table->unsignedBigInteger('kode_konsultasi');
            $table->foreign('kode_konsultasi')->references('id')->on('db_konsultasi')->onDelete('cascade');
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
        Schema::dropIfExists('db_perbaikan');
    }
}
