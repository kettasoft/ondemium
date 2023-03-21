<?php

namespace App\Policies;

use Modules\Post\Models\Post;;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Modules\User\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Post\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Modules\User\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->ability('post.update');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Post\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        return $user->ability('post.update') && $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Post\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        return ($user->ability('post.update') && $user->id === $post->user_id) || $user->rules->first()->slug == 'admin';
    }
}
