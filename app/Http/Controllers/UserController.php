<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request) {
        $input = $request->validate([
            'loginname' => ['required'],
            'loginpassword' => ['required'],
        ]);

        if (auth()->attempt([
            'name' => $input['loginname'],
            'password' => $input['loginpassword'],
            ])) {
                $request->session()->regenerate();

        }

        return redirect('/');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect("/");
    }
    public function register(Request $request) {
        $input = $request->validate([
            'name' => ['required', 'min:1', 'max:10', Rule::unique('users', 'name')],
            'email'=> ['required','email', Rule::unique('users', 'email')],
            'password'=> ['required','min:1','max:20'],
        ]);

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        auth()->login($user);
        return redirect('/');
    }
}
