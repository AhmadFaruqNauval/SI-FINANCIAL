<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $primaryKey = 'ID_TRANSAKSI';
    protected $fillable = ['ID_TRANSAKSI','ID_OUTLET', 'ID_PENGIRIMAN', 'ID_BARANG', 'ID_PEGAWAI', 'JUMLAH_BARANG', 'TOTAL_HARGA', 'METODE_BAYAR', 'KETERANGAN', 'TGL_TRANSAKSI'];
    public $timestamps = false;
}
