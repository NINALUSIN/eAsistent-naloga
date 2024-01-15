<?php

//namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{

    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'welcome'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user. Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'name.required' => 'Polje "Ime" je obvezno.',
            'email.email' => 'Email mora biti v obliki ime@domena.končnica.',
            'password.required' => 'Polje "Geslo" je obvezno.'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('welcome')
                ->withSuccess('Uspešno ste se prijavili!');
        }

        return back()->withErrors([
            'email' => 'Vnesli ste napačni email ali geslo.',
        ])->onlyInput('email');

    }


    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome')
            ->withSuccess('Uspešno ste se odjavili!');;
    }



    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ],
        [
            'name.required' => 'Polje "Ime" je obvezno.',
            'name.max' => 'Polje je omejeno na :max znakov.',
            'email.email' => 'Email mora biti v obliki ime@domena.končnica.',
            'email.required' => 'Polje "Email" je obvezno.',
            'email.max' => 'Polje je omejeno na :max znakov.',
            'email.unique' => 'Uporabnik, s tem email naslovom, že obstaja.',
            'password.required' => 'Polje "Geslo" je obvezno.',
            'password.min' => 'Geslo mora biti dolgo vsaj :min znakov.',
            'password.confirmed' => 'Vpisana gesla, se ne ujemata.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect()->route('welcome')
        ->withSuccess('Uspešno ste se registrirali in prijavili v aplikacijo!');
    }


}
