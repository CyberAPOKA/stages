<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaCidade extends Model
{

    protected $fillable = [
        'id', 'cidade', 'lista_cidades'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function listaBairros()
    {
        return $this->hasMany(\App\ListaBairros::class);
    }
}
