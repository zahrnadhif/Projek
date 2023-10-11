<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GejalaRejectMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_reject_gejala', function (Blueprint $table) {
            $table->id();
            $table->boolean('keterangan')->default('0');
            $table->string('kode_gejala');
            $table->foreign('kode_gejala')->references('kode_gejala')->on('db_gejala')->onDelete('cascade');
            $table->string('kode_reject');
            $table->foreign('kode_reject')->references('kode_reject')->on('db_reject')->onDelete('cascade');
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
        Schema::dropIfExists('db_reject_gejala');
    }
}
