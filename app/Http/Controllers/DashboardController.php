<?php namespace App\Http\Controllers;

use App\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', [
            "games" => new Game(config('pool.week')),
            "locked" => [
                "locked" => Carbon::parse(config('pool.lock'), 'America/Los_Angeles')->isPast()
            ],
        ]);
    }
}
