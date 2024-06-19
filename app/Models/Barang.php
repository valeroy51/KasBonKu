<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    use HasFactory;

    protected $fillable = [
       'nama',
       'barang',
       'harga',
       'prioritas',
       'link',
       'catatan',
       'created_at',
       'updated_at',
    ];
}
