<?php

namespace App\Traits\Global\Models;

trait Rule
{
	public function hasOnlyRule($rule) {}

	public function hasAnyRules(array $rules) {}

	public function attachRule() {}

	public function detachRule() {}

	public function assigenPermission() {}
}