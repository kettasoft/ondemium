<?php

namespace Modules\Question\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Question\Models\Question;
use Modules\Question\Models\Answer;
use Modules\Question\Http\Requests\MakeQuestionRequest;
use Modules\Question\Http\Requests\AnswerToQuestionRequest;

class AnswerController extends Controller
{

    // Status code 400 bad request
    private const BAD_REQUEST = 400;

    /**
     * Get an answer that belongs to a question
     * @param Question $question
     * @param int $answer_id
     * @return Answer|null
     * */
    private function answer(Question $question, int $answer_id)
    {
        return $question->answers()->where('id', $answer_id)->first();
    }

    public function make(AnswerToQuestionRequest $request, Question $question_id)
    {
        $question_id->answers()->create(array_merge($request->all(), [
            'doctor_id' => auth()->id()
        ]));

        return alert('Your answer has been successfully added to this question.', status:201);
    }

    /**
     * Update an answer that belongs to a question
     * @param AnswerToQuestionRequest $request
     * @param Question $question_id
     * @param int $id
     * @return ResponseJson
     * */
    public function update(AnswerToQuestionRequest $request, Question $question_id, int $id)
    {
        $answer = $this->answer($question_id, $id);

        if (Gate::allows('HeHasThePowerToUpdateAnswer', $answer)) {
            $answer->update($request->all());
            return alert('Your answer has been updated successfully.');
        }

        return alert('unauthorized', status:401);
    }

    /**
     * Delete an answer that belongs to a question
     * @param Question $question_id
     * @param int $id
     * @return ResponseJson
     * */
    public function delete(Question $question_id, int $id)
    {
        $answer = $this->answer($question_id, $id);

        if (Gate::allows('HeHasThePowerToUpdateAnswer', $answer)) {
            $answer->delete();
            return alert('Your answer has been deleted successfully.');
        }

        return alert('unauthorized', status:401);
    }
}
