<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only(['index']);
        $this->middleware(['auth', 'developer'])->only(['store', 'create', 'update', 'mygames', 'edit', 'destroy']);
    }

    public function index()
    {
        return view('games.index')->with('games', Game::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    public function rentedGame($game)
    {
        return view('games.gamePdf')->with('game', Game::findOrFail($game));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        $request->validate($request->rules());
        $ruta = $request->photo->store('public/img/gamePhotos');
        $rutaPublica = str_replace('public', 'storage', $ruta);
        $game = new Game();
        $game->name = $request->name;
        $game->user_id = Auth::user()->id;
        $game->rental_price = $request->rental_price;
        $game->category_id = $request->category_id;
        $game->year = $request->year;
        $game->photo = $rutaPublica;
        $game->description = $request->description;
        try {
            $game->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }
        return redirect()->route('dashboard')->with([
            'correct' => 'El juego se ha añadido correctamente.',
            'game' => $request->name
        ]);
    }

    public function mygames()
    {
        $games = Game::where('user_id', Auth::user()->id)->get();
        return view('games.mygames')->with('games', $games);
    }

    public function myRentedGames()
    {
        return view('games.myrentedgames');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    public function rentgame(FormRequest $request)
    {
        try {
            Auth::user()->games()->attach($request->game_id);

            return redirect()->route('games.pdf')->with('game_id', $request->game_id);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }

    }

    public function returngame(FormRequest $request)
    {
        try {
            Auth::user()->games()->detach($request->game_id);

            return redirect()->route('dashboard')->with([
                'correct' => 'El juego se ha devuelto correctamente.',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit')->with('game', $game);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameUpdateRequest $request, Game $game)
    {
        if ($request->has('photoEdit')) {
            $imagen = $request->file('photoEdit');
            $ruta = $imagen->store('public/img/gamePhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            File::delete($game->photo);

        }
        if (isset($rutaPublica)) {
            $game->photo = $rutaPublica;
        }
        $game->name = $request->name;
        $game->rental_price = $request->rental_price;
        $game->category_id = $request->category_id;
        $game->year = $request->year;
        $game->description = $request->description;
        $game->update();
        try {
            $games = Game::where('user_id', Auth::user()->id)->get();
            return view('games.mygames')->with('games', $games);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }


    }
    public function destroy(Game $game)
    {
        try {
            $game->delete();
            File::delete($game->photo);
            return redirect()->route('dashboard')->with([
                'correct' => 'El juego se ha borrado correctamente.',
                'game' => $game->name
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }
    }

}

/**
 * Remove the specified resource from storage.
 */


