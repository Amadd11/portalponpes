<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($akademik) {
            // Hapus file kurikulum jika ada
            if ($akademik->kurikulum) {
                Storage::disk('public')->delete($akademik->kurikulum);
            }

            // Hapus file peraturan akademik jika ada
            if ($akademik->peraturan_akademik) {
                Storage::disk('public')->delete($akademik->peraturan_akademik);
            }

            // Hapus file kalender akademik jika ada
            if ($akademik->kalender_akademik) {
                Storage::disk('public')->delete($akademik->kalender_akademik);
            }

            // Saat mengupdate model
            static::updating(function ($akademik) {
                $original = $akademik->getOriginal();

                // Jika field diubah (diunggah ulang atau dihapus)
                if (($akademik->isDirty('kurikulum') || is_null($akademik->kurikulum)) && $original['kurikulum']) {
                    Storage::disk('public')->delete($original['kurikulum']);
                }

                if (($akademik->isDirty('peraturan_akademik') || is_null($akademik->peraturan_akademik)) && $original['peraturan_akademik']) {
                    Storage::disk('public')->delete($original['peraturan_akademik']);
                }

                if (($akademik->isDirty('kalender_akademik') || is_null($akademik->kalender_akademik)) && $original['kalender_akademik']) {
                    Storage::disk('public')->delete($original['kalender_akademik']);
                }
            });
        });
    }
}
