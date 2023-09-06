<?php

// declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            // $table->string('id')->primary();
            $table->id();

            // your custom columns may go here

            $table->timestamps();
            $table->json('data')->nullable();

            $table->string('tenant_code')->unique();
            $table->boolean('active');
            $table->unsignedBigInteger('tema_id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('tema_id')->references('id')->on('temas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
