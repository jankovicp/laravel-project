<?php

namespace App\Policies;

use App\Models\Accommodation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AccommodationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */






    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Accommodation $accommodation)
    {
        return $user->id === $accommodation->users_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Accommodation $accommodation)
    {
        return $user->id === $accommodation->users_id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Accommodation $accommodation)
    {
        return $user->id === $accommodation->users_id;
    }

}
