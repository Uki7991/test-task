<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public const ACTIVE = 0;
    public const EXPIRED = 1;

    protected $fillable = [
        'booked_until',
        'booked_blocks_count',
        'user_id',
        'access_code',
        'cost',
        'status',
    ];

    public function blocks()
    {
        return $this->belongsToMany(Block::class);
    }
}
