<?php

namespace App\Http\Controllers;

use Alert;
use App\Candidato;
use App\Formacao;
use App\Http\Requests\DadosPessoaisSanitizedRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ListaCidade;
use App\ListaBairros;

class CandidatoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {


            $user = Auth::user();
            $candidato = Candidato::where('user_id', $user->id)->first();

            $candidato->pcd == 0 ? $candidato->pcd = 'Não' : $candidato->pcd = 'Sim';


            return view('cadastro_estagiario.dados_pessoais', compact('candidato', 'user'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    public function create($id)
    {
        try {
            $listaCidades = ListaCidade::all();

            $listaBairros = ListaBairros::all();

            $user = Auth::user();

            $candidato = Candidato::where('user_id', $user->id)->first();

            return view('cadastro_estagiario.dados_pessoais_edit', compact('candidato', 'user', 'listaCidades', 'listaBairros'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    /**
     *  Função updateOrCreate nesse caso funciona tanto para criação quanto
     *  para edição porque é um registro que é criado uma única vez e depois
     *  apenas atualizado, por isso usei a mesma função store para os dois */

    public function store(DadosPessoaisSanitizedRequest $request, $id)
    {


        //dd($request);
        try {
            error_log("teste nome social");
            error_log("NomeSocial" . $request->input('nomesocial'));
            Candidato::updateOrCreate(
                ['user_id' => $id],
                [
                    'nomesocial' => $request->input('nomesocial'),
                    'rg' => $request->input('rg'),
                    'telefoneresidencial' => $request->input('telefoneresidencial'),
                    'telefonecelular' => $request->input('telefonecelular'),
                    'data_nascimento' => $request->input('data_nascimento'),
                    'nome_pai' => $request->input('nome_pai'),
                    'nome_mae' => $request->input('nome_mae'),

                    'deficiencia_fisica' => $request->input('deficiencia_fisica'),
                    'deficiencia_intelectual' => $request->input('deficiencia_intelectual'),
                    'deficiencia_multipla' => $request->input('deficiencia_multipla'),
                    'deficiencia_tea' => $request->input('deficiencia_tea'),
                    'raca' => $request->input('raca'),
                    'rua' => $request->input('rua'),
                    'numero_rua' => $request->input('numero_rua'),
                    'complemento' => $request->input('complemento'),
                    'cep' => $request->input('cep'),
                    'bairro' => $request->input('bairro') ?? $request->input('bairro2'),
                    'cidade' => $request->input('cidade'),

                ]);

            User::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request->input('name'),
                    'cpf' => $request->input('cpf'),
                    'email' => $request->input('email'),
                    'data_nascimento' => $request->input('data_nascimento'),
                ]);

            Alert::success('Dados Pessoais atualizados!')->autoclose(2000);

            return redirect()->route('curriculo.dados_pessoais')->with('message', 'Dados atualizados com sucesso!');
        } catch (\Exception $e) {
            Alert::error('Não foi possível atualizar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

   /* public function insertCheckbox(Request $request)
    {

    if(!empty($request->input('deficiencia'))){
        $checkbox = join(',',$request->input('deficiencia'));
        \DB::table('candidatos')->inser(['deficiencia'=>$checkbox]);
    }else{
        $checkbox = '';
    }
    return redirect()->back();
}*/

/*
    public function deficiencia(){
        if(!empty($request->input('deficiencia'))){
            $checkbox = join(',',$request->input('deficiencia'));
            \DB::table('estagios')->insert(['deficiencia'=>$checkbox]);
        }else{
            $checkbox = '';
        }
        return redirect()->back();
    }
*/

protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:candidatos'],
            'cpf' => ['required', 'string', 'max:14', 'unique:candidatos', 'cpf'],
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



    public function show(Candidato $candidato)
    {
        //
    }

    public function edit(Candidato $candidato)
    {
        //
    }

    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    public function destroy(Candidato $candidato)
    {
        //
    }

    public function completarCurriculo(Candidato $candidato)
    {
        $candidato = Candidato::where('user_id', Auth::user()->id)->first();

        if (!isset($candidato)) {
            return redirect()->route('curriculo.dados_pessoais_edit');
        }

        if (!isset($candidato->formacao[0])) {
            return redirect()->route('curriculo.formacao.create');
        }

        if (!isset($candidato->profissional[0])) {
            return redirect()->route('curriculo.profissional.create');
        }

        if (!isset($candidato->cursoextra[0])) {
            return redirect()->route('curriculo.curso_extra.create');
        }
    }

    public function curriculoDetalhado($id)
    {
        $candidato = Candidato::find($id);

        return view('candidato.curriculo_detalhado', compact('candidato'));

    }
}
