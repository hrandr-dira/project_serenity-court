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
        // Schema::create('reservasi', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::create('reservasi', function (Blueprint $table) {

            $table->string('id_reservasi', 50)->primary();

            $table->string('id_user', 36);
            $table->string('id_lapangan', 36);
            $table->string('id_jadwal', 50);

            $table->date('tanggal_reservasi');
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->decimal('total_harga', 12, 2);

            $table->enum('status_reservasi', [
                'Pending',
                'Direservasi',
                'Selesai',
                'Dibatalkan'
            ]);

            $table->dateTime('tanggal_dibuat');

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_lapangan')
                ->references('id_lapangan')
                ->on('lapangan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwal')
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
        Schema::dropIfExists('reservasi');
    }
};
