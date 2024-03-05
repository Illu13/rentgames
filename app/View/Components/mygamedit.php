<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class mygamedit extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public function __construct(
        public $game
    )
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->game->user_id != Auth::user()->id) {
            return redirect()->route('dashboard')->with('message', 'No tienes permisos para editar este juego');
        }
        return view('components.mygamedit')->with('categories', $this->categories);
    }
}
