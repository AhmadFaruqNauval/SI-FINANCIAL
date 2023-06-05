<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = "pengguna";
    protected $primaryKey = 'ID_PENGGUNA';
    protected $fillable = ['ID_PENGGUNA','NAMA'];

    public $timestamps = false;
}
