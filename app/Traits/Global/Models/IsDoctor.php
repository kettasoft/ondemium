<?php

namespace App\Traits\Global\Models;

use Modules\User\Models\User;
use Modules\Plan\Models\Plan;

trait IsDoctor
{
	public function plan()
	{
		return $this->belongsToMany(Plan::class)->withTimestamps();
	}

	public function phones()
	{
		// return $this->morphMany(Phone::class, 'phoneable');
	}
}