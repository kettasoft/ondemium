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

    public function get($username)
    {
        $clinic = Clinic::where('username', $username)->first();

        if ($clinic) {
            return response()->json(['data' => $clinic]);
        }

        return response()->json([
            'message' => "Clinic '$username' is not found",
        ], 404);
    }

    public function create(ClinicCreateRequest $request)
    {
        $data = $request->all();
        $data['photo'] = '{}';
        
        Clinic::create($data);
        
        return response()->json([
            'success' => true,
            'message' => 'Your clinic has been created successfully.'
        ]);
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}
