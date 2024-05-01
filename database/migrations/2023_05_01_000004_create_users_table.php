<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 45)->nullable();
            $table->string('username', 45);
            $table->string('email', 45)->unique();
            $table->string('password', 225);
            $table->string('remember_token', 100)->nullable();
            $table->enum('level', ['user', 'admin', 'kurir'])->default('user');
            $table->string('alamat', 45)->nullable();
            $table->string('foto', 45)->nullable();
            $table->unsignedBigInteger('dompet_id')->nullable();
            $table->timestamps();

            $table->foreign('dompet_id')->references('id')->on('dompet')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
