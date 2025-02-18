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
        //
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table ->timestamps();
        });

        Schema::create('product_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_list');
        Schema::dropIfExists('categories');
        Schema::table('categories', function (Blueprint $table) {
            $table->dropTimestamps(); // ลบคอลัมน์ created_at และ updated_at
        });
    }
};