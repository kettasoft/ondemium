<?php

namespace Modules\Rule\Http\Controllers;

use Modules\Rule\Http\Requests\CreateNewRuleRequest;
use App\Http\Controllers\Controller;
use Modules\Rule\Models\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        return view('rule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param CreateNewRuleRequest $request
     * @return JsonResponse
     */
    public function create(CreateNewRuleRequest $request)
    {
        dd('dsa');
        Rule::create($request->all());

        return alert('The rule has been created successfully.', status:CREATED);
    }

    /**
     * Show the specified resource.
     * @param Rule $rule
     * @return JsonResponse
     */
    public function show(Rule $rule)
    {
        return response()->json($rule->with('users')->first());
    }

    /**
     * Update the specified resource in storage.
     * @param CreateNewRuleRequest $request
     * @param Rule $rule
     * @return JsonResponse
     */
    public function update(Rule $rule, CreateNewRuleRequest $request)
    {
        if ($rule->update($request->all())) {
            return alert('The rule has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Rule $rule
     * @return JsonResponse
     */
    public function delete(Rule $rule)
    {
        if ($rule->delete()) {
            return alert('The rule has been deleted successfully.');
        }
    }
}
