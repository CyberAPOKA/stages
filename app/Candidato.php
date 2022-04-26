<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "candidatos";
    protected $fillable = [
        'id','name', 'email', 'cpf', 'password',
         'nomesocial','rg', 'telefoneresidencial','telefonecelular', 'data_nascimento',
          'nome_pai', 'nome_mae','deficiencia', 'raca', 'rua', 'numero_rua', 'complemento',
           'cep', 'bairro', 'cidade', 'user_id',
        'deficiencia_fisica', 'deficiencia_intelectual', 'deficiencia_multipla', 'deficiencia_tea'
    ];


    public function search(Array $data, $totalPage){
        $candidatos = $this->where(function ($query) use($data){
            if(isset($data['name']))
            $query->where('name', $data['name']);

            if(isset($data['email']))
            $query->where('email', $data['email']);

            if(isset($data['nome_pai']))
            $query->where('nome_pai', $data['nome_pai']);

        })
        ->paginate($totalPage);
        return $candidatos;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['data_nascimento', 'created_at', 'updated_at'];

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
        'numero_rua' => 'integer',
    ];

    /**
     * Get the Formacaos for the Candidato.
     */
    public function formacao()
    {
        return $this->hasMany(\App\Formacao::class);
    }

    /**
     * Get the Profissionals for the Candidato.
     */
    public function profissional()
    {
        return $this->hasMany(\App\Profissional::class);
    }

    /**
     * Get the Cursos for the Candidato.
     */
    public function cursoextra()
    {
        return $this->hasMany(\App\CursoExtra::class);
    }

    public function arquivo()
    {
        return $this->hasMany(\App\Arquivo::class);
    }

    /**
     * Get the User for the Candidato.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function solicitacao()
    {
        return $this->belongsToMany(\App\Solicitacao::class);
    }
}
