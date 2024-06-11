<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'noUrut', 
        'nama', 
        'email', 
        'kelas', 
        'create_at', 
        'updated_at',
    ];

    protected $table = 'siswa';
}
