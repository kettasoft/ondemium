<?php

namespace Modules\Question\Events;

use Illuminate\Queue\SerializesModels;

class QuestionExpired
{
    use SerializesModels;

    public $expireQuestions;

    public function __construct($expireQuestions)
    {
        $this->expireQuestions = $expireQuestions;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
