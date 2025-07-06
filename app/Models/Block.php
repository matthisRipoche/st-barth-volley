<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];

    public const TYPES = [
        'video' => 'Vidéo',
        'image_texte' => 'Image + Texte',
        'citation' => 'Citation',
    ];

    protected $fillable = [
        'name',
        'type',
        'content',
    ];

    public function blockCollections()
    {
        return $this->hasMany(BlockCollection::class);
    }
}
