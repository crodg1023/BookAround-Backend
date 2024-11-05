<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comercio_id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->datetime('date_time');
            $table->integer('people');
            $table->string('reservation_email');
            $table->string('status');
            $table->timestamps();
            $table->foreign('comercio_id')->references('id')->on('comercios')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
