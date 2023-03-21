<?php

namespace App\Observers;

use Modules\Question\Models\Answer;

class AnswerObserver
{
    /**
     * Handle the Answer "created" event.
     *
     * @param  \Modules\Question\Models\Answer  $answer
     * @return void
     */
    public function created(Answer $answer)
    {
        $answer->question->user->notify();
    }

    /**
     * Handle the Answer "updated" event.
     *
     * @param  \Modules\Question\Models\Answer  $answer
     * @return void
     */
    public function updated(Answer $answer)
    {
        $answer->user->profile->update(['answers' => $answer->user->profile->answers + 1]);
    }

    /**
     * Handle the Answer "deleted" event.
     *
     * @param  \Modules\Question\Models\Answer  $answer
     * @return void
     */
    public function deleted(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "restored" event.
     *
     * @param  \Modules\Question\Models\Answer  $answer
     * @return void
     */
    public function restored(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "force deleted" event.
     *
     * @param  \Modules\Question\Models\Answer  $answer
     * @return void
     */
    public function forceDeleted(Answer $answer)
    {
        //
    }
}
