<?php

namespace Modules\Group\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Group\Models\Group;

class Memberable extends Model
{
    use HasFactory;

    protected $table = 'memberables';

    protected $guarded = [];

    public function memberable()
    {
        return $this->morphTo();
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'id', 'group_id');
    }
}
