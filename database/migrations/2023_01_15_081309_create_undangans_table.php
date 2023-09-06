<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     Schema::create('undangans', function (Blueprint $table) {
    //         // $table->id();
    //         // $table->string('kode_undangan')->unique();
    //         // $table->timestamps();

    //         // $table->unsignedBigInteger('tema_id');
    //         // $table->unsignedBigInteger('paket_id');
    //         // $table->unsignedBigInteger('user_id');
    //         // $table->foreign('user_id')->references('id')->on('users');
    //         // $table->foreign('paket_id')->references('id')->on('pakets');
    //         // $table->foreign('tema_id')->references('id')->on('temas');

    //         $table->string('id')->primary();

    //         // your custom columns may go here

    //         $table->timestamps();
    //         $table->json('data')->nullable();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('undangans');
    // }
}
