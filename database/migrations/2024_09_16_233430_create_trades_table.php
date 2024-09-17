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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('symbol')->nullable();
            $table->string('amount')->nullable();
            $table->string('profit')->nullable();
            $table->string('date')->nullable();
            $table->string('trade_status')->nullable();
            $table->string('trade_type')->nullable();
            $table->string('trade_time')->nullable();
            $table->string('leverage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
