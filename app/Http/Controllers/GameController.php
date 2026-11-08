<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $featured = Game::where('is_featured', true)->latest()->take(5)->get();
        $games = Game::latest()->take(12)->get();
        $specials = Game::where('discount_percent', '>', 0)->latest()->take(6)->get();
        $freeGames = Game::where('is_free', true)->latest()->take(4)->get();

        return view('home', compact('featured', 'games', 'specials', 'freeGames'));
    }

    public function show(Game $game)
    {
        return view('game.show', compact('game'));
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        $results = $query === ''
            ? collect()
            : Game::where('title', 'like', "%{$query}%")
                ->orWhere('genres', 'like', "%{$query}%")
                ->orderBy('title')
                ->get();

        return view('search', compact('query', 'results'));
    }
}
