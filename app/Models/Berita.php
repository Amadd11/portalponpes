<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'category_id',
        'judul',
        'youtube_link',
        'slug',
        'thumbnail',
        'isi',
        'attachments',
        'tanggal_publish',
        'status'
    ];

    protected $casts = [
        'attachments' => 'array',
        'tanggal_publish' => 'datetime'
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

    public function setIsiAttribute($value)
    {
        $this->attributes['isi'] = str_replace('&nbsp;', ' ', $value);
    }

    protected function youtubeLink(): Attribute // <-- Nama method disesuaikan dengan nama kolom
    {
        return Attribute::make(
            set: function ($value) {
                if (empty($value)) {
                    return null;
                }
                // Regex ini akan menangkap ID dari hampir semua format URL YouTube
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $value, $match);

                // Jika regex menemukan ID, simpan ID tersebut.
                // Jika tidak, simpan nilai aslinya (misal, jika input sudah berupa ID).
                return $match[1] ?? $value;
            },
        );
    }

    /**
     * ACCESSOR: Otomatis membuat URL embed lengkap dari ID yang tersimpan.
     * Panggil di Blade: {{ $artikel->youtube_embed_url }}
     */
    protected function youtubeEmbedUrl(): Attribute
    {
        return Attribute::make(
            // Mengambil nilai dari kolom 'youtube_link' (yang sekarang berisi ID)
            get: fn() => $this->youtube_link ? 'https://www.youtube.com/embed/' . $this->youtube_link : null,
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($berita) {
            // Periksa jika ada file di kolom 'gambar_url'
            if ($berita->thumbnail) {
                // Hapus file dari disk 'public'
                Storage::disk('public')->delete($berita->thumbnail);
            }
        });
    }
}
