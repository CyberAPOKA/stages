<?php

use App\Http\Controllers\SolicitacaoController;

Route::group([
    'middleware' => 'auth',
], function () {

    Route::group([
        'middleware' => ['role:super-admin|recrutador-demandante|admin-demandante|secretario'],
    ], function () {

        Route::get('/consulta', 'SolicitacaoController@index')->name('consulta');

        Route::any('/consulta/candidato','SolicitacaoController@consulta_candidato')->name('consulta_candidato');

        Route::get('/consulta/teste/{id}', 'SolicitacaoController@teste')->name('teste');

        Route::get('/consulta/visualizar/{id}', 'SolicitacaoController@visualizar')->name('visualizar');

        Route::get('/consulta/visualizar/baixar/{id}','SolicitacaoController@baixarDocumento')->name('baixar.documento');

        Route::get('/consulta/visualizar/baixartodos/{id}','SolicitacaoController@baixarTodosDocumentos')->name('baixar.todos');


        Route::get('/consulta/show/{id}', 'SolicitacaoController@show')->name('consulta.show');

        Route::post('/ajustes/{id}', 'SolicitacaoController@ajustes')->name('solicitacao.ajustes');

        Route::post('/solicitacao/cancelar/{id}', 'SolicitacaoController@cancelar')->name('solicitacao.cancelar');

        Route::post('/solicitacao/aprovar/{id}', 'SolicitacaoController@aprovar')->name('solicitacao.aprovar');

    });
});
