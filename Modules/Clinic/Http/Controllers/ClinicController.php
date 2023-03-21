<?php

namespace Modules\Clinic\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Clinic\Http\Requests\ClinicCreateRequest;
use Modules\Clinic\Http\Requests\ClinicUpdateRequest;
use Modules\Clinic\Models\Clinic;
use Modules\User\Models\User;

class ClinicController extends Controller
{

    public function all()
    {
        return response()->json(Clinic::whereStatus(1)->simplePaginate(50));
    }

    public function get(User $doctor, Clinic $clinic)
    {
        return response()->json([
            'data' => [
                'doctor' => $doctor->simple(),
                'clinic' => $clinic
            ]
        ]);
    }

    public function show(User $doctor)
    {
    }

    public function create(ClinicCreateRequest $request)
    {
        $data = $request->all();
        $data['logo'] = '{}';
        auth()->user()->clinics()->create($data);
        
        return alert('Your clinic has been created successfully.', status:CREATED);
    }

    public function update(User $doctor, Clinic $clinic, ClinicUpdateRequest $request)
    {
        $this->authorize('update', $clinic);

        if ($clinic->update($request->all())) {
            return alert('Your clinic has been updated successfully.');
        }
    }

    public function delete(User $doctor, Clinic $clinic)
    {
        $this->authorize('delete', $clinic);
        
        if ($clinic->delete()) {
            return alert('Your clinic has been deleted successfully');
        }
    }

    public function setStatus(Clinic $clinic, $setStatus)
    {
        $this->authorize('setStatus', $clinic);
        
        $status = match ($setStatus) {
            'ban' => $clinic->update(['status' => $setStatus]),
            'active' => $clinic->update(['status' => $setStatus]),
        };

        if ($status) {
            return alert('successfully');
        }
    }

    public function allUnactiveClinics()
    {
        $clinics = Clinic::whereStatus('ban')->with('originator')->simplePaginate(20);

        return response()->json($clinics);
    }
}
