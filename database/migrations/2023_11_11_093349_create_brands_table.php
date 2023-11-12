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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('titel')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('modtype')->nullable();
            $table->string('chtype')->nullable();
            $table->string('vcap')->nullable();
            $table->string('numcl')->nullable();
            $table->string('weight')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
