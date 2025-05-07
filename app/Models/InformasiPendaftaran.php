<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPendaftaran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'syarat_pendaftaran',
        'alur_pendaftaran',
        'biaya_pendaftaran',
        'link_pendaftaran',
        'lampiran',
    ];
}
