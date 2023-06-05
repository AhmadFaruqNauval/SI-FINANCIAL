<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_Barang extends Model
{
    use HasFactory;
    protected $table = "stok_barang";
    protected $primaryKey = 'ID_STOK_BARANG';
    protected $fillable = ['ID_STOK_BARANG','JUMLAH_STOK', 'SATUAN', 'SUPPLIER'];
    public $timestamps = false;
}
