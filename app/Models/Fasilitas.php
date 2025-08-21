<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($fasilitas) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($fasilitas->gambar_url) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($fasilitas->gambar_url);
            }
        });
    }
}
