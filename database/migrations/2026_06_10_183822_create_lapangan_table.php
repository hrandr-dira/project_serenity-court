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
        Schema::create('lapangan', function (Blueprint $table) {
    $table->string('id_lapangan', 36)->primary();
    $table->string('nama_lapangan', 50);
    $table->enum('jenis_lapangan', [
        'Futsal',
        'Badminton',
        'Basket'
    ]);
    $table->text('deskripsi')->nullable();
    $table->text('fasilitas')->nullable();
    $table->decimal('harga_per_jam', 12, 2);
    $table->enum('status', [
        'Aktif',
        'Nonaktif',
        'Maintenance'
    ]);
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangan');
    }
};
