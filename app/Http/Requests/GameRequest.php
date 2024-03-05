<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:games', 'max:255'],
            'developer' => ['string','max:255'],
            'category_id' => ['required', 'numeric'],
            'description' =>['required','string','max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'rental_price' => ['required', 'numeric'],
            'year' => ['required', 'numeric', 'min:1970','max:'. date('Y')],

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del juego es obligatorio.',
            'name.unique' => 'El nombre del juego ya está en uso.',
            'name.max' => 'El nombre del juego no puede tener más de :max caracteres.',
            'developer.required' => 'El nombre del desarrollador es obligatorio.',
            'developer.max' => 'El nombre del desarrollador no puede tener más de :max caracteres.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.numeric' => 'La categoría debe ser un valor numérico.',
            'description.required' => 'La descripción del juego es obligatoria.',
            'description.max' => 'La descripción del juego no puede tener más de :max caracteres.',
            'photo.image' => 'La foto debe ser una imagen.',
            'photo.required' => 'El juego ha de tener una foto.',
            'photo.mimes' => 'La foto debe ser de tipo jpeg, png o jpg.',
            'photo.max' => 'La foto no puede ser más grande de :max kilobytes.',
            'rental_price.required' => 'El precio de alquiler es obligatorio.',
            'rental_price.numeric' => 'El precio de alquiler debe ser un valor numérico.',
            'year.required' => 'El año de lanzamiento es obligatorio.',
            'year.numeric' => 'El año de lanzamiento debe ser un valor numérico.',
            'year.min' => 'El año de lanzamiento debe ser como mínimo :min.',
            'year.max' => 'El año de lanzamiento no puede ser posterior a :max.',
        ];
    }
}
