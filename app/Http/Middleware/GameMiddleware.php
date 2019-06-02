<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GameMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $game = $request->game;
        if (isset($game)){
            $user = $game->users->where('id', Auth::id())->first();
            if (!isset($user)) {
                return abort(403);
            }
        }

        return $next($request);
    }
}
