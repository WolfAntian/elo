<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('elo:calculate {game : ID of the Game} {player1 : ID of the User} {player2 : ID of the User} {winner : who won - 1 or 2 or 0(draw)}', function () {

    $game = \App\Game::find($this->argument('game'));
    $player1 = $game->users->where('id', $this->argument('player1'))->first();
    $player2 = $game->users->where('id', $this->argument('player2'))->first();
    $winner = ($this->argument('winner'));

    /**
     * Starting Elo
     */
    $player1Elo = $player1->pivot->elo;
    $player2Elo = $player2->pivot->elo;

    $this->info("Starting Elo");
    $this->info($player1Elo);
    $this->info($player2Elo);

    /**
     * Transformed Rating
     */
    $player1TransformedRating = 10^($player1->pivot->elo/400.0);
    $player2TransformedRating = 10^($player2->pivot->elo/400.0);

    $this->info("Transformed Ratings");
    $this->info($player1TransformedRating);
    $this->info($player2TransformedRating);

    /**
     * Expected Score
     */
    $player1ExpectedScore = $player1TransformedRating / ($player1TransformedRating + $player2TransformedRating);
    $player2ExpectedScore = $player2TransformedRating / ($player1TransformedRating + $player2TransformedRating);

    $this->info("Expected Score");
    $this->info($player1ExpectedScore);
    $this->info($player2ExpectedScore);

    /**
     * Actual Score
     */
    switch ($winner){
        case 1:
            $player1ActualScore = 1;
            $player2ActualScore = 0;
            break;
        case 2:
            $player1ActualScore = 0;
            $player2ActualScore = 1;
            break;
        default: // draw
            $player1ActualScore = 0.5;
            $player2ActualScore = 0.5;
            break;
    }

    $this->info("Actual Score");
    $this->info($player1ActualScore);
    $this->info($player2ActualScore);

    /**
     * Calculate Elo
     */
    $player1Elo = round($player1Elo + 32 * ($player1ActualScore - $player1ExpectedScore));
    $player2Elo = round($player2Elo + 32 * ($player2ActualScore - $player2ExpectedScore));

    $this->info("New Elo");
    $this->info($player1Elo);
    $this->info($player2Elo);

})->describe('grabs two users and calculates the elo based on who won');