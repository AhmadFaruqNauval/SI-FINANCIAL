<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = "pengiriman";
    protected $primaryKey = 'ID_PENGIRIMAN';
    protected $fillable = ['ID_PENGIRIMAN', 'ID_BARANG', 'ASAL', 'TUJUAN', 'ONGKOS_KIRIM', 'METODE_PENGIRIMAN','TGL_PENGIRIMAN', 'TGL_DITERIMA','STATUS'];
    public $timestamps = false;
}

