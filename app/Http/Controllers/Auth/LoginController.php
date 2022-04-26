<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home_candidato';
    protected function redirectTo()
    {
        //verifico o tipo do usuario logado
        $user = Auth::user();

        if ($user->hasRole('super-admin')) {
            return route('home');
        } else if ($user->hasRole('candidato')) {
            return route('home');
        } else if ($user->hasRole('recrutador-demandante')) {
            return route('home');
        } else if ($user->hasRole('admin-demandante')) {
            return route('home');
        } else if ($user->hasRole('secretario')) {
            return route('home');
        } else if ($user->hasRole('rh')) {
            return route('home');
        } else {
            return route('index');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
