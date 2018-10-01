<?php

namespace App\Http\Controllers;

use App\Game;
use App\Update;
use Pusher\Laravel\PusherManager;

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

    public function updateGame(int $id, PusherManager $pusher)
    {
        $data = request()->all();
        $data['game_id'] = $id;
        $update = Update::create($data);
        $pusher->trigger("game-updates-$id", 'event', $update, request()->header('x-socket-id'));
        return response()->json($update);
    }

    public function updateScore(int $id, PusherManager $pusher)
    {
        $data = request()->all();
        $game = Game::find($id);
        $game->update($data);
        $pusher->trigger("game-updates-$id", 'score', $game, request()->header('x-socket-id'));
        return response()->json();
    }
}
