@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@{{ game.score }}</h2>
        @auth
            <form>
                <label for="minute">In what minute did this happen?</label>
                <input class="form-control" type="number" id="minute">

                <label for="type">Event type</label>
                <input class="form-control" id="type" placeholder="Goal, foul, injury, booking...">

                <label for="description">Description</label>
                <input class="form-control" id="description" placeholder="Add a description or comment...">

                <button type="submit" class="btn btn-primary">Post update</button>
            </form>
        @endauth
            <div class="card-body" v-for="update in updates">
                    <div class="card-title">
                        <h5>@{{ update.type }}</h5>
                    </div>
                    <div class="card-text">
                        @{{ update.comment }}
                    </div>
                </div>
    </div>
@endsection
