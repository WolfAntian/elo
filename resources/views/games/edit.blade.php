@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editing {{ $game->name }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('games.update', [$game]) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="{{ $game->name }}" value="{{ $game->name }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" aria-describedby="description" placeholder="{{ $game->description }}" value="{{ $game->description }}">
                            </div>

                            <button type="submit" name="submit" value="update" class="btn btn-primary float-right ml-3">Update</button>
                            <button type="submit" name="submit" value="destroy" class="btn btn-danger float-right">Delete</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection