<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Store;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::all();

        return view('games.index', [
            'games' => $games,
        ]);
    }

    public function edit(Game $game)
    {
        return view('games.edit', [
            'game' => $game,
            'stores' => Store::all(),
        ]);
    }

    public function show(Game $game)
    {
        return view('games.show', [
            'game' => $game,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'playtime' => 'required|integer|min:0',
            'release_date' => 'nullable|date',
            'stores' => 'required|array',
            'stores.*' => 'exists:stores,id',
        ]);

        $game = Game::create($validated);
        $game->stores()->sync($request->stores);

        return redirect()->route('games.index')->with('success', 'Game created successfully');
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'playtime' => 'required|integer|min:0',
            'release_date' => 'nullable|date',
            'stores' => 'required|array',
            'stores.*' => 'exists:stores,id',
        ]);

        $game->update($validated);
        $game->stores()->sync($request->stores);

        return redirect()->route('games.index')->with('success', 'Game updated successfully');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully');
    }
}
