<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class permintaan extends Model
{
    use HasFactory, SoftDeletes;

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

    protected $table = 'permintaan';
    protected $primaryKey = 'id'; // Atur primary key model sebagai 'id'
    public $incrementing = false; // Nonaktifkan incrementing karena menggunakan UUID
    protected $keyType = 'string'; 

}
