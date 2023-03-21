<?php

namespace Modules\Device\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Device\Models\Device;

class VerifyDevice extends Model
{
    use HasFactory;

    protected $table = 'verify_devices';
    protected $fillable = [
        'code',
        'user_id'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Device\Database\factories\VerifyDeviceFactory::new();
    }
}
