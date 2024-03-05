<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'lowercase', // Mover la regla lowercase antes de la regla email
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'country' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'digits:6'], // Cambiar 'integer' a 'numeric'
            'phone' => ['required', 'numeric', 'digits_between:7,9'], // Cambiar 'min_digits' y 'max_digits' a 'digits_between'
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],


        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',

            'surname.required' => 'El apellido es obligatorio.',
            'surname.string' => 'El apellido debe ser una cadena de caracteres.',
            'surname.max' => 'El apellido no puede tener más de :max caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de caracteres.',
            'email.email' => 'El del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
            'email.lowercase' => 'El electrónico debe estar en minúsculas.',
            'email.unique' => 'El electrónico ya ha sido registrado.',

            'country.required' => 'El país es obligatorio.',
            'country.string' => 'El país debe ser una cadena de caracteres.',
            'country.max' => 'El país no puede tener más de :max caracteres.',

            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.numeric' => 'El código postal debe ser numérico.',
            'postal_code.digits' => 'El código postal debe tener :digits dígitos.',

            'phone.required' => 'El teléfono es obligatorio.',
            'phone.numeric' => 'El teléfono debe ser numérico.',
            'phone.digits_between' => 'El teléfono debe tener entre :min y :max dígitos.',

            'photo.image' => 'El archivo adjunto debe ser una imagen.',
            'photo.mimes' => 'El archivo adjunto debe ser de tipo: :values.',
            'photo.max' => 'El tamaño máximo del archivo adjunto es :max kilobytes.',
        ];
    }
}

