<?php

namespace Modules\Question\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Question\Models\Question;
use Modules\User\Models\User;

class QuestionPolicy
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
     * @param  \Modules\Question\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Question $question)
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
        dd('dsa');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Question\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Question $question)
    {
        return $user->id == $question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Question\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Question $question)
    {
        return ($user->id == $question->user_id) or auth()->user()->rules->first()->slug == 'admin';
    }
}
