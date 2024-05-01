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
        Schema::create('potong_saldo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_id');
            $table->unsignedBigInteger('dompet_id');
            $table->double('jumlah_potong', 10, 2);
            $table->timestamps();

            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('cascade');
            $table->foreign('dompet_id')->references('id')->on('dompet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potong_saldo');
    }
};
