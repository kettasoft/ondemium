<?php

namespace Modules\Question\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Question\Models\Question;
use Modules\Question\Http\Requests\MakeQuestionRequest;
use Modules\Question\Http\Requests\AnswerToQuestionRequest;

class QuestionController extends Controller
{
    private function question(int $id)
    {
        return auth()->user()->questions()->where('id', $id)->first();
    }

    /**
     * Make a question
     * @param MakeQuestionRequest $request
     * @return ResponseJson
     * */
    public function make(MakeQuestionRequest $request)
    {
        auth()->user()->questions()->create($request->all());

        return alert('Your question has been added successfully, you will recive a reply from a specialized doctor.', status:201);
    }

    public function update(MakeQuestionRequest $request, $question_id)
    {
        $question = $this->question($question_id);
        if (Gate::allows('HeHasThePowerToQuestion', $question)) {
            $question->update($request->all());
            return alert('Youe question has been updated successfully.');
        }

        return alert('unauthorized', false, 401);
    }

    /**
     * Delete question
     * @param int $question_id
     * @return ResponseJson
     * */
    public function delete(int $question_id)
    {
        $question = auth()->user()->questions()->where('id', $question_id)->first();

        if (!$question) {
            return alert('Faild operation', false, 400);
        }

        $question->delete();

        return alert('Your question has been cleared successfully.');
    }

    public function show(int $question_id)
    {
        return response()->json(Question::find($question_id));
    }

    public function all()
    {
        return response()->json(Question::simplePaginate(20));
    }
}
