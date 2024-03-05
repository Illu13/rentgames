<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class ApiGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAllGamesFromADeveloper(Request $request)
    {
        $dev = User::all()->where('email', $request->email)->first();
        $games = Game::all()->where('user_id', $dev->id);

        return response()->json([
            'status' => 'true',
            'games' => 'a',
            'proof' => $games
        ]);
    }

    public function index()
    {
        $games = Game::all();
        return response()->json([
            'status' => 'true',
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        return "hola";
        /*$game = Game::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Juego creado correctamente",
            'product' => $game
        ], 200);*/
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
