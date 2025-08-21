<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LembagaPendidikan extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_lembaga',
        'slug',
        'logo',
        'deskripsi',
        'deskripsi_panjang'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaLembagaAttribute($value)
    {
        $this->attributes['nama_lembaga'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function cabangs()
    {
        return $this->hasMany(Cabang::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($lembagaPendidikan) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($lembagaPendidikan->logo) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($lembagaPendidikan->logo);
            }
        });
    }
}
