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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticketId');
            $table->unsignedBigInteger('showtimeId');
            $table->unsignedBigInteger('movieId');
            $table->unsignedBigInteger('roomId');
            $table->string('seatNumber');
            $table->string('price');
            $table->string('status')->default('Còn trống'); // 'Còn trống', 'Đã đặt', 'Đã hủy'

            $table->foreign('showtimeId')->references('showtimeId')->on('show_times');
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
        Schema::dropIfExists('tickets');
    }
};
