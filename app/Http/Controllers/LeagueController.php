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

class LeagueController extends Controller
{
    public function show()
    {



        // колличество голов в матче каждой из команд
        $u = Goals::groupBy('id_com')->select('id_com', DB::raw('count(*) as total'))->get();

        $gol = DB::table('Goals')->select('id_com', DB::raw('count(*) as total'))
            ->groupBy('id_com')->get();

        $user_info = DB::table('Goals')
            ->select('id_match', 'id_com', DB::raw('count(*) as total'))
            ->groupBy('id_match', 'id_com')
            ->orderBy('id_match')
            ->get();

        // колличество матчей сыграных командой
        $current_locations = Matches::select('id_com2 as city');

        $subquery = Matches::select('id_com1')
            ->unionAll($current_locations);

        $match = DB::table(DB::raw("({$subquery->toSql()}) AS s"))
            ->select('*', DB::raw('count(id_com1) as total'))
            ->groupBy('id_com1')->get();

        // количество ничьих

        // $current = Matches::select('id_com2 as city');

        $subquery3 = Matches::select('id_com2')
            ->whereRaw("win_com IS NULL");

        $subquery2 = Matches::select('id_com1')
            ->whereRaw("win_com IS NULL")
            ->unionAll($subquery3);

        $nitrale = DB::table(DB::raw("({$subquery2->toSql()}) AS s"))
            ->select('*', DB::raw('count(id_com1) as total'))
            ->groupBy('id_com1')->get();


        $page = 'hard';


        $win = DB::table('Matches')->select('win_com', DB::raw('count(win_com) as total'))
            ->groupBy('win_com')->get();

        $lose = DB::table('Matches')->select('lose_com', DB::raw('count(lose_com) as total'))
            ->groupBy('lose_com')->get();

        $news = News::all()->sortBy("date");

        // var_dump($user_info);
        $today = date("Y-m-d H:i:s");
        // $f = 0;
        $g = Goals::all();
        $m = Matches::all()->sortBy("date");
        $t = Teams::all();

        $players = DB::table('Goals')->select('id_player', DB::raw('count(id_player) as total'))->groupBy('id_player')->orderBy('total', 'desc')->limit(5)->get();

        $assistent = DB::table('Goals')->select('assistant', DB::raw('count(assistant) as total'))->groupBy('assistant')->orderBy('total', 'desc')->limit(5)->get();

        $player = Players::all();

        $t_table = array();
        foreach ($t as $team) {
            $games = 0;
            $wins = 0;
            $loses = 0;
            $nit = 0;
            $goals = 0;
            $emblem = $team->emblem;

            foreach ($match as $res) {
                if ($res->id_com1 == $team->id) {
                    $games = $res->total;
                }
            }
            foreach ($win as $w) {
                if ($w->win_com == $team->id) {
                    $wins = $w->total;
                }
            }
            foreach ($lose as $l) {
                if ($l->lose_com == $team->id) {
                    $loses = $l->total;
                }
            }
            foreach ($nitrale as $n) {
                if ($n->id_com1 == $team->id) {
                    $nit = $n->total;
                }
            }
            foreach ($gol as $goal) {
                if ($goal->id_com == $team->id) {
                    $goals = $res->total;
                }
            }
            $points = $wins * 3 + $nit;
            $tteam[$team->id] = array(
                'name' => $team->name,
                'emblem' => $emblem,
                'games' => $games,
                'wins' => $wins,
                'lose' => $loses,
                'nit' => $nit,
                'goals' => $goals,
                'points' => $points,
            );
            $t_table = $t_table + $tteam;
        }

        // print_r($t_table);
        return view('index', compact('t_table', 'm', 'g', 'gol', 'user_info', 'today', 't', 'match', 'win', 'lose', 'nitrale', 'page', 'news', 'players', 'player', 'assistent'));











    }
}