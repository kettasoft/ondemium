<?php

namespace App\Traits\Global\Models;

use Modules\Review\Models\Review;

trait Reviewable
{
	public function reviews()
	{
		return $this->morphMany(Review::class, 'reviewable');
	}
}