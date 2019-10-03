<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    private $choices;

    public function __construct($week, ?array $choices = [])
    {
        $this->week = $week;
        $this->choices = $choices;
    }

    public function getGames()
    {
        return Game::where('week', $this->week)->get();
    }

    public function getWeek()
    {
        return $this->week;
    }

    public function addPick(array $choice)
    {
        $this->choices.push($choice);
    }

    public function getPicks()
    {
        return $this->choices;
    }
}
