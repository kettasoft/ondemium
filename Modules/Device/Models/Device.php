<?php

namespace Modules\Device\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'ip_address',
        'user_agent',
        'device_verified_at',
        'status',
        'last_login',
    ];

    public function user()
    {
        return $this->hasMany(\Modules\Device\Models\Device::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Device\Database\factories\DeviceFactory::new();
    }
}
