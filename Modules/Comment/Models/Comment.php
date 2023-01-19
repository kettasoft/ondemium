<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'comments';

    protected $hidden = [
        'post_id',
        'commentable_type',
        'commentable_id',
    ];

    protected const COMMENTATOR_ITEMS = [
        'id',
        'first_name',
        'last_name',
        'photo',
        'is_verified'
    ];

    /**
     * Take back with me every commentator comment
     **/
    public function commentable()
    {
        return $this->morphTo()->select(self::COMMENTATOR_ITEMS);
    }
    
    protected static function newFactory()
    {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }

    protected $with = [
        'commentable'
    ];
}
