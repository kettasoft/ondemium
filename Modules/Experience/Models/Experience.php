<?php

namespace Modules\Experience\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Clinic\Models\Clinic;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = [
        'is_available',
        // 'user_id'
    ];

    protected $casts = [
        'is_verified' => 'boolean'
    ];

    public function doctors()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Experience\Database\factories\ExperienceFactory::new();
    }
}
