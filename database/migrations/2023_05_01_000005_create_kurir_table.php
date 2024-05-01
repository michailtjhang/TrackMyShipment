<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kurir', 45);
            $table->string('nomor_telepon', 45)->nullable();
            $table->string('jadwal', 45)->nullable();
            $table->unsignedBigInteger('layanan_id');
            $table->timestamps();

            $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kurir');
    }
};
