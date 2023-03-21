<?php

namespace Modules\Phone\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function phoneable()
    {
        return $this->morphTo();
    }
}
