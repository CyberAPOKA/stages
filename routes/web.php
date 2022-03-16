<?php


Route::delete('/delete/{id}', 'CursoExtraController@delete');

Route::get('/', function () {
    return view('auth.login');
})->name('index');;

Route::get('/voltar', function () {
    return redirect()->back()->withInput();
})->name('voltar');

Auth::routes();

Route::group([
    'middleware' => 'auth',
], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/inscricao/{id}', 'HomeController@store')->name('store');

    Route::get('/fila/{id}', 'SolicitacaoController@fila')->name('fila');

    Route::any('/fila/filtrar/{id}', 'SolicitacaoController@filtroFila')->name('filtrar');

    Route::get('/candidato/{id}', 'CandidatoController@curriculoDetalhado')->name('curriculo.detalhado');

    Route::post('/vincular-candidatos/{id}', 'SolicitacaoController@vincularCandidatos')->name('vincular.candidatos');

    Route::post('/remover-candidato/{candidato_id}/{id}', 'SolicitacaoController@removerCandidato')->name('remover.candidato');

    Route::group([
        'middleware' => ['role:super-admin'],
    ], function () {

        Route::get('/dashboard', 'AdminController@index')->name('dashboard');

        Route::get('/users/create', 'AdminController@createUsers')->name('users.create');

        Route::post('/users/store', 'AdminController@storeUsers')->name('users.store');
    });

    Route::get('/configuracoes/conta', 'HomeController@configConta')->name('conta');
    Route::post('/configuracoes/conta/atualizar', 'HomeController@updateConfigs')->name('update.configs');
});
