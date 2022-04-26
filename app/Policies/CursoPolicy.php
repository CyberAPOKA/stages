<?php

namespace App\Policies;

use App\User;
use App\Curso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any curso.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the curso.
     *
     * @param  App\User  $user
     * @param  App\Curso  $curso
     * @return bool
     */
    public function view(User $user, Curso $curso)
    {
        return false;
    }

    /**
     * Determine whether the user can create a curso.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the curso.
     *
     * @param  App\User  $user
     * @param  App\Curso  $curso
     * @return bool
     */
    public function update(User $user, Curso $curso)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the curso.
     *
     * @param  App\User  $user
     * @param  App\Curso  $curso
     * @return bool
     */
    public function delete(User $user, Curso $curso)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the curso.
     *
     * @param  App\User  $user
     * @param  App\Curso  $curso
     * @return bool
     */
    public function restore(User $user, Curso $curso)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the curso.
     *
     * @param  App\User  $user
     * @param  App\Curso  $curso
     * @return bool
     */
    public function forceDelete(User $user, Curso $curso)
    {
        return false;
    }
}
