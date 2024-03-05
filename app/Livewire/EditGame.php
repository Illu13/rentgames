<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGame extends Component
{
    use WithFileUploads;

    public $game_id;
    public Game $game;
    public $categories;
    public $incorrecto;
    public $name;
    public $rental_price;
    public $category_id = 1;
    public $description;
    public $photo;
    public $year;
    public $developer;
    public $developer_id;

    public $photoEdit;

    public function render()
    {
        $this->game = Game::find($this->game_id);
        $this->categories = Category::all();
        $this->developer = User::where('role', 'developer')->get();
        $this->name = $this->game->name;
        $this->rental_price = $this->game->rental_price;
        $this->category_id = $this->game->category_id;
        $this->description = $this->game->description;
        $this->photo = $this->game->photo;
        $this->year = $this->game->year;
        $this->developer_id = $this->game->user_id;
        return view('livewire.edit-game');
    }

    public function editGame()
    {


        $this->photo = $this->photoEdit;
        $this->validate([
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'rental_price' => ['required', 'numeric'],
            'year' => ['required', 'numeric', 'min:1970', 'max:' . date('Y')],
            'developer_id' => ['required', 'numeric', 'max:255'],
            'category_id' => ['required', 'numeric'],
        ], [
            'photo.image' => 'El archivo debe ser una imagen válida.',
            'photo.mimes' => 'El archivo debe ser de tipo jpeg, png o jpg.',
            'photo.max' => 'El tamaño máximo del archivo es 2048 KB.',
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'rental_price.required' => 'El precio de alquiler es obligatorio.',
            'rental_price.numeric' => 'El precio de alquiler debe ser numérico.',
            'year.required' => 'El año de lanzamiento es obligatorio.',
            'year.numeric' => 'El año de lanzamiento debe ser numérico.',
            'year.min' => 'El año de lanzamiento debe ser mayor o igual a 1970.',
            'year.max' => 'El año de lanzamiento no puede ser mayor que el año actual.',
            'developer_id.required' => 'El nombre del desarrollador es obligatorio.',
            'developer_id.numeric' => 'Ha habido un error en el número de identificación del desarrollador.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.numeric' => 'La categoría debe ser numérica.',
        ]);
        if ($this->photo) {
            File::delete($this->game->photo);
            $ruta = $this->photo->store('public/img/gamePhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            $this->game->photo = $rutaPublica;
        }

        $this->game->id = $this->game_id;
        $this->game->name = $this->name;
        $this->game->description = $this->description;
        $this->game->rental_price = $this->rental_price;
        $this->game->year = $this->year;
        $this->game->user_id = $this->developer_id;
        $this->game->category_id = $this->category_id;

        try {
            $this->game->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo.";
        }
        $this->dispatch('changeongame');
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }
}
