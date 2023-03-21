<?php

namespace Modules\Review\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Review\Models\Review;
use Modules\User\Models\User;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any private models.
     *
     * @param  \Modules\User\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAnyPrivate(User $user, Review $review)
    {
        dd($review->reviewable->user_id === $user->id);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Review\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Modules\User\Models\User  $user
     * @param  \Modules\Review\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Review $review)
    {
        return ($user->id == $review->user_id) or $user->rules->first()->slug == 'admin';
    }
}
