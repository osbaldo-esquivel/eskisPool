<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\ConnectionInterface;
use App\Pool;
use App\User;

class PoolController extends Controller
{
    private $db;
    private $user;

    public function __construct(ConnectionInterface $db, User $user)
    {
        $this->db = $db;
        $this->user = $user;
    }

    public function index()
    {
        $total = $this->db->table('pools')
                      ->where('week', config('pool.week'))
                      ->count();

        $info = $this->db->table('pools')
                     ->where('week', config('pool.week'))
                     ->get();

        $games = $this->db->table('games')
                      ->select('away_team', 'home_team')
                      ->where('week', config('pool.week'))
                      ->get();

        $pool = [
            "total" => $total,
            'info'  => $info,
            'games' => $games,
        ];

        return view('pool')->with('pool', $pool);
    }

    public function savePicks(Request $request)
    {
        $picks = [];
        $name = $this->user->getName($request['user_id']);

        foreach ($request->all() as $key => $value) {
            if(is_int($key)) {
                $picks[] = $value;
            }
        }

        $result = $this->db->table('pools')
                       ->select('id')
                       ->where('week', config('pool.week'))
                       ->where('user_id', $request['user_id'])
                       ->get();

        if (! $result->isEmpty()) {
            $updateResult = $this->db->table('pools')
                                ->where('id', $result[0]->id)
                                ->update(['picks' => $picks, 'score' => $request['score']]);

            if ($updateResult) {
                return back()->with('status', 'Picks updated')->withInput();
            }

            return back()->with('status', 'Error updating picks')->withInput();
        }
        
        $pool = new Pool($request['user_id'], $picks, config('pool.week'), $request['score'], $name);

        if ($pool->save()) {
            return back()->with('status', 'Picks saved')->withInput();
        }

        return back()->with('status', 'Error saving picks')->withInput();
    }
}
