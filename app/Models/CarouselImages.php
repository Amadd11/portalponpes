<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarouselImages extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($carousel) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($carousel->path) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($carousel->path);
            }
        });
    }
}
