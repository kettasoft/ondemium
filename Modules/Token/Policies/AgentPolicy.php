<?php

namespace Modules\Token\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Token\Models\Agent;
use Modules\Token\Models\Token;
use Modules\User\Models\User;

class AgentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function block(User $user, Agent $agent, Token $token)
    {
        return ($user->id === $token->user_id && $user->ability('agent.block'));
    }
}
