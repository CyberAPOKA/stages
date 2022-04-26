<?php

namespace App\Policies;

use App\User;
use App\Profissional;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfissionalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any profissional.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the profissional.
     *
     * @param  App\User  $user
     * @param  App\Profissional  $profissional
     * @return bool
     */
    public function view(User $user, Profissional $profissional)
    {
        return false;
    }

    /**
     * Determine whether the user can create a profissional.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the profissional.
     *
     * @param  App\User  $user
     * @param  App\Profissional  $profissional
     * @return bool
     */
    public function update(User $user, Profissional $profissional)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the profissional.
     *
     * @param  App\User  $user
     * @param  App\Profissional  $profissional
     * @return bool
     */
    public function delete(User $user, Profissional $profissional)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the profissional.
     *
     * @param  App\User  $user
     * @param  App\Profissional  $profissional
     * @return bool
     */
    public function restore(User $user, Profissional $profissional)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the profissional.
     *
     * @param  App\User  $user
     * @param  App\Profissional  $profissional
     * @return bool
     */
    public function forceDelete(User $user, Profissional $profissional)
    {
        return false;
    }
}
