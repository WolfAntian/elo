<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Auth::user()->games;

        return view('games.index')->with([
            'games' => $games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create')->with([

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:63',
            'description' => 'required|max:255',
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->save();
        $game->refresh();

        $gameUser = new GameUser();
        $gameUser->user_id = Auth::id();
        $gameUser->game_id = $game->id;
        $gameUser->role = "Owner";
        $gameUser->save();

        return redirect(route('games.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show')->with([
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit')->with([
           'game' => $game
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        switch ($request->submit){
            case 'destroy':
                return $this->destroy($game);
        } //else

        $validatedData = $request->validate([
            'name' => 'required|max:63',
            'description' => 'required|max:255',
        ]);

        $game->name = $request->name;
        $game->description = $request->description;
        $game->save();

        return redirect(route('games.show', [$game]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect(route('games.index'));
    }
}
