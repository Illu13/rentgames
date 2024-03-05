<?php

namespace App\Livewire;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MyGameCard extends Component
{
    public Game $game;

    public function render()
    {
        return view('livewire.my-game-card');
    }

    public function returnGame() {
        Auth::user()->games()->detach($this->game->id);
        $this->dispatch("juegoDevuelto");
    }
}
