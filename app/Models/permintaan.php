<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class permintaan extends Model
{
    use HasFactory, SoftDeletes, Sortable;

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

    public $sortable =[
        'nama',
        'harga',
        'prioritas',
    ];

    protected $table = 'permintaan';
    protected $primaryKey = 'id'; // Atur primary key model sebagai 'id'
    public $incrementing = false; // Nonaktifkan incrementing karena menggunakan UUID
    protected $keyType = 'string';

    public function setCatatanAttribute($value)
    {
        $this->attributes['catatan'] = $value ?: '-';
    }

    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = preg_replace('/[^\d]/', '', $value);
    }

    public function getHargaAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
