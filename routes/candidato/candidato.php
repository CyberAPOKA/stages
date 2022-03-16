<?php

use App\Http\Controllers\CandidatoController;

Route::group([
    'middleware' => 'auth',
], function () {

    Route::group([
        'middleware' => ['role:super-admin|candidato'],
        'prefix' => 'curriculo',
    ], function () {

        //Dashboard
        Route::get('/completar_curriculo', 'CandidatoController@completarCurriculo')->name('curriculo.completar');

        //Dados Pessoais
        Route::get('/dados_pessoais', 'CandidatoController@index')->name('curriculo.dados_pessoais');

        Route::get('/dados_pessoais/edit/{id}', 'CandidatoController@create')->name('curriculo.dados_pessoais_edit');

        Route::post('/dados_pessoais/update/{id}', 'CandidatoController@store')->name('curriculo.dados_pessoais_update');

        //Formação
        Route::get('/formacao', 'FormacaoController@index')->name('curriculo.formacao');

        Route::get('/formacao/edit/{id}', 'FormacaoController@edit')->name('curriculo.formacao.edit');

        Route::get('/formacao/create', 'FormacaoController@create')->name('curriculo.formacao.create');

        Route::post('/formacao/store/{id}', 'FormacaoController@store')->name('curriculo.formacao.store');

        Route::post('/formacao/update/{id}', 'FormacaoController@update')->name('curriculo.formacao.update');

        Route::post('/formacao/delete/{id}', 'FormacaoController@destroy')->name('curriculo.formacao.delete');

        //Profissional
        Route::get('/profissional', 'ProfissionalController@index')->name('curriculo.profissional');

        Route::get('/profissional/edit/{id}', 'ProfissionalController@edit')->name('curriculo.profissional.edit');

        Route::get('/profissional/create', 'ProfissionalController@create')->name('curriculo.profissional.create');

        Route::post('/profissional/store/{id}', 'ProfissionalController@store')->name('curriculo.profissional.store');

        Route::post('/profissional/update/{id}', 'ProfissionalController@update')->name('curriculo.profissional.update');

        Route::post('/profissional/delete/{id}', 'ProfissionalController@destroy')->name('curriculo.profissional.delete');

        //Cursos Extras


        Route::get('/curso_extra', 'CursoExtraController@index')->name('curriculo.curso_extra');

        Route::any('/curso_extra/edit/excluir/{id}', 'CursoExtraController@deletepdf')->name('deletepdf');

        Route::get('/curso_extra/edit/{id}', 'CursoExtraController@edit')->name('curriculo.curso_extra.edit');

        Route::get('/curso_extra/create', 'CursoExtraController@create')->name('curriculo.curso_extra.create');

        Route::post('/curso_extra/store/{id}', 'CursoExtraController@store')->name('curriculo.curso_extra.store');

        Route::post('/curso_extra/update/{id}', 'CursoExtraController@update')->name('curriculo.curso_extra.update');

        Route::post('/curso_extra/delete/{id}', 'CursoExtraController@destroy')->name('curriculo.curso_extra.delete');



    });
});
