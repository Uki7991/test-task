<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function freeBlocks()
    {
        return $this->blocks()->where('booked', false);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
