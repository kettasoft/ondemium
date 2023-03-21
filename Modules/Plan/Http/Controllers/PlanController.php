<?php

namespace Modules\Plan\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Plan\Models\Plan;
use Modules\User\Models\User;
use Modules\Plan\Http\Requests\CreateNewPlanRequest;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the plans.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Plan::paginate());
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResponse
     */
    public function create(CreateNewPlanRequest $request): JsonResponse
    {
        Plan::create($request->all());

        return alert('New plan has been added to website sccessfully', status:CREATED);
    }

    /**
     * Update the specified plan in storage.
     * @param Plan $plan
     * @param CreateNewPlanRequest $request
     * @return JsonResponse
     */
    public function update(Plan $plan, CreateNewPlanRequest $request): JsonResponse
    {
        $name = $plan->name;
        if ($plan->update($request->all())) {
            return alert("The plan {$name} has been renamed to $plan->name updated successfully");
        }
    }

    /**
     * Remove the specified plan from storage.
     * @param plan $plan
     * @return plan
     */
    public function delete(Plan $plan): JsonResponse
    {
        $name = $plan->name;

        if ($plan->delete()) {
            return alert("The plan {$name} has been deleted successfully.");
        }
    }

    public function pay(User $user, Plan $plan)
    {

    }

    public function attach(User $user, Plan $plan)
    {

    }
}
