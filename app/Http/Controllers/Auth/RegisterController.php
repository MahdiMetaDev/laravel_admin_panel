<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        User::create([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect(route('auth.login'));
    }
}
