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
        Schema::create('topup', function (Blueprint $table) {
            $table->id();
            $table->string('topup_no', 45)->nullable();
            $table->double('saldo', 10, 2);
            $table->double('bonus', 10, 2)->nullable();
            $table->string('topup_status', 45)->nullable();
            $table->timestamp('waktu')->useCurrent();
            $table->string('topup_token', 80)->nullable();
            $table->double('total', 10, 2)->nullable();
            $table->unsignedBigInteger('dompet_id');
            $table->timestamps();

            $table->foreign('dompet_id')->references('id')->on('dompet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topup');
    }
};
