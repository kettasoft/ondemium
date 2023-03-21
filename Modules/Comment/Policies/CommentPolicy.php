<?php

namespace Modules\Comment\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Comment\Models\Comment;
use Modules\Post\Models\Post;
use Modules\User\Models\User;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function delete(User $user, Comment $comment, Post $post)
    {
        return $user->id === $comment->user_id OR $user->id === $post->user_id;
    }
}
