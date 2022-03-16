<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDemandante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'user_id', 'secretaria_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    // public function solicitacao()
    // {
    //     return $this->hasMany(\App\Solicitacao::class);
    // }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function secretaria()
    {
        return $this->belongsTo(\App\Secretaria::class);
    }
}
