<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(): \Illuminate\View\View
    {
        return view('login');
    }

    public function attemptLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $creds = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($creds, $request->remember))
            return redirect()->back()->with('message', 'Invalid username or password.');

        return redirect()->intended('/');
    }

    public function register(): \Illuminate\View\View
    {
        return view('register');
    }

    public function storeRegister(Request $request): \Illuminate\Http\RedirectResponse
    {
        $creds = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users|max:255|alpha_dash',
            'email' => 'required|email',
            'password' => ['required', 'max:255', Password::min(5)],
            'password2' => 'required|same:password'
        ]);

        $user = User::create($creds);

        if (!$user)
            return redirect()->back()->with('message', 'Cannot create account. Try again later.');

        Auth::login($user);

        return redirect()->route('home')->with('message', __('alert.auth.new-account'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
