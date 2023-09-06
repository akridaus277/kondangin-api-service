<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_acaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('zona_waktu');
            $table->string('tempat');
            $table->string('alamat');
            $table->string('link_map');
            $table->boolean('main_event');
            $table->timestamps();

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
        Schema::dropIfExists('sub_acaras');
    }
}
