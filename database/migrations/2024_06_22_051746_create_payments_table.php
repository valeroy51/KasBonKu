<?php

use App\Models\Payment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Contoh migrasi untuk tabel payments
public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('harga');
        $table->boolean('confirmed_by_admin')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }

    public function index()
    {
        $payments = Payment::where('confirmed_by_admin', true)->get();

        return view('home', compact('payments'));
    }
};
