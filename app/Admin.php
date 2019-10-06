<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $casts = [
        'wins' => 'array'
    ];

    public function __construct(?int $score, array $wins, int $week)
    {
        $this->score = $score;
        $this->wins = $wins;
        $this->week = $week;
    }
}
