@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($games as $game)
                    <div class="card mb-3">
                        <div class="card-header">{{ $game->name }}</div>
                        <div class="card-body">
                            <p>{{ $game->description }}</p>
                            <a href="{{ route('games.show', [$game->id]) }}" class="btn btn-primary float-right">View</a>
                        </div>
                    </div>
                @empty
                    <h2>no games found</h2>
                @endforelse
                <a href="{{route('games.create')}}" class="btn btn-secondary btn-lg float-right"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection