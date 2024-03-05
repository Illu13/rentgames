<?php

namespace App\Livewire;

use App\Http\Requests\GameRequest;
use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addgame extends Component
{
    use WithFileUploads;

    public $categories;
    public $name;
    public $rental_price;
    public $category_id = 1;
    public $description;
    public $photo;
    public $year;
    public $developer;
    public $developer_id;
    public $correcto = 0;
    public $incorrecto = null;
    private GameRequest $request;


    public function __construct()
    {
        $this->categories = Category::all();
        $this->developer = User::where('role', 'developer')->get();
    }

    public function render()
    {
        return view('livewire.addgame');
    }


    public function addgame()
    {

        $this->validate([
            'name' => 'required|unique:games',
            'developer_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'description' =>['required','string','max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'rental_price' => ['required', 'numeric'],
            'year' => ['required', 'numeric', 'min:1970','max:'. date('Y')],
        ],  [
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
            'developer_id.required' => 'Debe seleccionar un desarrollador.',
            'year.numeric' => 'El año de lanzamiento debe ser numérico.',
            'year.min' => 'El año de lanzamiento debe ser mayor o igual a 1970.',
            'year.max' => 'El año de lanzamiento no puede ser mayor que el año actual.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.numeric' => 'La categoría debe ser numérica.',
        ]);

        $ruta = $this->photo->store('public/img/gamePhotos');
        $rutaPublica = str_replace('public', 'storage', $ruta);

        try {
            Game::create([
                'name' => $this->name,
                'description' => $this->description,
                'rental_price' => $this->rental_price,
                'photo' => $rutaPublica,
                'year' => $this->year,
                'user_id' => $this->developer_id,
                'category_id' => $this->category_id,
            ]);
            $this->name = "";
            $this->correcto = 1;
            $this->dispatch('renderAgain');
            $this->dispatch('createdGame');
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo, si no funciona, proporcione este código al administrador: ".$e->getCode();
        }


    }


}
