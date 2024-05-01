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
            $table->id();
            $table->enum('metode', ['dompetku', 'COD']);
            $table->double('harga_total', 10, 2);
            $table->string('keterangan', 45);
            $table->unsignedBigInteger('pengiriman_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();

            $table->foreign('pengiriman_id')->references('id')->on('pengiriman')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
