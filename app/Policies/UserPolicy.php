<?php

namespace App\Policies;

use App\User;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any user.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return bool
     */
    public function view(User $user, User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can create a user.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return bool
     */
    public function update(User $user, User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return bool
     */
    public function delete(User $user, User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return bool
     */
    public function restore(User $user, User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return bool
     */
    public function forceDelete(User $user, User $user)
    {
        return false;
    }
}
