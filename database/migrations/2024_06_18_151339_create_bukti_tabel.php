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
        Schema::create('bukti_bayar', function (Blueprint $table){
            $table->id();
            $table->String('nama');
            $table->String('kelas');
            $table->integer('harga');
            $table->String('metode');
            $table->String('tanggal');
            $table->String('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_bayar');
    }

    public function confirm(): void {
        echo "Migration bukti_bayar created successfully!";
    }
};
