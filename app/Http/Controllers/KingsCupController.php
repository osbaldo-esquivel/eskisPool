<?php namespace App\Http\Controllers;

class KingsCupController extends Controller
{
    public function index()
    {
        return view('games.kings');
    }
}