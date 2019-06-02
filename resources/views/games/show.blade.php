@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $game->name }}</div>
                    <div class="card-body">
                        <p>{{ $game->description }}</p>
                        <a href="{{ route('games.edit', [$game->id]) }}" class="btn btn-primary float-right">Edit</a>
                    </div>
                </div>
                <br>
                <ul class="list-group">
                    @foreach($game->users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $user->name }}
                            <span class="badge badge-primary badge-pill">{{ $user->pivot->role }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection