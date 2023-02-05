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

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function today()
    {
        return this->where('created_at', '>=', \Carbon\Carbon::now());
    }

    public function settings()
    {
        return $this->hasOne(\Modules\Booking\Models\Setting::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Booking\Database\factories\BookingFactory::new();
    }
}
