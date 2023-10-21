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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('product')->nullable();
            $table->string('gtnum')->nullable();
            $table->string('plantkey')->nullable();
            $table->string('soldp')->nullable();
            $table->string('shipp')->nullable();
            $table->string('bildoc')->nullable();
            $table->string('bildt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
