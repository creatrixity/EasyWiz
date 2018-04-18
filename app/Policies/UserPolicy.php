<?php

namespace Framework\Policies;

use Framework\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \Framework\User  $user
     * @param  \Framework\User  $user
     * @return mixed
     */
    public function view(User $user, User $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \Framework\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the authenticated user can update the model.
     *
     * @param  \Framework\User  $user
     * @return bool
     */
    public function update(User $user, User $authUser)
    {
        return $user->id == $authUser->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Framework\User  $user
     * @param  \Framework\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user)
    {
        //
    }
}
