<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\Models\Comment;
use Modules\User\Models\User;
use Modules\Bookmark\Models\Bookmark;

use Modules\Doctor\Models\Doctor;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photos',
        'body'
    ];

    protected $with = [
        // 'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmark()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }
    
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }
}
