<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'sport',
        'game_date',
        'start_time',
        'end_time',
        'home_team',
        'away_team',
        'age_group',
        'gender',
        'classification',
        'venue',
        'city',
        'state',
        'first_name',
        'last_name',
        'email',
        'position',
        'pay_type',
        'base_fee',
        'mileage',
        'other'
    ];
}

