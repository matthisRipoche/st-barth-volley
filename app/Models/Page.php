<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'is_active',
        'is_home',
        'is_news'
    ];

    protected static function booted()
    {
        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }

    public function getIsActiveAttribute($value)
    {
        return $value ? 'Oui' : 'Non';
    }

    public function getIsHomeAttribute($value)
    {
        return $value ? 'Oui' : 'Non';
    }

    public function getIsNewsAttribute($value)
    {
        return $value ? 'Oui' : 'Non';
    }
}
