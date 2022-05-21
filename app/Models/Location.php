<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function blocks()
    {
        return $this->hasManyThrough(Block::class, Room::class);
    }

    public function freeBlocks()
    {
        return $this->blocks()->where('booked', false);
    }
}
