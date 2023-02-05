<?php

namespace App\Traits\Global\Models;

use Modules\Followable\Models\Followable as FollowableModel;

Trait Followable {

    public function follow($id)
    {
    	return $this->is_follow($id);
    }

    public function unfollow(int $id)
    {
    	if ($follow = $this->is_follow($id)) {
    		return $follow->delete();
    	}

    	return false;
    }

	public function is_follow(int $id)
	{
		return auth()->user()->followable()->where('doctor_id', $id)->first();
	}
}