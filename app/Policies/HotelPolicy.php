<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
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
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Hotel $hotel)
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
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Hotel $hotel)
    {
        return $user->role == 'admin' or $user->role == 'superadmin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Hotel $hotel)
    {
        return $user->role == 'superadmin';
    }

}
