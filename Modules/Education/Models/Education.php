<?php

namespace Modules\Education\Models;

use Modules\Doctor\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'doctor_id',
        'education',
        'univerity',
        'country',
        'city',
        'start_date',
        'end_date',
        'description',
        'is_verified'
    ];

    protected $casts = [
        'is_verified' => 'boolean'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    protected static function newFactory()
    {
        return \Modules\Education\Database\factories\EducationFactory::new();
    }
}
