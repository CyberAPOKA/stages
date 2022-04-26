<?php

namespace App\Http\Controllers\Auth;

use App\Candidato;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
  /*  protected $redirectTo = route('home');*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $dt = new Carbon();
        $before = $dt->subYears(16)->format('d-m-Y');

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'data_nascimento' => 'required|date|before:' . $before,
            'cpf' => ['required', 'string', 'max:14', 'unique:users', 'cpf'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ],
            [
                'name.required' => 'Nome é obrigatório',
                'name.string' => 'Somente letras',
                'name.max' => 'Máximo 255 caracteres',
                'email.required' => 'Email é obrigatório',
                'email.email' => 'Formato errado',
                'email.max' => 'Máximo 255 caracteres',
                'data_nascimento.before' => 'Você deve ter no mínimo 16 anos.',

                'data_nascimento.required' => 'Data de nascimento é obrigatória.',
                'email.unique' => 'E-mail já cadastrado',
                'cpf.required' => 'CPF é obrigatório',
                'cpf.max' => 'Máximo 14 numeros',
                'cpf.unique' => 'CPF já cadastrado',
                'cpf.cpf' => 'CPF inválido',
                'password.required' => 'Senha é obrigatório',
                'password.min' => 'Minimo 8 caracteres',
                'password.confirmed' => 'Senhas precisam ser iguais',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'data_nascimento' => $data['data_nascimento'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password']),
        ]);

        Candidato::create([
            'user_id' => $user->id,
        ]);

        return $user->assignRole('candidato');
    }

}
