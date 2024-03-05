<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class Indexcard extends Component
{
    public Game $game;

    public function render()
    {
        return view('livewire.indexcard');
    }
}
