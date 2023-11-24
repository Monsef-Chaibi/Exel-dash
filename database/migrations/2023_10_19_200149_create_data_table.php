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
            $table->string('desc')->nullable();
            $table->string('plantkey')->nullable();
            $table->string('soldp')->nullable();
            $table->string('shipp')->nullable();
            $table->string('bildoc')->nullable();
            $table->string('bildt')->nullable();
            $table->string('vin')->nullable();
            $table->string('color')->nullable();
            $table->string('amount')->nullable();
            $table->string('nameuser')->nullable();
            $table->timestamp('dateset')->nullable();
            $table->string('status')->nullable();
            $table->string('user2')->nullable();
            $table->timestamp('dateuser2')->nullable();
            $table->string('stuser2')->nullable();
            $table->string('usercheck')->nullable();
            $table->string('check')->nullable();
            $table->timestamp('datecheck')->nullable();
            $table->string('removeby')->nullable();
            $table->string('remove')->nullable();
            $table->string('dateremove')->nullable();
            $table->string('reason')->nullable();
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
