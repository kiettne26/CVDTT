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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerId');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('gender')->default('Nam');
            $table->string('dob')->nullable();
            $table->string('phone', 13)->nullable();

            $table->foreign('email')->references('email')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
