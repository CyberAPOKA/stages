<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoState extends Model
{
    protected $fillable = ['transition','from','user_id','solicitacao_id','to'];

    public function solicitacao() {
        return $this->belongsTo('App\Solicitacao');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
