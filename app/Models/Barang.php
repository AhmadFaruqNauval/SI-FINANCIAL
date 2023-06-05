<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $primaryKey = 'ID_BARANG';
    protected $fillable = ['ID_BARANG', 'ID_KATAGORI_BARANG', 'ID_STOK_BARANG', 'ID_GUDANG', 'NAMA', 'HARGA', 'TGL_MASUK', 'TGL_KELUAR', 'DESKRIPSI', 'FOTO', 'Status'];

    public $timestamps = false;
}
