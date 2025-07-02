<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order_index',
    ];

    public function __toString(): string
    {
        return $this->name;
    }
}
