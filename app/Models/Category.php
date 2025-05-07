<?php

namespace App\Models;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_category',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNamaCategoryAttribute($value)
    {
        $this->attributes['nama_category'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
