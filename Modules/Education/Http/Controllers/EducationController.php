<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Education\Http\Requests\EducationRequest;
use Modules\Education\Models\Education;

class EducationController extends Controller
{

    public function get(Request $request)
    {
        return $request->user()->education;
    }

    public function create(EducationRequest $request)
    {
        $data = ['doctor_id' => $request->user()->id, ...$request->all()];

        Education::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Education created successfully.'
        ]);
    }

    public function update()
    {
    }
}
