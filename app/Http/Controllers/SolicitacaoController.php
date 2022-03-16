<?php

namespace App\Http\Controllers;

use Alert;
use App\Formacao;
use App\Http\Requests\SolicitacaoSanitizedRequest;
use App\ListaCursos;
use App\Secretaria;
use App\ListaEscolaridade;
use App\Candidato;
use App\Solicitacao;
use App\ListaCidade;
use App\ListaBairros;
use App\User;
use App\Profissional;
use App\CursoExtra;
use App\Arquivo;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitacaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(Request $request)
    {
        $listaEscolaridades = ListaEscolaridade::all();

        $listaCidades = ListaCidade::all();
        $listaBairros = ListaBairros::all();

        $formacao = Formacao::where('turno', 'like', '%'.$request->input('turno').'%')
        ->orderBy('id')->paginate(10);

        $listaCursos = ListaCursos::where('curso', 'like', '%'.$request->input('curso').'%')
        ->orderBy('id')->paginate(18);

        $candidatos = Candidato::where('cidade', 'like', '%'.$request->input('cidade').'%')
        ->where('bairro', 'like', '%'.$request->input('bairro').'%')
        ->orderBy('id')->paginate(10);

            $user = Auth::user();

            return view('solicitacao.consulta',
             compact('candidatos','request', 'listaCursos',
             'listaEscolaridades', 'formacao',
             'listaBairros', 'listaCidades'));
    }


    public function consulta_candidato(Request $request){

        $filters = $request->all();
        $listaCidades = ListaCidade::all();
        $listaBairros = ListaBairros::all();
        $listaEscolaridades = ListaEscolaridade::all();
        $listaCursos = ListaCursos::all();
        $candidatos = Candidato::all();
        $dataForm = $request->except('_token');
        $candidatos = Candidato::where(function($query) use($dataForm){
        })->orderBy('id')->paginate(10);

        $formacao = new Formacao();

        $formacao = Formacao::where(function($query) use($request){

            if(($request->cidade)){

                    $cidade = ($request->cidade);

                    $query = $query->whereHas('candidato', function ($query) use($cidade) {
                    $query->whereIn('candidatos.cidade', $cidade);
                });
            }
            if(($request->bairro)){

                $filtro = $request->bairro;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    $query->whereIn('candidatos.bairro', $filtro);
                });
            }

            if(($request->curso)){
                $filtro = $request->curso;
                $query = $query->whereHas('listaCursos', function ($query) use($filtro) {
                   $query->whereIn('lista_cursos.curso', $filtro);
                });
            }
            if(($request->turno)){
                $filtro = $request->turno;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("formacaos.turno", "LIKE" , "%{$filtro}%");
                });
            }


            if(($request->name)){
                $filtro = $request->name;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.name", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->raca)){
                $filtro = $request->raca;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.raca", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->semestre)){
                $filtro = $request->semestre;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("formacaos.semestre", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->deficiencia_fisica)){
                $filtro = $request->deficiencia_fisica;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.deficiencia_fisica", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->deficiencia_intelectual)){
                $filtro = $request->deficiencia_intelectual;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.deficiencia_intelectual", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->deficiencia_multipla)){
                $filtro = $request->deficiencia_multipla;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.deficiencia_multipla", "LIKE" , "%{$filtro}%");
                });
            }
            if(($request->deficiencia_tea)){
                $filtro = $request->deficiencia_tea;
                $query = $query->whereHas('candidato', function ($query) use($filtro) {
                    return $query->where("candidatos.deficiencia_tea", "LIKE" , "%{$filtro}%");
                });
            }

        })->orderBy('id')->paginate(10);

        return view('solicitacao.consulta', compact('candidatos',
         'listaCursos', 'formacao', 'filters',
        'listaBairros', 'listaCidades'));
    }




    public function visualizar(Request $request, $id){


        $candidatos = Candidato::find($id);
        $arquivos = Arquivo::find($id);

        $candidato = Candidato::where('user_id', Auth::user()->id)->first();
        $documentos = Arquivo::where('candidato_id','=',$id)->orderBy('tipo')->get();

        $user = User::find($id);
        $listaCursos = ListaCursos::find($id);
        $formacao = Formacao::find($id);
        $listaBairros = ListaBairros::find($id);
        $listaCidades = ListaCidade::find($id);
        $profissional = Profissional::find($id);
        $cursoextra = CursoExtra::find($id);


        return view('solicitacao.visualizar', compact('candidatos', 'candidato', 'profissional',
         'listaCursos', 'formacao', 'cursoextra', 'arquivos', 'documentos',
        'listaBairros', 'listaCidades', 'user'));
    }

    public function baixarDocumento($id){

        $arquivo = Arquivo::where('id','=',$id)->get()->first();

        $candidato = Candidato::find($arquivo->candidato_id);

        return Response::download(storage_path('app/public/'.$arquivo->arquivo),str_replace(' ','_',$candidato->nome).'_'.$arquivo->nomeanexo);

}

    public function baixarTodosDocumentos($id){
        $candidato = Candidato::find($id);
        $zip_file = str_replace(' ','_',$candidato->nome) . '_documentos.zip';
        $zip = new \ZipArchive();

        error_log("caminho:" . storage_path('app/public') . '/' . $zip_file);
        $zip->open(storage_path('app/public') . '/' . $zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/public/inscricoes/'.$id);
        $candidatos = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($candidatos as $name => $candidato)
        {
            // We're skipping all subfolders
            if (!$candidato->isDir()) {
                $candidatoPath     = $candidato->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'inscricoes/' . substr($candidatoPath, strlen($path) + 1);

                $zip->addFile($candidatoPath,  $relativePath);
            }
        }
        $zip->close();
        return response()->download(storage_path('app/public') . '/' . $zip_file)->deleteFileAfterSend(true);

    }



    public function create()
    {
        try {
            $listaCursos = ListaCursos::all();

            return view('recrutador-demandante.solicitacao', compact('listaCursos'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    public function store(SolicitacaoSanitizedRequest $request, $id)
    {

        dd($request);
        try {
            DB::table('year_numbers')->updateOrInsert(['year' => now()->year]);
            DB::table('year_numbers')->where('year', now()->year)->increment('number_count');

            $number = DB::table('year_numbers')->where('year', now()->year)->value('number_count');

            $qtd_contratacao = 1;

            if ($request->input('qtd_contratacao') != null) {
                $qtd_contratacao = $request->input('qtd_contratacao');
            }

            $solicitacao = Solicitacao::create(
                [
                    'numero' => now()->year . '/' . $number,
                    'nivel' => $request->input('nivel'),
                    'qtd_contratacao' => $qtd_contratacao,
                    'tel_secretaria' => $request->input('tel_secretaria'),
                    'responsavel' => $request->input('responsavel'),
                    'tipo_contratacao' => $request->input('tipo_contratacao'),
                    'numero_rua' => $request->input('numero_rua'),
                    'nome_estagiario' => $request->input('nome_estagiario'),
                    'informacoes' => $request->input('informacoes'),
                    'recrutador_id' => Auth::user()->recrutador->id,
                    'secretaria_id' => Auth::user()->recrutador->secretaria->id,
                ]);

            foreach ($request['cursos'] as $curso) {
                DB::table('lista_cursos_solicitacao')->insert(
                    ['lista_cursos_id' => $curso, 'solicitacao_id' => $solicitacao->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
                );
            }

            Alert::success('Solicitação criada!')->autoclose(2000);
            return redirect()->route('consulta');
        } catch (\Exception $e) {
            Alert::error('Não foi possível criar')->autoClose(2000);
            return redirect()->route('home');
        }
    }



    public function show(Solicitacao $solicitacao, $id)
    {
        try {
            $solicitacao = Solicitacao::find($id);

            return view('solicitacao.show', compact('solicitacao'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('consulta', compact(''));
        }
    }

    public function edit(Solicitacao $solicitacao)
    {
        //
    }

    public function update(Request $request, Solicitacao $solicitacao)
    {
        //
    }

    public function destroy(Solicitacao $solicitacao)
    {
        //
    }

    public function cancelar($id)
    {
        $solicitacao = Solicitacao::find($id);

        if ($solicitacao->transitionAllowed('cancelar')) {
            $solicitacao->transition('cancelar');
        }
    }

    public function aprovar($id)
    {
        $solicitacao = Solicitacao::find($id);

        if ($solicitacao->transitionAllowed('aprovar_adm')) {
            $solicitacao->transition('aprovar_adm');
        } else if ($solicitacao->transitionAllowed('aprovar_secretario')) {
            $solicitacao->transition('aprovar_secretario');
        }
    }

    public function vincularCandidatos(Request $request, $id)
    {
        $candidatos = $request->input('candidatos');

        $candidatos = explode(",", $candidatos);

        $solicitacao = Solicitacao::find($id);

        foreach ($candidatos as $candidato) {
            $solicitacao->candidatos()->attach($candidato);
        }

        Alert::success('Candidato(s) vinculado(s)!')->autoclose(2000);
        return redirect()->route('consulta.show', $id);
    }

    public function removerCandidato($candidato_id, $id)
    {
        $solicitacao = Solicitacao::find($id);

        $solicitacao->candidatos()->detach($candidato_id);
    }

    public function fila($id)
    {
        try {
            // $listaCursos = ListaCursos::all();
            $listaCursos = DB::table('lista_cursos_solicitacao')->where('solicitacao_id', '=', $id)
            ->join('lista_cursos', 'lista_cursos_solicitacao.lista_cursos_id', '=', 'lista_cursos.id')->get();
            $solicitacao = Solicitacao::find($id);

            return view('candidato.fila', compact('listaCursos', 'solicitacao'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
    }

    public function filtroFila(Request $request, $id)
    {
        // $listaCursos = ListaCursos::all();
        $listaCursos = DB::table('lista_cursos_solicitacao')->where('solicitacao_id', '=', $id)
        ->join('lista_cursos', 'lista_cursos_solicitacao.lista_cursos_id', '=', 'lista_cursos.id')->get();

        $formacoes = Formacao::where('situacao', 'Em andamento')->where('lista_curso_id', $request->curso)->orderBy('created_at', 'asc')->get()->groupBy('lista_curso_id');
        // dd($formacoes->candidato);
        $solicitacao = Solicitacao::find($id);
        // dd($solicitacao);

        return view('candidato.fila', compact('formacoes', 'listaCursos', 'solicitacao'));
    }

    public function ajustes(Request $request, $id)
    {
        try {
            $solicitacao = Solicitacao::find($id);

            if ($solicitacao->transitionAllowed('solicitar_ajustes')) {
                $solicitacao->transition('solicitar_ajustes');
            }

            $solicitacao->ajustes = $request->input('ajustes');
            $solicitacao->nome_ajustes = Auth::user()->name;
            $solicitacao->id_ajustes = Auth::user()->id;

            $solicitacao->update();

            Alert::success('Ajuste solicitado!')->autoClose(2000);
            return redirect()->route('consulta.show', $id);
        } catch (\Exception $e) {
            Alert::error('Não foi possível salvar')->autoClose(2000);
            return redirect()->route('home');
        }
    }
}
