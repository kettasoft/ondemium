<?php

namespace App\Traits;

trait Permission
{
	public static function hasPermission($id, $permission)
	{
        $permissions = static::whereId($id)->first('permissions')->permission;

        if (is_null($permissions)) {
            return false;
        }

        if (\Arr::get($permissions, $permission)) {
            return true;
        }

        return false;
	}

    public static function addAnyPermissions($id, $items)
    {
        $permissions = static::whereId($id)->first('permissions')->permission;
        $items = is_array($items) ? $items : [$items];

        return false;
    }

    /**
     * Converting permissions from JSON to an array.
     *
     * @return  string
     */
    public function getPermissionAttribute()
    {
        return json_decode($this->permissions, true);
    }

}