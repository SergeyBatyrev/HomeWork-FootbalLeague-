<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Goals;
use App\Models\Matches;
use App\Models\News;
use App\Models\Players;
use App\Models\Red_cards;
use App\Models\Teams;
use App\Models\Yellow_cards;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function showinfo($id)
    {


        $u = Goals::groupBy('id_com')->select('id_com', DB::raw('count(*) as total'))->get();

        $gol = DB::table('Goals')->select('id_com', DB::raw('count(*) as total'))
            ->groupBy('id_com')->get();

        $user_info = DB::table('Goals')
            ->select('id_match', 'id_com', DB::raw('count(*) as total'))
            ->groupBy('id_match', 'id_com')
            ->orderBy('id_match')
            ->get();



        $match = Matches::where('id', '=', $id)->get();
        $page = 'info';
        $matches = Matches::all();
        $player=Players::all();
        return view('info', compact('matches', 'page', 'match','player','user_info'));

    }
}
