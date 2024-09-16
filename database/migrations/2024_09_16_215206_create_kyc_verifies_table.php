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
        Schema::create('kyc_verifies', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('email')->nullable();
            $table->string('user_id')->nullable();
            $table->string('document_1')->nullable();
            $table->string('document_1_govt')->nullable();
            $table->string('document_1_image_front')->nullable();
            $table->string('document_1_image_back')->nullable();
            $table->string('document_1_no')->nullable();
            $table->string('document_1_name')->nullable();
            $table->string('ssn')->nullable();
            $table->string('document_2')->nullable();
            $table->string('document_2_name')->nullable();
            $table->string('address')->nullable();
            $table->string('document_2_image')->nullable();
            $table->string('document_2_exp_date')->nullable();
            $table->string('document_3_selfie')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_verifies');
    }
};
