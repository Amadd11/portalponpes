<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramUnggulan extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_program',
        'slug',
        'deskripsi_panjang',
        'logo',
        'deskripsi',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaProgramAttribute($value)
    {
        $this->attributes['nama_program'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($programUnggulan) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($programUnggulan->logo) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($programUnggulan->logo);
            }
        });
    }
}
