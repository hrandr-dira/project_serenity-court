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
        Schema::create('pembayaran', function (Blueprint $table) {

    $table->string('id_pembayaran', 50)->primary();
    $table->string('id_reservasi', 50);
    $table->decimal('jumlah', 12, 2);
    $table->enum('metode_pembayaran', [
        'GoPay',
        'QRIS',
        'Dana',
        'Transfer Bank',
        'OVO'
    ]);
    $table->string('bukti_transfer')->nullable();
    $table->enum('status_pembayaran', [
        'Pending',
        'Terverifikasi',
        'Ditolak'
    ]);
    $table->date('tanggal_bayar');
    $table->string('diverifikasi_oleh', 36);
    $table->foreign('id_reservasi')
          ->references('id_reservasi')
          ->on('reservasi')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();
    $table->foreign('diverifikasi_oleh')
          ->references('id_user')
          ->on('users')
          ->restrictOnDelete()
          ->cascadeOnUpdate();
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
