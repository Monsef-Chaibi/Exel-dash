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
        Schema::create('contrat_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nat')->nullable();
            $table->string('nat_id')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('wornum')->nullable();
            $table->string('activity')->nullable();
            $table->string('mobnum')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_users');
    }
};
