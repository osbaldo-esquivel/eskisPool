<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getPicks(): string
    {
        return json_encode($this->picks);
    }

    public function getWeek(): int
    {
        return $this->week;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
