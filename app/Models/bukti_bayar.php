<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti_bayar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
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
    protected $primaryKey = 'id'; // Atur primary key model sebagai 'id'
    public $incrementing = false; // Nonaktifkan incrementing karena menggunakan UUID
    protected $keyType = 'string'; 
}
