<?php

namespace App\Http\Controllers;

use Alert;
use App\Candidato;
use App\Http\Requests\ProfissionalSanitizedRequest;
use App\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfissionalController extends Controller
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
        try {
            $candidato = Candidato::where('user_id', Auth::user()->id)->first();

            return view('cadastro_estagiario.profissional', compact('candidato'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $candidato = Candidato::where('user_id', Auth::user()->id)->first();

            return view('cadastro_estagiario.profissional_create', compact('candidato'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfissionalSanitizedRequest $request)
    {
        try {

            Profissional::create([
                'cursosrealizados' => $request->input('cursosrealizados'),
                'outrosconhecimentos' => $request->input('outrosconhecimentos'),
                'experienciasprofissionais' => $request->input('experienciasprofissionais'),
                'jafoiestagiario' => $request->input('jafoiestagiario'),
                'inicioperiodo' => $request->input('inicioperiodo'),
                'fimperiodo' => $request->input('fimperiodo'),
                'secretaria' => $request->input('secretaria'),
                'candidato_id' => Auth::user()->candidato->id,
            ]);

            Alert::success('Informação criada com sucesso!')->autoclose(2000);
            return redirect()->route('curriculo.profissional');
        } catch (\Exception $e) {
            Alert::error('Não foi possível criar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function show(Profissional $profissional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function edit(Profissional $profissional, $id)
    {
        try {
            $profissional = Profissional::find($id);

            return view('cadastro_estagiario.profissional_edit', compact('profissional'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function update(ProfissionalSanitizedRequest $request, Profissional $profissional, $id)
    {
        try {

            Profissional::updateOrCreate(
                ['id' => $id],
                [
                    'cursosrealizados' => $request->input('cursosrealizados'),
                    'outrosconhecimentos' => $request->input('outrosconhecimentos'),
                    'experienciasprofissionais' => $request->input('experienciasprofissionais'),
                    'jafoiestagiario' => $request->input('jafoiestagiario'),
                    'inicioperiodo' => $request->input('inicioperiodo'),
                    'fimperiodo' => $request->input('fimperiodo'),
                    'secretaria' => $request->input('secretaria'),

                    'candidato_id' => Auth::user()->candidato->id,
                ]);

            Alert::success('Informação atualizada com sucesso!')->autoclose(2000);

            return redirect()->route('curriculo.profissional')->with('message', 'Dados atualizados com sucesso!');
        } catch (\Exception $e) {
            Alert::error('Não foi possível atualizar!')->autoClose(2000);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profissional $profissional, $id)
    {
        try {
            $profissional = Profissional::findOrFail($id);
            $profissional->delete();
        } catch (\Exception $e) {
            Alert::error('Não foi possível deletar!')->autoClose(2000);
            return redirect()->back();
        }
    }
}
