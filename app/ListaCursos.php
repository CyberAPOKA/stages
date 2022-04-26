<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaCursos extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'curso', 'escolaridade_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function escolaridade()
    {
        return $this->belongsTo(\App\ListaEscolaridade::class);
    }

    public function formacao()
    {
        return $this->hasMany(\App\Formacao::class);
    }

    public function solicitacao()
    {
        return $this->belongsToMany(\App\Solicitacao::class);
    }
}
