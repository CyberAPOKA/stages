<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'user_id',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function solicitacao()
    {
        return $this->hasMany(\App\Solicitacao::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function recrutador()
    {
        return $this->hasMany(\App\Recrutador::class);
    }

    public function adminDemandante()
    {
        return $this->hasMany(\App\AdminDemandante::class);
    }

    public function secretario()
    {
        return $this->hasMany(\App\Secretario::class);
    }
}
