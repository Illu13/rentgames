<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Attributes\On;
use Livewire\Component;

class GameCard extends Component
{


    public $showEditModal = false;

    public Game $game;
    public function render()
    {
        return view('livewire.game-card');
    }
    public function deleteGame() {
        $this->game->delete();
        $this->dispatch('renderAgain');

    }

    public function editGame() {
        $this->showEditModal = true;
    }
    #[On('changeongame')]
    public function closeModal() {
        $this->showEditModal = false;
        $this->dispatch('renderAgain');
    }

    #[On('closeModal')]
    public function cerrarModal() {
        $this->showEditModal = false;

    }
}
