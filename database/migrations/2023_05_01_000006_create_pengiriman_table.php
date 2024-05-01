<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 45)->unique();
            $table->timestamp('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('lokasi_tujuan');
            $table->enum('status', ['penjemputan', 'pengiriman', 'terkirim']);
            $table->string('bukti_foto', 50)->nullable();
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('layanan_id');
            $table->unsignedBigInteger('penerima_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('cascade');
            $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
            $table->foreign('penerima_id')->references('id')->on('penerima')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
