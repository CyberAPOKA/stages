<?php

namespace App\Http\Controllers;

use Alert;
use App\AdminDemandante;
use App\Http\Requests\AdminUserSanitizedRequest;
use App\Recrutador;
use App\Secretaria;
use App\Secretario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createUsers()
    {
        try {
            $secretarias = Secretaria::all();

            return view('admin.create-users', compact('secretarias'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    //Criar usuários por dentro do sistema através de administrador
    public function storeUsers(AdminUserSanitizedRequest $request)
    {
        // try {
        if ($request->tipo_user == 'Recrutador') {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Recrutador::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
                'secretaria_id' => $request->input('secretaria'),
            ]);

            $user->assignRole('recrutador-demandante');

        }

        if ($request->tipo_user == 'Admin-demandante') {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            AdminDemandante::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
                'secretaria_id' => $request->input('secretaria'),
            ]);

            $user->assignRole('admin-demandante');
        }

        if ($request->tipo_user == 'Secretário') {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Secretario::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
                'secretaria_id' => $request->input('secretaria'),
            ]);

            $user->assignRole('secretario');
        }

        if ($request->tipo_user == 'Secretaria') {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Secretaria::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
            ]);

            $user->assignRole('secretaria');
        }

        Alert::success('Usuário criado!')->autoclose(2000);
        return redirect()->route('home');
        // } catch (\Exception $e) {
        //     Alert::error('Não foi possível acessar')->autoClose(2000);
        //     return redirect()->route('home');
        // }

    }
}
