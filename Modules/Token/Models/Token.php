<?php

namespace Modules\Token\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken;
use Modules\Token\Models\Agent;
use Modules\User\Models\User;

class Token extends Model
{
    use HasFactory;

    public const TOKEN_LENGHT = 64;

    protected $guarded = [];
    protected $with = [
        'agents'
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agents()
    {
        return $this->hasMany(Agent::class, 'token_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'agents', 'token_id', 'agent_id');
    }

    public function sessions()
    {
        return $this->belongsToMany(PersonalAccessToken::class, 'agents', 'session_id', null);
    }
    
    protected static function newFactory()
    {
        return \Modules\Token\Database\factories\TokenFactory::new();
    }
}
