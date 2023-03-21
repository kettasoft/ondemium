<?php

namespace Modules\Pharmacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\User\Models\User;
use Modules\Address\Models\Address;
use Modules\Product\Models\Product;
use Modules\Review\Models\Review;
use Modules\Interaction\Models\Interaction;
use Modules\Report\Models\Report;

class Pharmacy extends Model
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function reborts()
    {
        return $this->morphMany(Report::class, 'rebortable');
    }
    
}
