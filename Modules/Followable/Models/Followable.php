<?php

namespace Modules\Followable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Followable\Models\Followable;

class Followable extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['pivot'];
    protected $pivotColumns = ['id', 'first_name'];
    
    protected static function newFactory()
    {
        return \Modules\Followable\Database\factories\FollowableFactory::new();
    }
}
