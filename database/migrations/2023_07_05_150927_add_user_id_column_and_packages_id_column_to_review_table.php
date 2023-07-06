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
        Schema::table('review', function (Blueprint $table) {
            $table->unsignedBigInteger('packages_id')->after('id')->required();
            $table->foreign('packages_id')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->after('id')->required();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['packages_id']);
            $table->dropColumn('packages_id');
        });
    }
};
