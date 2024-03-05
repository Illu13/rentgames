<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'lowercase',
                'unique:users'
            ],
            'country' => ['required', 'string', 'max:255'],
            'postalCode' => ['required', 'numeric', 'digits:6'],
            'telephone' => ['required', 'numeric', 'digits_between:7,9'],
            'role' => ['required','string'],
            ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'postal_code' => $request->postalCode,
            'birth_date' => $request->birthDate,
            'phone' => $request->telephone,
            'surname' => $request->surname,
            'role' => $request->role
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
