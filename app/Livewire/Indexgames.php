<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Game;
use Livewire\Attributes\On;
use Livewire\Component;

class Indexgames extends Component


{
    public $chosenCategory;

    #[On('renderAgain')]
    public function render()
    {
        $category = Category::all();
        switch ($this->chosenCategory) {
            case 0:
                $games = Game::inRandomOrder()->take(12)->get();
                break;
            default:
                $games = Game::where('category_id', $this->chosenCategory)->inRandomOrder()->take(12)->get();
                break;
        }
        return view('livewire.indexgames', compact('games', 'category'));
    }
}
