<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_tema', function (Blueprint $table) {
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('tema_id');
            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('tema_id')->references('id')->on('temas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_tema');
    }
}
