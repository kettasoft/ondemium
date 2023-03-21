<?php

namespace Modules\Interaction\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;

class Interaction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = [
        'id',
        'interactionable_id',
        'interactionable_type',
        'updated_at',
    ];
    protected $casts = [
        //
    ];

    public function getTypeAttribute(int $value)
    {
        return \App\Enums\InteractionEnum::getInteractionName($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
