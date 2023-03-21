<?php

namespace Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Pharmacy\Http\Requests\CreateNewPharmacyRequest;
use Modules\Pharmacy\Http\Requests\UpdatePharmacyRequest;
use Modules\Pharmacy\Models\Pharmacy;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the pharmacies.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Pharmacy::paginate(50));
    }

    /**
     * Store a newly created pharmacy in storage.
     * @return JsonResponse
     */
    public function create(CreateNewPharmacyRequest $request): JsonResponse
    {
        auth()->user()->pharmacy()->create($request->all());
        return alert("Your ({$request->name}) pharmacy has been created successfully.", status:CREATED);
    }

    /**
     * Show the specified pharmacy.
     * @param int $id
     * @return Renderable
     */
    public function show(Pharmacy $pharmacy): JsonResponse
    {
        if ($pharmacy->status) {
            return response()->json($pharmacy);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     * @param Pharmacy $pharmacy
     * @param UpdatePharmacyRequest $request
     * @return JsonResponse
     */
    public function update(Pharmacy $pharmacy, UpdatePharmacyRequest $request): JsonResponse
    {
        $this->authorize('update', $pharmacy);

        if ($pharmacy->update($request->exept('status'))) {
            return alert("Your ($pharmacy->name) has been updated successfully.");
        }
    }
}
