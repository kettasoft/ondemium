<?php

namespace Modules\Clinic\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Clinic\Http\Requests\ClinicCreateRequest;
use Modules\Clinic\Http\Requests\ClinicUpdateRequest;
use Modules\Clinic\Models\Clinic;

class ClinicController extends Controller
{

    public function create(ClinicCreateRequest $request)
    {
        $data = $request->all();
        $data['photo'] = '{}';
        auth()->user()->clinic()->create($data);
        
        return alert('Your clinic has been created successfully.');
    }

    public function update(ClinicCreateRequest $request, Clinic $clinic)
    {
        if ($clinic->id === auth()->id()) {
            $clinic->update($request->all());
            return alert('Your clinic has been updated successfully.');
        }

        return alert('unauthorized', false, 402);
    }

    public function delete(Clinic $clinic)
    {
        if ($clinic->id === auth()->id()) {
            $clinic->delete();
            return alert('Your clinic has been deleted successfully');
        }

        return alert('unauthorized', false, 402);
    }
}
