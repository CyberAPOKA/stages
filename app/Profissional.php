<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cursosrealizados', 'outrosconhecimentos', 'experienciasprofissionais',
        'jafoiestagiario', 'inicioperiodo','fimperiodo', 'secretaria', 'candidato_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'emprego_atual' => 'boolean',
    ];

    /**
     * Get the Candidato for the Profissional.
     */
    public function candidato()
    {
        return $this->belongsTo(\App\Candidato::class);
    }

}
