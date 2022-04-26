<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = [
        'id', 'anexos', 'arquivo', 'tipo', 'nomeanexo', 'candidato_id',
    ];

}



