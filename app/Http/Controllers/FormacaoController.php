<?php

namespace App\Http\Controllers;

use Alert;
use App\Candidato;
use App\Formacao;
use App\Http\Requests\FormacaoSanitizedRequest;
use App\ListaCursos;
use App\ListaEscolaridade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormacaoController extends Controller
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

            $listaEscolaridades = ListaEscolaridade::all();

            return view('cadastro_estagiario.formacao', compact('candidato', 'listaEscolaridades'));
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

            $listaEscolaridades = ListaEscolaridade::all();

            $listaCursos = ListaCursos::all();

            return view('cadastro_estagiario.formacao_create', compact('candidato', 'listaEscolaridades', 'listaCursos'));
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
    public function store(FormacaoSanitizedRequest $request)
    {
        try {
            Formacao::create([
                'lista_curso_id' => $request->input('curso'),
                'semestre' => $request->input('semestre'),
                'turno' => $request->input('turno'),
                'instituicao' => $request->input('instituicao'),
                'situacao' => $request->input('situacao'),
                'candidato_id' => Auth::user()->candidato->id,
            ]);

            Alert::success('Formação criada com sucesso!')->autoclose(2000);
            return redirect()->route('curriculo.formacao');
        } catch (\Exception $e) {
            Alert::error('Não foi possível criar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function show(Formacao $formacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Formacao $formacao, $id)
    {
        try {
            $formacao = Formacao::find($id);

            $listaEscolaridades = ListaEscolaridade::get();

            $listaCursos = ListaCursos::get();

            return view('cadastro_estagiario.formacao_edit', compact('formacao', 'listaEscolaridades', 'listaCursos'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function update(FormacaoSanitizedRequest $request, Formacao $formacao, $id)
    {
        try {
            Formacao::updateOrCreate(
                ['id' => $id],
                [
                    'lista_curso_id' => $request->input('curso'),
                    'semestre' => $request->input('semestre'),
                    'turno' => $request->input('turno'),
                    'instituicao' => $request->input('instituicao'),
                    'situacao' => $request->input('situacao'),
                    'candidato_id' => Auth::user()->candidato->id,
                ]);

            Alert::success('Formação atualizada com sucesso!')->autoclose(2000);

            return redirect()->route('curriculo.formacao')->with('message', 'Dados atualizados com sucesso!');
        } catch (\Exception $e) {
            Alert::error('Não foi possível atualizar!')->autoClose(2000);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formacao $formacao, $id)
    {
        try {
            $formacao = Formacao::findOrFail($id);
            $formacao->delete();
        } catch (\Exception $e) {
            Alert::error('Não foi possível deletar!')->autoClose(2000);
            return redirect()->back();
        }
    }
}
