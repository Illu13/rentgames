<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Game;
use Livewire\Attributes\On;
use Livewire\Component;

class Games extends Component
{

    public $showForm = false;
    public $gameCreated;
    public $chosenCategory;



    #[On('renderAgain')]
    public function render()
    {
        $category = Category::all();
        switch ($this->chosenCategory) {
            case 0:
                $games = Game::all()->reverse();
                break;
            default:
                $games = Game::where('category_id', $this->chosenCategory)->get();
                break;
        }
        return view('livewire.games', compact('games', 'category'));
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->gameCreated = false;
    }
    #[On('createdGame')]
    public function createdGame()
    {
        $this->showForm = false;
        $this->gameCreated = true;
    }

}
