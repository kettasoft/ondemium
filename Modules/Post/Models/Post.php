<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Doctor\Models\Doctor;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos',
        'body'
    ];

    protected $hidden = [
        'createdable_id',
        'createdable_type'
    ];

    public function doctor()
    {
        return $this->morphTo(__FUNCTION__, 'createdable_type', 'createdable_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }
}
