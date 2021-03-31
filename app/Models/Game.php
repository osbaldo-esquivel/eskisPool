<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $dates = [
        'created_at',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getAwayTeam(): string
    {
        return $this->away_team;
    }

    public function getHomeTeam(): string
    {
        return $this->home_team;
    }

    public function getWeek(): string
    {
        return $this->week;
    }

    public function getWeekday(): string
    {
        return $this->away_team;
    }

    public function getDate(): string
    {
        return $this->away_team;
    }

    public function getTime(): string
    {
        return $this->away_team;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->away_team;
    }
}
