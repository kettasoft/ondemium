<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Post\Http\Requests\CreatePostRequest;
use Modules\Post\Models\Post;


class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return ResponseJson
     */
    public function create(CreatePostRequest $request)
    {
        $originator = auth()->user();

        $originator->posts()->create($request->all());

        return alert('The post was created successfully.');
    }
}
