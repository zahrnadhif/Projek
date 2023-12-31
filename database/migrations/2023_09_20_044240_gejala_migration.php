<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GejalaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_gejala', function (Blueprint $table) {
            $table->string('kode_gejala')->primary();
            $table->string('nama');
            $table->string('gambar')->nullable();
            // $table->string('kode_solusi');
            // $table->foreign('kode_solusi')->references('id_solusi')->on('db_solusi')->onDelete('cascade');
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
        Schema::dropIfExists('db_gejala');
    }
}
