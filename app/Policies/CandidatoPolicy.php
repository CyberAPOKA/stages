<?php

namespace App\Policies;

use App\User;
use App\Candidato;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any candidato.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the candidato.
     *
     * @param  App\User  $user
     * @param  App\Candidato  $candidato
     * @return bool
     */
    public function view(User $user, Candidato $candidato)
    {
        return false;
    }

    /**
     * Determine whether the user can create a candidato.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the candidato.
     *
     * @param  App\User  $user
     * @param  App\Candidato  $candidato
     * @return bool
     */
    public function update(User $user, Candidato $candidato)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the candidato.
     *
     * @param  App\User  $user
     * @param  App\Candidato  $candidato
     * @return bool
     */
    public function delete(User $user, Candidato $candidato)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the candidato.
     *
     * @param  App\User  $user
     * @param  App\Candidato  $candidato
     * @return bool
     */
    public function restore(User $user, Candidato $candidato)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the candidato.
     *
     * @param  App\User  $user
     * @param  App\Candidato  $candidato
     * @return bool
     */
    public function forceDelete(User $user, Candidato $candidato)
    {
        return false;
    }
}
