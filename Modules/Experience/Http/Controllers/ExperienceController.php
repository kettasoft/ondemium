<?php

namespace Modules\Experience\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Models\User;
use Modules\Experience\Models\Experience;
use Modules\Experience\Http\Requests\AddExperienceRequest;

class ExperienceController extends Controller
{
    public function add(AddExperienceRequest $request)
    {
        if (auth()->user()->experiences()->create($request->all())) {
            return alert('Your experience has been added successfully.', status:201);
        }
    }

    public function update(Experience $experience, User $doctor, AddExperienceRequest $request)
    {
        if (! $experience->is_verified) {
            return alert('This experiment cannot be modified because it has been verified.', false, 400);
        }

        if ($experience->update($request->all())) {
            return alert('Your experience has been added successfully.', status:201);
        }
    }

    public function delete(Experience $experience, User $doctor)
    {
        if ($experience->delete()) {
            return alert('Your experience has been deleted successfully.');
        }
    }

    public function all(User $doctor)
    {
        return response()->json($doctor->experiences()->whereIsAvailable(TRUE)->get());
    }
}
