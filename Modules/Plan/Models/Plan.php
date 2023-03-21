<?php

namespace Modules\Plan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'privileges' => 'array'
    ];

    public function doctors()
    {
        return $this->belongsToMany(User::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Plan\Database\factories\PlanFactory::new();
    }
}
