<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Interaction\Models\Interaction;
use Modules\Report\Models\Report;
use Modules\Review\Models\Review;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function interactions()
    {
        return $this->morphMany(Interaction::class, 'interactionable');
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
