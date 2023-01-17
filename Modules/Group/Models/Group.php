<?php

namespace Modules\Group\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'around',
        'is_public',
        'visible',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Group\Database\factories\GroupFactory::new();
    }

    public function doctor()
    {
        return $this->hasOne(\Modules\Doctor\Models\Doctor::class);
    }

    public function members()
    {
    }
}
