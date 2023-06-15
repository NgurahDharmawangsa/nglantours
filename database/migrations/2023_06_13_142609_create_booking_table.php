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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->required();
            $table->string('number', 20)->required();
            $table->date('booking_date')->required();
            $table->integer('participants')->required();
            $table->integer('total_price')->required();
            $table->string('payment_proof')->nullable();
            $table->string('payment_method', 50)->nullable();
            $table->string('status')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
