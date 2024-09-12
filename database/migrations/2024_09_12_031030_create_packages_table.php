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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Paket
            $table->foreignId('category_id')->constrained('categoris')->onDelete('cascade'); // Kategori
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade'); // Subkategori
            $table->date('departure_date'); // Tanggal Berangkat
            $table->date('return_date'); // Tanggal Pulang
            $table->string('departure_location'); // Lokasi Berangkat
            $table->string('destination_location'); // Lokasi Tujuan
            $table->string('airline'); // Nama Maskapai
            $table->text('description'); // Deskripsi
            $table->decimal('normal_price', 12, 2); // Harga Normal
            $table->integer('discount_percentage')->nullable(); // Diskon Persenan
            $table->decimal('discounted_price', 12, 2)->nullable(); // Harga Setelah Diskon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
