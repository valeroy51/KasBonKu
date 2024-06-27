<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bukti_bayar', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Menambahkan kolom status dengan nilai default 'pending'
        });
    }

    public function down()
    {
        Schema::table('bukti_bayar', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status jika rollback migrasi
        });
    }
};
