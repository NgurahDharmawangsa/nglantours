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
        Schema::create('destination_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destination')->onDelete('cascade');
            $table->unsignedBigInteger('packages_id');
            $table->foreign('packages_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_packages');
    }
};
