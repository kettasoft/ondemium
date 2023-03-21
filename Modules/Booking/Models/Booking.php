<?php

namespace Modules\Booking\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Clinic\Models\Clinic;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookable()
    {
        return $this->morphTo();
    }

    public function today()
    {
        return this->where('created_at', '>=', \Carbon\Carbon::now())->get();
    }
    
    protected static function newFactory()
    {
        return \Modules\Booking\Database\factories\BookingFactory::new();
    }
}
