<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\ConnectionInterface;
use App\Pool;

class PoolController extends Controller
{
    private $db;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        return view('pool');
    }

    public function savePicks(Request $request)
    {
        $picks = [];

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
        
        $pool = new Pool($request['user_id'], $picks, config('pool.week'), $request['score']);

        if ($pool->save()) {
            return back()->with('status', 'Picks saved')->withInput();
        }

        return back()->with('status', 'Error saving picks')->withInput();
    }
}
