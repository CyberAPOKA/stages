<?php

namespace App\Policies;

use App\User;
use App\Formacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormacaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any formacao.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the formacao.
     *
     * @param  App\User  $user
     * @param  App\Formacao  $formacao
     * @return bool
     */
    public function view(User $user, Formacao $formacao)
    {
        return false;
    }

    /**
     * Determine whether the user can create a formacao.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the formacao.
     *
     * @param  App\User  $user
     * @param  App\Formacao  $formacao
     * @return bool
     */
    public function update(User $user, Formacao $formacao)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the formacao.
     *
     * @param  App\User  $user
     * @param  App\Formacao  $formacao
     * @return bool
     */
    public function delete(User $user, Formacao $formacao)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the formacao.
     *
     * @param  App\User  $user
     * @param  App\Formacao  $formacao
     * @return bool
     */
    public function restore(User $user, Formacao $formacao)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the formacao.
     *
     * @param  App\User  $user
     * @param  App\Formacao  $formacao
     * @return bool
     */
    public function forceDelete(User $user, Formacao $formacao)
    {
        return false;
    }
}
