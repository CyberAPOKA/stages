<?php

namespace App\Http\Controllers;

use Alert;
use App\Solicitacao;
use App\User;
use App\Candidato;
use App\Formacao;
use App\Arquivo;
use App\CursoExtra;
use App\Profissional;
use App\ListaEscolaridade;
use App\ListaCursos;
use App\ListaCidade;
use App\ListaBairros;
use App\Http\Requests\FormacaoSanitizedRequest;
use App\Http\Requests\HomeSanitizedRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        try {
            $listaEscolaridades = ListaEscolaridade::all();

            $listaCursos = ListaCursos::all();

            $candidato = Candidato::where('user_id', Auth::user()->id)->first();

            $dados = $candidato->rg;

            if($dados != NULL)
           {
            return redirect()->back()
            ->with('cadastrado', 'msg');
           }

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

                CursoExtra::updateOrCreate(
                    ['id' => $id],
                    [
                        'instagram' => $request->input('instagram'),
                        'facebook' => $request->input('facebook'),
                        'linkedin' => $request->input('linkedin'),
                        'outro' => $request->input('outro'),
                        'links' => $request->input('links'),
                        'candidato_id' => Auth::user()->candidato->id,
                    ]);



            if(!empty($request->allFiles()['anexos'])){
            for($i = 0; $i <count($request->allFiles()['anexos']); $i++){
               $arquivo = $request->allFiles()['anexos'][$i];

               $anexos = new Arquivo();
               $anexos->tipo = 'anexos';
               $anexos->candidato_id = $candidato->id;
               $anexos->arquivo = $arquivo->store('inscricoes/'.$candidato->id);
               $anexos->nomeanexo = $arquivo->getClientOriginalName();
               $anexos->save();
            }
           }


            Alert::success('Informação criada com sucesso!')->autoclose(2000);
            return redirect()->route('curriculo.dados_pessoais')
            ->with('messagehome', 'Seus dados foram registrados com sucesso!');
        } catch (\Exception $e) {
            Alert::error('Não foi possível criar')->autoClose(2000);
            return redirect()->route('home');
        }




    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nomesocial' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:candidatos'],
            'cpf' => ['required', 'string', 'max:14', 'unique:candidatos', 'cpf'],
            'data_nascimento' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ],
            [
                'nomesocial.required' => 'Nome é obrigatório',
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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listaCidades = ListaCidade::all();

        $listaBairros = ListaBairros::all();

        $listaEscolaridades = ListaEscolaridade::get();

        $listaCursos = ListaCursos::get();

        //$formacao = Formacao::get();

        $user = Auth::user();

        $candidato = Candidato::where('user_id', $user->id)->first();

        $formacao = Formacao::where('candidato_id',$candidato->id)->first();
        $profissional = Profissional::where('candidato_id',$candidato->id)->first();
        $cursoExtra = CursoExtra::where('candidato_id',$candidato->id)->first();



        if ($user->hasRole('super-admin')) {
            $totalUsers = User::count();

            $usersRoles = DB::table('model_has_roles')->get();

            $admin = $usersRoles->where('role_id', 1)->count();
            $candidato = $usersRoles->where('role_id', 2)->count();
            $recrutador = $usersRoles->where('role_id', 3)->count();
            $adminDemandante = $usersRoles->where('role_id', 4)->count();
            $secretaria = $usersRoles->where('role_id', 5)->count();
            $secretario = $usersRoles->where('role_id', 6)->count();

            $solicitacoes = Solicitacao::orderBy('created_at', 'desc')->limit(3)->get();
            error_log("teste1555");
            return view('admin.home', compact('user', 'admin', 'candidato', 'recrutador', 'adminDemandante', 'secretaria', 'secretario', 'solicitacoes', 'listaEscolaridades'));
        } else if ($user->hasRole('candidato')) {
            error_log("teste1555");
            return view('candidato.home', compact('user', 'formacao', 'profissional', 'cursoExtra', 'candidato','listaEscolaridades','listaCursos', 'listaCidades', 'listaBairros'));
        } else if ($user->hasRole('recrutador-demandante')) {
            return view('recrutador-demandante/home', compact('user'));
        } else if ($user->hasRole('admin-demandante')) {
            return view('admin-demandante/home', compact('user'));
        } else if ($user->hasRole('secretario')) {
            return view('secretario/home', compact('user'));
        } else if ($user->hasRole('rh')) {
            return view('rh/home', compact('user'));
        } else {
            return view('login');
        }
    }

    public function configConta()
    {
        try {
            $user = Auth::user();

            return view('config.conta', compact('user'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    public function updateConfigs(Request $request)
    {
        try {
            $user = Auth::user();

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // $user->cpf = $request->input('cpf');
            if ($request->input('password') != null) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->update();

            Alert::success('Configurações da conta alteradas!')->autoClose(2000);
            return redirect()->route('conta');
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }
}
