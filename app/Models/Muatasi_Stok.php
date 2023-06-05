<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muatasi_Stok extends Model
{
    use HasFactory;
    protected $table = "mutasi_stok";
    protected $primaryKey = 'ID_MUTASI';
    protected $fillable = ['ID_MUTASI', 'ID_BARANG', 'ID_PENGIRIMAN', 'JUMLAH_MUTASI', 'KETERANGAN', 'TGL_MUTASI'];

    public $timestamps = false;
}
