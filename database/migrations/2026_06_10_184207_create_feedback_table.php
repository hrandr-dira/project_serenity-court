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
        Schema::create('feedback', function (Blueprint $table) {

    $table->string('id_feedback', 50)->primary();
    $table->string('id_user', 36);
    $table->string('id_reservasi', 50);
    $table->integer('rating_bintang');
    $table->text('ulasan');
    $table->text('balasan_admin')->nullable();
    $table->date('tanggal_feedback');
    $table->foreign('id_user')
          ->references('id_user')
          ->on('users')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();
    $table->foreign('id_reservasi')
          ->references('id_reservasi')
          ->on('reservasi')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
