<?php

namespace Modules\Booking\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'booking_settings';

    protected $guarded = [];

    protected $dates = [
        'less_age',
        'older_age'
    ];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Booking\Database\factories\SettingFactory::new();
    // }
}
