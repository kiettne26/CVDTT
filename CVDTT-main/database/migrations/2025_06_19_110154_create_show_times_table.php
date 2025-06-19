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
        Schema::create('show_times', function (Blueprint $table) {
            $table->id('showtimeId');
            $table->unsignedBigInteger('movieId');
            $table->string('date');
            $table->string('startTime');
            $table->unsignedBigInteger('roomId');

            $table->foreign('movieId')->references('movieId')->on('movies');
            $table->foreign('roomId')->references('roomId')->on('screening_rooms');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_times');
    }
};
