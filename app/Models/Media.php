<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name',
        'path',
        'mime_type',
        'extension',
        'size',
        'alt',
        'title',
    ];

    // 🔁 Relation polymorphe (optionnelle)
    public function mediable()
    {
        return $this->morphTo();
    }

    // ✅ Accès à l’URL publique
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

    // ✅ Affichage taille lisible
    public function getReadableSizeAttribute()
    {
        $size = $this->size;

        if ($size >= 1048576) return round($size / 1048576, 2) . ' Mo';
        if ($size >= 1024) return round($size / 1024, 2) . ' Ko';
        return $size . ' o';
    }
}
