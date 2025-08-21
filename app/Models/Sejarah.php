<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sejarah extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'gambar',
        'isi',
        'lampiran',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sejarah) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($sejarah->lampiran) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($sejarah->lampiran);
            }
        });
    }
}
