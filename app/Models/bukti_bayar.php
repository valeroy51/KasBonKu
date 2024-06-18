<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti_bayar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',  
        'kelas', 
        'harga',
        'metode', 
        'tanggal',
        'notes',
        'created_at',
        'updated_at',
    ];

    protected $table = 'bukti_bayar';
}
