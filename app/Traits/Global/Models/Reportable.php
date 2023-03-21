<?php

namespace App\Traits\Global\Models;

use Modules\Report\Models\Report;

trait Reportable
{
	public function reports()
	{
		return $this->morphMany(Rebort::class, 'reportable');
	}
}