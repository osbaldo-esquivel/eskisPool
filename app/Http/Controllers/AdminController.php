<?php namespace App\Http\Controllers;

use App\Game;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager as DB;

class AdminController extends Controller
{
    private $db;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DB $db)
    {
        $this->db = $db;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin', [
            "games" => new Game(config('pool.week')),
        ]);
    }

    public function saveWins(Request $request)
    {
        $picks = [];
        $score = null;

        foreach ($request->all() as $key => $value) {
            if(is_int($key)) {
                $picks[] = $value;
            }
        }

        if ($request['score']) {
            $score = $request['score'];
        }

        $result = $this->db->table('admins')
                       ->select('id')
                       ->where('week', config('pool.week'))
                       ->get();

        if (! $result->isEmpty()) {
            $updateResult = $this->db->table('admin')
                                ->where('id', $result[0]->id)
                                ->update(['wins' => $picks, 'score' => $score, 'week' => config('pool.week')]);

            if ($updateResult) {
                return back()->with('status', 'Wins updated')->withInput();
            }

            return back()->with('status', 'Error updating wins')->withInput();
        }

        $wins = new Admin($score, $picks, config('pool.week'));

        if ($wins->save()) {
            return redirect()->back()->with([
                'status' => 'Saved successfully'
            ]);
        }

        return redirect()->back()->with([
            'status' => 'Error saving'
        ]);
    }
}
