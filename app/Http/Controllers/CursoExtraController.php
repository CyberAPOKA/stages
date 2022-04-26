<?php

namespace App\Http\Controllers;

use Alert;
use App\Candidato;
use App\CursoExtra;
use App\Arquivo;
use PDF;
use DB;
use App\Http\Requests\CandidatoRequest;
use App\Http\Requests\CursoExtraSanitizedRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoExtraController extends Controller
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
    public function index(Request $request, Arquivo $documentos)
    {

        try {
            $candidato = Candidato::where('user_id', Auth::user()->id)->first();

            $documentos = Arquivo::where('candidato_id', Auth::user()->id)->first();


            return view('cadastro_estagiario.curso_extra', compact('candidato', 'documentos'));
        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');
        }
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

    public function deletepdf($id){
        $documentos = Arquivo::findOrFail($id);
        $documentos->delete();
        $msg = 'excluido com sucesso';
        return redirect()->back()->with('messageerror', 'Arquivo de PDF '.$documentos->nomeanexo.' Excluído!');
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

            return view('cadastro_estagiario.curso_extra_create', compact('candidato'));
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
    public function store(Request $request)
    {
        $candidato = Candidato::where('user_id', Auth::user()->id)->first();

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

        try {
            CursoExtra::create([
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'linkedin' => $request->input('linkedin'),
                'outro' => $request->input('outro'),
                'links' => $request->input('links'),
                'candidato_id' => Auth::user()->candidato->id,
            ]);

            Alert::success('Informação criada com sucesso!')->autoclose(2000);
            return redirect()->route('curriculo.curso_extra');
        } catch (\Exception $e) {
            Alert::error('Não foi possível criar')->autoClose(2000);
            return redirect()->route('home');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CursoExtra  $cursoExtra
     * @return \Illuminate\Http\Response
     */
    public function show(CursoExtra $cursoExtra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CursoExtra  $cursoExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(CursoExtra $cursoExtra, $id)
    {
        try {
            $cursoExtra = CursoExtra::find($id);
            $candidato = Candidato::where('user_id', Auth::user()->id)->first();
            $documentos = Arquivo::where('candidato_id','=',$id)->orderBy('id')->take(10)->get();

            return view('cadastro_estagiario.curso_extra_edit',
             compact('cursoExtra', 'documentos', 'candidato'));

        } catch (\Exception $e) {
            Alert::error('Não foi possível acessar')->autoClose(2000);
            return redirect()->route('home');


        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CursoExtra  $cursoExtra
     * @return \Illuminate\Http\Response
     */
    public function update(CursoExtraSanitizedRequest $request, CursoExtra $cursoExtra, $id)
    {
        $candidato = Candidato::where('user_id', Auth::user()->id)->first();

        $documentos = Arquivo::where('candidato_id','=',$id)->orderBy('id')->take(10)->get();
        //dd(count($documentos));
        if(count($documentos) >= 5)
           {
            return redirect()->back()
            ->with('errorpdf', 'Dados atualizados com sucesso!');
           }

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



        try {
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

                Alert::message('Location data entered succesfully!');

            return redirect()->route('curriculo.curso_extra')
            ->with('message', 'Dados atualizados com sucesso!');

        } catch (\Exception $e) {
            Alert::error('Não foi possível atualizar!')->autoClose(2000);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CursoExtra  $cursoExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arquivo $arquivo, CursoExtra $cursoExtra, $id)
    {
        try {

            $arquivo = Arquivo::findOrFail($id);
            $arquivo->delete();

            $cursoExtra = CursoExtra::findOrFail($id);
            $cursoExtra->delete();


        } catch (\Exception $e) {
            Alert::error('Não foi possível deletar!')->autoClose(2000);
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        $arquivo = Arquivo::find($id);
        $arquivo->delete();

        return redirect()->back();
    }
}
