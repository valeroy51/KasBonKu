<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'confirmed_by_admin',
    ];

    // Atau jika Anda ingin menetapkan atribut yang tidak dapat diisi (guarded)
    // protected $guarded = [];

    // Metode untuk mengakses tanggal secara langsung
    protected $dates = ['created_at', 'updated_at'];

    // Definisikan hubungan jika diperlukan
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
