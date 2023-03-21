<?php

namespace Modules\Question\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Question\Models\Answer;
use Modules\User\Models\User;

class AnswerPolicy
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
     * @param  \Modules\Answer\Models\Answer  $answer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Answer $answer)
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
        dd($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Answer\Models\Answer  $answer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Answer $answer)
    {
        return $user->id == $answer->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Answer\Models\Answer  $answer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Answer $answer)
    {
        return true;
        return ($user->id == $answer->user_id) or auth()->user()->rules->first()->slug == 'admin';
    }

    public function approved(User $user, Answer $answer)
    {
        return ($answer->question->user_id === auth()->id());
    }
}
