<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaEscolaridade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'escolaridade'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function listaCursos()
    {
        return $this->hasMany(\App\ListaCursos::class);
    }
}
