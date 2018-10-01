<?php

namespace App\Http\Controllers;

use App\Game;
use App\Update;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('home', ['games' => $games]);
    }

    public function viewGame(int $id)
    {
        $game = Game::find($id);
        $updates = $game->updates;
        return view('game', ['game' => $game, 'updates' => $updates]);
    }

    public function startGame()
    {
        $game = Game::create(request()->all());
        return redirect("/games/$game->id");
    }

    public function updateGame(int $id)
    {
        $data = request()->all();
        $data['game_id'] = $id;
        $update = Update::create($data);
        return response()->json($update);
    }

    public function updateScore(int $id)
    {
        $data = request()->all();
        Game::where('id', $id)->update($data);
        return response()->json();
    }
}
