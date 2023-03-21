<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Comment\Models\Comment;
use Modules\User\Models\User;
use Modules\Bookmark\Models\Bookmark;
use Modules\Interaction\Models\Interaction;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function bookmark()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }
}
