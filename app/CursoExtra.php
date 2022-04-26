<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoExtra extends Model
{
    protected $fillable = [
        'id', 'instagram', 'facebook', 'linkedin', 'outro', 'links',  'candidato_id',
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
     * Get the Candidato for the Curso.
     */
    public function candidato()
    {
        return $this->belongsTo(\App\Candidato::class);
    }
}
