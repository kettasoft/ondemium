<?php

namespace Modules\Question\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Question\Models\Question;
use Modules\Question\Http\Requests\MakeQuestionRequest;
use Modules\Question\Http\Requests\AnswerToQuestionRequest;

class QuestionController extends Controller
{
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

    public function update(MakeQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->update($request->all());
        return alert('Youe question has been updated successfully.');
    }

    /**
     * Delete question
     * @param Question $question
     * @return ResponseJson
     * */
    public function delete(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return alert('Your question has been cleared successfully.');
    }

    public function show(Question $question)
    {
        return response()->json($question);
    }

    public function all()
    {
        return response()->json(Question::simplePaginate(20));
    }
}
