<?php

namespace Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Doctor\Models\Doctor;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function current(Request $request)
    {
        return response()->json(['data' => $request->user()]);
    }

    public function search(Request $request)
    {
        $search_param = $request->query('q');

        if ($search_param) {
            $doctors_query = Doctor::search($search_param)->get();

            return response()->json($doctors_query);
        }
    }
}
