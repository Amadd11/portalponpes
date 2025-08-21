<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar_url',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pengumuman) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($pengumuman->gambar_url) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($pengumuman->gambar_url);
            }
        });
    }
}
