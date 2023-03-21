<?php

namespace Modules\Device\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(\Modules\Device\Models\Device::class);
    }

    public function verify()
    {
        return $this->hasOne(VerifyDevice::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Device\Database\factories\DeviceFactory::new();
    }
}
