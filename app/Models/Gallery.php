<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($gallery) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($gallery->gambar_url) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($gallery->gambar_url);
            }
        });
    }
}
