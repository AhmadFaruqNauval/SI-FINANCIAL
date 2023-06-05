<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = "outlet";
    protected $primaryKey = 'ID_OUTLET';
    protected $fillable = ['ID_OUTLET','NAMA', 'DESKRIPSI', 'TIPE', 'NO_TELP', 'ALAMAT'];

    public $timestamps = false;
}
