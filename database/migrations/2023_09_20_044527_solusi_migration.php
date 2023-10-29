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
            $table->string('kode_penyebab')->primary();
            $table->string('kode_reject');
            $table->foreign('kode_reject')->references('kode_reject')->on('db_reject')->onDelete('cascade');
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
