<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::query()->where('username', '=', $credentials ['username'])->get()->first();

        if (null === $user) {
            $user = User::create([
                'username' => $credentials['username'],
                'email' => $credentials['username'],
                'password' => Hash::make($credentials['password']),
            ]);
        } else {
            if (!Hash::check($credentials['password'], $user->password)) {
                return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
            }
        }

        Auth::login($user);

        $request->session()->regenerate();

        return back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

}
