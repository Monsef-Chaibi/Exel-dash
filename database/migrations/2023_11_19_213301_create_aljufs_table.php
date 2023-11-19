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
        Schema::create('aljufs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();

        });
        // Set the timezone for created_at and updated_at columns
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aljufs');
    }
};
