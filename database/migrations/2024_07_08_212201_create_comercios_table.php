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
        Schema::create('comercios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('pictures')->nullable();
            $table->integer('price')->nullable();
            $table->time('starting_hour')->nullable();
            $table->time('closing_hour')->nullable();
            $table->longText('description')->nullable();
            $table->double('score')->nullable();
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comercios');
    }
};
