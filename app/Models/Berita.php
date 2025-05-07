<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'category_id',
        'judul',
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


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
