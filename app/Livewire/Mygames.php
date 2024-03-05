<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Mygames extends Component
{
    #[On('juegoDevuelto')]
    public function render()
    {
        $games = Auth::user()->games()->get();
        return view('livewire.mygames')->with('games', $games);
    }
}
