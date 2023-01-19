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
     * Display a listing of the posts for current logged in.
     * @return ResponseJson
     */
    public function my()
    {
        $posts = auth()->user()->posts()->paginate(20);
        return response()->json($posts);
    }

    /**
     * View posts for a specific user or doctor.
     * @param int $created_id
     * @param int|null $post_id
     * @return ResponseJson
     */
    public function show(int $created_id, $post_id = null)
    {
        $posts = Post::where('createdable_id', $created_id);
        if (is_null($post_id)) {
            return response()->json($posts->paginate(20));
        }

        return response()->json($posts->where('id', $post_id)->first());
    }

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

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return ResponseJson
     */
    public function update(CreatePostRequest $request, int $id)
    {
        $originator = auth()->user();

        if ($post = $originator->posts()->where('id', $id)->first()) {
            $post->update($request->all());
            return alert('The post was updated successfully.');
        }

        return alert('An unknown error occurred', false, 402);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return ResponseJson
     */
    public function delete(int $id)
    {
        $originator = auth()->user();

        $post = $originator->posts()->where('id', $id)->first();

        if ($post) {
            $post->delete();
            return alert('The post was deleted successfully.');
        }

        return alert('An unknown error occurred', false, 402);
    }
}
