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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('iditem')->nullable();
            $table->string('status')->nullable();
            $table->string('paidby')->nullable();
            $table->timestamp('datepaid')->nullable();
            $table->string('approvedby')->nullable();
            $table->timestamp('approveddate')->nullable();
            $table->string('passedby')->nullable();
            $table->timestamp('passeddate')->nullable();
            $table->string('rejectedby')->nullable();
            $table->timestamp('rejecteddate')->nullable();
            $table->string('uploadedby')->nullable();
            $table->timestamp('uploadeddate')->nullable();
            $table->string('repaymentby')->nullable();
            $table->timestamp('repaymentdate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
