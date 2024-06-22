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
        Schema::table('bukti_bayar', function (Blueprint $table) {
            $table->string('status', 20)->default('pending')->after('notes'); // Menambah kolom status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukti_bayar', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
