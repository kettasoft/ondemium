<?php

namespace Modules\Comment\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Comment\Http\Requests\AddCommentRequest;
use Modules\Comment\Models\Comment;
use Modules\Post\Models\Post;

class CommentController extends Controller
{
    public function make(Post $post, AddCommentRequest $request)
    {
        if (!$post->commentable) {
            return alert('Sorry, this post is not available for comments', false, 400);
        }

        $post->comments()->create(array_merge($request->all(), ['user_id' => auth()->id()]));
        return alert('Your comment was successfully added');
    }

    public function update(Post $post, Comment $comment, AddCommentRequest $request)
    {
        $this->authorize('update', $comment);

        if ($comment->update($request->all())) {
            return alert('Your comment was successfully updated');
        }
    }

    public function delete(Post $post, Comment $comment)
    {
        $this->authorize('delete', [$comment, $post]);

        if ($comment->delete()) {
            return alert('Your comment has been deleted');
        }
    }
}
