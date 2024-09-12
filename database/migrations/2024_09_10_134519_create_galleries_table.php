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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(); // Field untuk menyimpan gambar
            $table->foreignId('category_id')->constrained('categoris')->onDelete('cascade'); // Relasi ke categories
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade'); // Relasi ke subcategories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
