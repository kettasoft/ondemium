<?php

namespace Modules\Question\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Question\Models\Question;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function HeHasThePowerToQuestion($user, Question $question)
    {
        $class = get_class($user);
        if (($question->questionable_type == $class) AND $question->questionable_id == $user->id) {
            return true;
        }

        return false;
    }
}
