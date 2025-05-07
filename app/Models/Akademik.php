<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'kurikulum',
        'deskripsi',
        'peraturan_akademik',
        'kalender_akademik'
    ];
}
