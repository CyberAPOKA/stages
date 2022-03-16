<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'lista_curso_id', 'area', 'curso', 'semestre', 'turno', 'instituicao', 'situacao', 'candidato_id',
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
        //
    ];

    /**
     * Get the Candidato for the Formacao.
     */
    public function candidato()
    {
        return $this->belongsTo(\App\Candidato::class);
    }

    public function listaCursos()
    {
        return $this->belongsTo(\App\ListaCursos::class, 'lista_curso_id');
    }
}
