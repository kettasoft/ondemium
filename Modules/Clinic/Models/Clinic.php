<?php

namespace Modules\Clinic\Models;

use Laravel\Scout\Searchable;
use Modules\Doctor\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function contributors()
    {
    }

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\ClinicFactory::new();
    }
}
