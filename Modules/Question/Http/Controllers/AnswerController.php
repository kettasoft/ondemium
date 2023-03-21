<?php

namespace Modules\Question\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Question\Models\Question;
use Modules\Question\Models\Answer;
use Modules\Question\Http\Requests\MakeQuestionRequest;
use Modules\Question\Http\Requests\AnswerToQuestionRequest;

class AnswerController extends Controller
{
    public function make(AnswerToQuestionRequest $request, Question $question)
    {
        // if (auth()->id() == $question->user_id) abort(403);

        if (! auth()->user()->specializations()->whereId($question->specialty)->exists()) {
            return alert('Sorry, this question is not belongs for you', false, 400);
        }

        if (($question->is_multi_answer == 0 && !empty($question->answers->toArray()))) {
            return alert('Your', false, 400);
        }

        $question->answers()->create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return alert('Your answer has been successfully added to this question.', status:201);
    }

    /**
     * Delete an answer that belongs to a question
     * @param Question $question
     * @return ResponseJson
     * */
    public function delete(Question $question, Answer $answer)
    {
        $answer->delete();
        return alert('Your answer has been deleted successfully.');
    }

    public function approved(Question $question, Answer $answer)
    {
        $this->authorize('approved', $answer);

        if ($answer->approved == false) {
            $answer->update(['approved' => true]);
            return alert('an answer is approved');
        }
    }
}
