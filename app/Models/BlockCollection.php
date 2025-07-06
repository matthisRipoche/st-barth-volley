<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockCollection extends Model
{
    protected $fillable = [
        'page_id',
        'block_id',
        'type',
        'position',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
