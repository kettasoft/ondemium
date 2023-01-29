<?php

namespace Modules\Question\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Question\Models\Answer;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function HeHasThePowerToUpdateAnswer($user, Answer $answer)
    {
        return $answer->doctor_id === $user->id;
    }
}
