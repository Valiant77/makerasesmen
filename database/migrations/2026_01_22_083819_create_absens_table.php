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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('email')->required();
            $table->date('tanggal')->required();
            $table->string('name')->required();
            $table->enum('status', ['Hadir', 'Telat', 'Hadir Telat', 'Izin'])->required();
            $table->text('alasan')->required();
            $table->string('long')->required();
            $table->string('lat')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
