<?php

namespace App\Http\Controllers;

use App\Recrutador;
use Illuminate\Http\Request;

class RecrutadorController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recrutador  $recrutador
     * @return \Illuminate\Http\Response
     */
    public function show(Recrutador $recrutador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recrutador  $recrutador
     * @return \Illuminate\Http\Response
     */
    public function edit(Recrutador $recrutador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recrutador  $recrutador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recrutador $recrutador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recrutador  $recrutador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recrutador $recrutador)
    {
        //
    }
}
