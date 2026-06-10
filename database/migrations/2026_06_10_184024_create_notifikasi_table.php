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
        Schema::create('notifikasi', function (Blueprint $table) {

    $table->string('id_notifikasi', 50)->primary();
    $table->string('id_user', 36);
    $table->string('judul', 100);
    $table->text('pesan');
    $table->enum('tipe_notifikasi', [
        'Pembayaran',
        'Reminder',
        'Booking',
        'Sistem'
    ]);
    $table->enum('status_baca', [
        'Dibaca',
        'Belum Dibaca'
    ]);
    $table->date('tanggal_kirim');
    $table->foreign('id_user')
          ->references('id_user')
          ->on('users')
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
        Schema::dropIfExists('notifikasi');
    }
};
