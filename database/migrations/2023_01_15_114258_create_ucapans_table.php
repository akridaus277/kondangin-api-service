<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUcapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('kalimat');
            $table->enum('konfirmasi', ['Hadir', 'Belum Pasti', 'Tidak Hadir']);
            $table->timestamps();

            $table->unsignedBigInteger('tamu_id');
            $table->foreign('tamu_id')->references('id')->on('tamus')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ucapans');
    }
}
