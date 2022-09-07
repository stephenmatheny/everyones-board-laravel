<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_title',
        'category_id',
        'play_hours',
        'min_players',
        'max_players',
    ];
}
