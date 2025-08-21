<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brosur extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'gambar'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($brosur) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($brosur->gambar) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($brosur->gambar);
            }
        });
    }
}
