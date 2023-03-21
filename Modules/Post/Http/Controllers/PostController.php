<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Post\Http\Requests\CreatePostRequest;
use Modules\Post\Models\Post;
use Modules\User\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     * @return Renderable
     */
    public function all()
    {
        $posts = Post::simplePaginate(20);
        return response()->json($posts);
    }

    public function get(User $user)
    {
        return response()->json($user->posts()->with('user')->simplePaginate(20));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePostRequest $request
     * @return ResponseJson
     */
    public function create(CreatePostRequest $request)
    {
        $this->authorize('create', Post::class);
        
        $path = public_path("storage/users/" . auth()->user()->username . '/post');
        $photos = $request->file('photos');

        $file = $photos->move($path, \Str::random(16) . '.' . $photos->guessExtension());

        $path = explode(config('app.name'), $file->getPathname())[1];

        auth()->user()->posts()->create(array_merge($request->all(), [
            'photos' => json_encode(['photos' => $path]),
        ]));

        return alert('The post was created successfully.', status:201);
    }

    /**
     * Update the specified resource in storage.
     * @param Post $post
     * @param User $user
     * @param CreatePostRequest $request
     * @return ResponseJson
     */
    public function update(User $user, Post $post, CreatePostRequest $request)
    {
        $this->authorize('update', $post);

        if ($post->update($request->all())) {
            return alert('The post was updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @param User $user
     * @return ResponseJson
     */
    public function delete(User $user, Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->delete()) {
            return alert('The post was deleted successfully.');
        }
    }
}
