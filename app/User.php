<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable implements Auditable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    // use CustomResetPasswordNotification;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'data_nascimento', 'cpf', 'password',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['email_verified_at', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    /**
     * Get the Candidato for the User.
     */
    public function candidato()
    {
        return $this->hasOne(\App\Candidato::class);
    }

    public function recrutador()
    {
        return $this->hasOne(\App\Recrutador::class);
    }

    public function secretaria()
    {
        return $this->hasOne(\App\Secretaria::class);
    }

    public function adminDemandante()
    {
        return $this->hasOne(\App\AdminDemandante::class);
    }

    public function secretario()
    {
        return $this->hasOne(\App\Secretario::class);
    }

}
