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

    protected $casts = [
        'is_active' => 'boolean',
        'is_home' => 'boolean',
        'is_news' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function blockCollections()
    {
        return $this->hasMany(BlockCollection::class)->orderBy('position');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
