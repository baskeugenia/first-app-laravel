<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister() {
        return view("auth.register");
    }
    public function showLogin() {
        return view("auth.login");
    }
    public function login(Request $request) {
        $input = $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required'],
        ]);
        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        throw ValidationException::withMessages([
            'credentials' => 'incorrect credentials'
        ]);
    }

    public function register(Request $request) {
        $input = $request->validate([
            'name' => ['required', 'min:1', 'max:255', Rule::unique('users', 'name')],
            'email'=> ['required','email', Rule::unique('users', 'email')],
            'password'=> ['required','min:1','max:20', 'confirmed'],
        ]);

        //$input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        Auth::login($user);
        return redirect('/');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }
}
