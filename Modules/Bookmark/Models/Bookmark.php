<?php

namespace Modules\Bookmark\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'id',
        'user_id',
        'bookmarkable_type',
        'bookmarkable_id',
        'updated_at',
    ];

    protected $with = [
        'bookmarkable'
    ];

    public function bookmarkable()
    {
        return $this->morphTo();
    }
    
    protected static function newFactory()
    {
        return \Modules\Bookmark\Database\factories\BookmarkFactory::new();
    }
}
