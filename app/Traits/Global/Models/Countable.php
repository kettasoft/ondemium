<?php

namespace App\Traits\Global\Models;

trait Countable
{
	public static function total()
	{
		return \DB::table('INFORMATION_SCHEMA.TABLES')->where('TABLE_SCHEMA', \DB::connection()->getDatabaseName())->where('TABLE_NAME', static::make()->getTable())->first()->TABLE_ROWS;
	}
}