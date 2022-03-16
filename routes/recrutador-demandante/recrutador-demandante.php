<?php

use App\Http\Controllers\SolicitacaoController;

Route::group([
    'middleware' => 'auth',
], function () {

    Route::group([
        'middleware' => ['role:super-admin|recrutador-demandante'],
        //'prefix' => 'curriculo',
    ], function () {

        Route::get('/solicitacao/create', 'SolicitacaoController@create')->name('solicitacao.create');

        Route::post('/solicitacao/store/{id}', 'SolicitacaoController@store')->name('solicitacao.store');

    });
});
