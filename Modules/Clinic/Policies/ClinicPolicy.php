<?php

namespace Modules\Clinic\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use Modules\Clinic\Models\Clinic;

class ClinicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Modules\User\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Clinic\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Clinic $clinic)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Modules\User\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->ability('clinic.create') || $user->rules->first()->slug == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Clinic\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Clinic $clinic)
    {
        return ($user->id === $clinic->user_id) && ($user->ability('clinic.create') || $user->rules->first()->slug == 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Clinic\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Clinic $clinic)
    {
        return ($user->id === $clinic->user_id) && ($user->ability('clinic.delete') || $user->rules->first()->slug == 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     * 
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Clinic\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function setStatus(User $user, Clinic $clinic)
    {
        return auth()->user()->rules->first()->slug == 'admin';
    }
}
