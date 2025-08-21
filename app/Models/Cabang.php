<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabang extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'lembaga_pendidikan_id',
        'nama',
        'logo',
        'slug',
        'deskripsi_singkat',
        'konten_lengkap'
    ];

    public function lembagaPendidikan()
    {
        return $this->belongsTo(LembagaPendidikan::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($cabang) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($cabang->logo) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($cabang->logo);
            }
        });
    }
}
