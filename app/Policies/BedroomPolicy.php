<?php

namespace App\Policies;

use App\Models\Bedroom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BedroomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Bedroom $bedroom)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'admin' or $user->role == 'superadmin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Bedroom $bedroom)
    {
        return $user->role == 'admin' or $user->role == 'superadmin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Bedroom $bedroom)
    {
        return $user->role == 'superadmin';
    }

}
