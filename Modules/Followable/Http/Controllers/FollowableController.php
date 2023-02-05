<?php

namespace Modules\Followable\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\User\Models\User;

class FollowableController extends Controller
{
    /**
     * Follow up to doctor
     * @param Doctor $user
     * @return JsonResponse
     * */
    public function follow(User $user): JsonResponse
    {
        if ($user->id === auth()->id()) {
            return alert('Bad request', false, 400);
        }

        if (! $user->followers()->where('follower_id', auth()->id())->exists()) {
            auth()->user()->following()->attach($user);
            return alert("You are now following Dr. {$user->fullname()}");
        }
        return alert("You are already following Dr. {$user->fullname()}", false, 400);
    }

    /**
     * unfollow the doctor
     * @param User $user
     * @return JsonResponse
     * */
    public function unfollow(User $user): JsonResponse
    {
        if ($user->followers()->where('follower_id', auth()->id())->exists()) {
            auth()->user()->following()->detach($user);
            return alert("You have unfollowed Dr. {$user->fullname()}");
        }

        return alert("Dr. {$user->fullname()} has been unfollowed", false, 400);
    }

    /**
     * Get all followers
     * @param User $user
     * @return JsonResponse
     * */
    public function followers(User $user, $count = null): JsonResponse|int
    {
        if ($count) {
            return (int) $user->followers()->count();
        }

        $followers = $user->followers()->simplePaginate(50);
        return response()->json($followers);
    }

    /**
     * Get all following for user
     * @param User $user
     * @return ResponseJson
     * */
    public function followings(User $user, $count = null): JsonResponse|int
    {
        if ($count) {
            return (int) $user->following()->count();
        }
        
        $following = $user->following()->simplePaginate(50);
        return response()->json($following);
    }
}
