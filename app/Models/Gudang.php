<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "gudang";
    protected $primaryKey = 'ID_GUDANG';
    protected $fillable = ['ID_GUDANG', 'ID_BARANG', 'NAMA', 'DESKRIPSI', 'ALAMAT', 'KAPASITAS', 'TGL_BARANG_MASUK', 'TGL_BARANG_KELUAR'];
    public $timestamps = false;
}
