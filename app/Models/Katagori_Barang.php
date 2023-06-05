<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori_Barang extends Model
{
    use HasFactory;
    protected $table = "katagori_barang";
    protected $primaryKey = 'ID_KATAGORI_BARANG';
    protected $fillable = ['ID_KATAGORI_BARANG','NAMA', 'DESKRIPSI','TGL_BUAT'];
    public $timestamps = false;
}
