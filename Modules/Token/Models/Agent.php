<?php

namespace Modules\Token\Models;

use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Token\Models\Token;

class Agent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = [
        'id',
        'parent_id',
        'agent_id',
        'token_id',
        'session_id',
        'updated_at'
    ];
    protected $with = [
        // 'user:id,username,first_name,last_name,photo,account_verified_at,status',
        // 'session'
    ];

    public function session()
    {
        return $this->belongsTo(PersonalAccessToken::class, 'session_id');
    }

    public function sessions()
    {
        return $this->belongsTo(PersonalAccessToken::class, 'sessidason_idsds');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Token\Database\factories\AgentFactory::new();
    }
}
