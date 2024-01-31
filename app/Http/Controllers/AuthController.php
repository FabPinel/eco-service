<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use App\Models\DiyProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function store(Request $request)
    {

        $request->validate(
            [
                'username' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required',
                'password' => 'required|confirmed|min:8',
            ],
            [
                'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
                'password.min' => 'Le mot de passe doit faire au moins 8 caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]
        );


        $save = new User;
        $save->username = trim($request->username);
        $save->first_name = trim($request->first_name);
        $save->last_name = trim($request->last_name);
        $save->email = trim($request->email);
        $save->phone = trim($request->phone);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(30);
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect('login')->with('success', "Veuillez valider votre adresse email");
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect('login')->with('success', "Votre compte à bien été créé");
        } else {
            abort(404);
        }
    }
}
