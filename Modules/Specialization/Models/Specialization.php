<?php

namespace Modules\Specialization\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
    protected $hidden = [
        'id',
        'pivot',
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function doctors()
    {
        return $this->belongsToMany(User::class);
    }

    public function count()
    {
        return $this->doctors()->count();
    }
    
    protected static function newFactory()
    {
        return \Modules\Specialization\Database\factories\SpecializationFactory::new();
    }
}
