<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "supplier";
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['ID_SUPPLIER','ID_BARANG', 'NAMA', 'ALAMAT', 'NO_TELP', 'JUMLAH_BARANG', 'TGL_SUPPLY', 'HARGA_SUPPLY'];

    public $timestamps = false;
}
