<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->id();
            $table->double('saldo', 10, 2);
            $table->integer('bonus');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dompet');
    }
};
