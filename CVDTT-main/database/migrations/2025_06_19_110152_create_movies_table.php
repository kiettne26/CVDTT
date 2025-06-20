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
        Schema::create('movies', function (Blueprint $table) {
            $table->id("movieId");
            $table->string("title");
            $table->string("director");
            $table->string("genre");
            $table->string("duration");
            $table->string("releaseDate");
            $table->string("description");
            $table->string("status");
            $table->string("poster");
            $table->string('poster_original_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        }); 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
