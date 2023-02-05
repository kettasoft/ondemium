<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'comments';
    
    protected static function newFactory()
    {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }

}
