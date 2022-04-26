<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deficiencia extends Model
{
    protected $fillable = [ 'id','deficiencia','candidato_id' ];

    public function candidato()
    {
        return $this->belongsTo(\App\Candidato::class);
    }

    
}
