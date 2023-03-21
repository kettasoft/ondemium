<?php

namespace Modules\Clinic\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Global\Models\Reviewable,
    App\Traits\Global\Models\Reportable;

use Modules\Booking\Models\Setting,
    Modules\User\Models\User,
    Modules\Address\Models\Address,
    Modules\Phone\Models\Phone,
    Modules\Booking\Models\Booking;

class Clinic extends Model
{
    use HasFactory, Searchable, Reviewable, Reportable;

    protected $guarded = [];

    private const WITH_PIVOT = [
        'saturday',
        'friday',
        'thursday',
        'wednesday',
        'tuesday',
        'monday',
        'sunday',
        'permissions',
        'conditions',
        'is_available',
        'status'
    ];

    public function toSearchableArray()
    {
        return [
            'username' => $this->username,
            'name' => $this->name,
            'clinic_type' => $this->clinic_type
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Return all the addresses woh belong to the clinci
     * @return morphMany
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function originator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'clinic_id');
    }

    /**
     * Return all the doctors woh belong to the clinci
     * @return belongsToMany
     */
    public function doctors()
    {
        return $this->belongsToMany(User::class)->withPivot(self::WITH_PIVOT);
    }

    /**
     * Return all the phone numbers woh belong to the clinci
     * @return morphMany
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\ClinicFactory::new();
    }
}
