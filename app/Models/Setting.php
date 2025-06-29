<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public $timestamps = true;

    public static function set($key, $value)
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public static function get($key, $default = null)
    {
        return optional(static::where('key', $key)->first())->value ?? $default;
    }
}
