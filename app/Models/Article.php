<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($article) {
            // Génère un slug automatiquement si non défini
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::deleting(function ($article) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
        });
    }

    /**
     * Auteur de l'article
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}
