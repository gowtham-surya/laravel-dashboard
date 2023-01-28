<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /* after submitting login form, validate for auth. */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user_credentials = $request->only('email', 'password');

        if( Auth::attempt($user_credentials) )
        {
            return redirect('dashboard')->withSuccess('Login Success');
        }else
        {
            return redirect('login')->withSuccess('Invalid Credentials');
        }
    }

    /* function to return registration page view */
    public function registration()
    {
        return view('auth.registration');
    }

    /* Store new user data to the database. */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user_register_data = $request->all();

        User::create([
            'name'     => $user_register_data['name'],
            'email'    => $user_register_data['email'],
            'password' => Hash::make( $user_register_data['password'] )
          ]);

        return redirect('/dashboard')->withSuccess('You have signed-in');
    }

    /* Function to return dashboard view. */
    public function dashboard()
    {
        if( Auth::check() )
        {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access Dashboard');
    }

    /* Function for signout current user. */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/login');
    }
}
