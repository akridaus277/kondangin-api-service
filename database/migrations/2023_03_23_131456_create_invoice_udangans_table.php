<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceUdangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_udangans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice')->unique();

            $table->double('sub_total');
            $table->double('diskon');
            $table->double('grand_total');
            
            $table->boolean('status');
            $table->string('bukti_bayar');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');


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
        Schema::dropIfExists('invoice_udangans');
    }
}
