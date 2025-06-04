<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GelombangPendaftaran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_gelombang',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
    ];
}
