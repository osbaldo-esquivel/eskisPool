<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $casts = [
        'picks' => 'array'
    ];

    public function __construct(int $user_id, array $picks, int $week, int $score, string $username)
    {
        $this->user_id = $user_id;
        $this->picks = $picks;
        $this->week = $week;
        $this->score = $score;
        $this->username = $username;
    }
}
