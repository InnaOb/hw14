<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DropboxController
{
    public function callback(Request $request)
    {

        $parameters = Http::asForm()->post('https://api.dropboxapi.com/oauth2/token', [
            'code' => $request->get('code'),
            'grant_type' => 'authorization_code',
            'client_id' => config('oauth.dropbox.client_id'),
            'client_secret' => config('oauth.dropbox.secret_key'),
            'redirect_uri' => config('oauth.dropbox.redirect_uri'),
        ]);

        $token = $parameters->json('access_token');

        $parameters = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->send('post', 'https://api.dropboxapi.com/2/users/get_current_account', []);

        $user = User::updateOrCreate(
            ['username' => $parameters->json('name.display_name')],
            [
                'username' => $parameters->json('name.display_name'),
                'email' => $parameters->json('email'),
                'password' => Hash::make(Str::random(10))
            ]
        );

        Auth::login($user);

        return redirect()->route('home');
    }

}
