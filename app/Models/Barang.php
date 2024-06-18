<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'barang',
        'nama',
        'prioritas',
        'create_at',
        'update_at',
    ];

    protected $table = 'barang';
}
