<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use App\Models\DiyProduct;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'index'
        ]);

    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

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

        $idUser = $save->id;
        $token = Str::random(64);
 
        UserVerify::create([
            'user_id' => $idUser, 
            'token' => $token
          ]);
    
          Mail::send('emails.register', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email register verification');
        });
       
      return redirect()->route('index')->withSuccess('Great! You have Successfully logged in');
        }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 0) {
                return redirect()->route('admin.dashboard')->with('success', 'You have successfully logged in as an admin!');
            } else {
                return redirect()->route('index')->with('success', 'You have successfully logged in!');
            }

        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public static function getUserId()
    {
        if (Auth::check()) {
            return Auth::id();
        } else {
            return null;
        }
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}
