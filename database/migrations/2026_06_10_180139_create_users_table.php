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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user', 36)->primary();
            $table->string('nama_lengkap', 50);
            $table->string('email')->unique();
            $table->string('no_telepon', 15);
            $table->enum('peran', ['Admin', 'Customer']);
            $table->date('tanggal_daftar')->useCurrent();
            $table->enum('status_akun', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
