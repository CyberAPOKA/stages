<?php

namespace App;

use App\Traits\Statable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitacao extends Model
{
    use SoftDeletes;
    use Statable;

    const HISTORY_MODEL = [
        'name' => 'App\SolicitacaoState', // the related model to store the history
    ];
    const SM_CONFIG = 'solicitacao'; // the SM graph to use
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'numero', 'nivel', 'qtd_contratacao', 'tel_secretaria', 'responsavel', 'horarios', 'tipo_contratacao', 'nome_estagiario', 'informacoes', 'recrutador_id', 'secretaria_id', 'last_state', 'nome_ajustes', 'id_ajustes'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function candidatos()
    {
        return $this->belongsToMany(\App\Candidato::class);
    }

    public function curso()
    {
        return $this->belongsToMany(\App\ListaCursos::class);
    }

    public function recrutador()
    {
        return $this->belongsTo(\App\Recrutador::class);
    }

    public function secretaria()
    {
        return $this->belongsTo(\App\Secretaria::class);
    }
}
