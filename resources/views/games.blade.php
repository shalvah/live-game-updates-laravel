@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ongoing games</h2>
        @auth
        <button type="button" class="btn btn-primary">Start new game</button>
        @endauth
        @forelse($games as $game)
            <a class="card bg-dark" href="/games/{{ $game->id }}">
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{ $game->score }}</h4>
                    </div>
                </div>
            </a>
        @empty
            No games in progress.
        @endforelse
    </div>
@endsection
