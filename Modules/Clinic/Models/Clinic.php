<?php

namespace Modules\Clinic\Models;

use Laravel\Scout\Searchable;
use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Booking\Models\Setting;

class Clinic extends Model
{
    use HasFactory, Searchable;

    protected $table = 'clinics';

    protected $fillable = [
        'doctor_id',
        'username',
        'name',
        'summary',
        'photo',
        'banner',
        'clinic_type',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

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
    ];

    public function toSearchableArray()
    {
        return [
            'username' => $this->username,
            'name' => $this->name,
            'status' => $this->status,
            'clinic_type' => $this->clinic_type
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'clinic_id');
    }

    /**
     * Return all the doctors woh belong to the clinci
     * @return belongsToMany
     * */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasDoctor(int $id)
    {
        return $this->doctors()->where('doctor_id', $id)->first();
    }

    public function workers()
    {
        return $this->belongsToMany(User::class)->withPivot(self::WITH_PIVOT);
    }

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\ClinicFactory::new();
    }
}
