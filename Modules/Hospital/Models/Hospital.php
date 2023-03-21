<?php

namespace Modules\Hospital\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Address\Models\Address;
use Modules\Interaction\Models\Interaction;
use Modules\Phone\Models\Phone;
use Modules\Report\Models\Report;
use Modules\Review\Models\Review;

class Hospital extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interactions()
    {
        return $this->morphMany(Interaction::class, 'interactionable');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
