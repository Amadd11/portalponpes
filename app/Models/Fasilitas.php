<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fasilitas extends Model
{
    //
    use HasFactory, SoftDeletes;
    //
    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'gambar_url',
    ];
}
