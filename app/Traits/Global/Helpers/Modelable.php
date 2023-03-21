<?php

namespace App\Traits\Global\Helpers;

use Illuminate\Database\Eloquent\Model;

trait Modelable
{
    protected static function instances()
    {
        return [];
    }

	protected function model(string $type)
    {
        $instances = self::instances();

        if (is_null($instances) OR empty($instances)) return null;

        $model = new $instances[$type];

        return $model;
    }

    public static function keys()
    {
        return implode('|', array_keys(self::instances()));
    }
}