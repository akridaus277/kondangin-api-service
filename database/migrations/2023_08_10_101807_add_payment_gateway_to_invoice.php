<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentGatewayToInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_udangans', function (Blueprint $table) {
            $table->integer('bill_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('link_bayar')->nullable();
            $table->string('sender_bank')->nullable();
            $table->string('sender_bank_type')->nullable();
            $table->string('paid_at')->nullable();
            $table->dropColumn('bukti_bayar');
            $table->dropColumn('status');

        });
        Schema::table('invoice_udangans', function (Blueprint $table) {
            $table->string('status');        

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_undangas', function (Blueprint $table) {
            //
        });
    }
}
