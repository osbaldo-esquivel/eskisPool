<?php namespace App\Http\Controllers;

use App\Http\Requests\Hiit;

class HiitController extends Controller
{
    public function index()
    {
        return view('games.hiit');
    }

    public function start(Hiit\Get $request)
    {
        $data = [
            'intervals' => $request->getIntervals(),
            'hiit-length' => $request->getHiitLength(),
            'rest-length' => $request->getRestLength(),
            'future-time' => $request->getTimeFromNow(),
        ];

        return view('games.hiit-start', compact('data'));
    }
}