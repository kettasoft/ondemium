<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }

    public function __invoke()
    {
        return view('layouts.boot');
    }
}
