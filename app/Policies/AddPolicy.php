<?php

namespace App\Policies;

use App\Models\Add;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Add $add)
    {
        return $user->id === $add->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Add $add)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Auth\Access\Response|bool
     */

}
