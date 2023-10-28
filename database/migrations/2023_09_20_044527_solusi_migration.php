<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolusiMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_penyebab', function (Blueprint $table) {
            $table->string('id_penyebab')->primary();
            $table->string('kode_gejala');
            $table->foreign('kode_gejala')->references('kode_gejala')->on('db_gejala')->onDelete('cascade');
            $table->string('penyebab');
            $table->string('solusi');
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
        Schema::dropIfExists('db_solusi');
    }
}
