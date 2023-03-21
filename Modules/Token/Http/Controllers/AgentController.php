<?php

namespace Modules\Token\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Token\Http\Requests\UseTokenRequest;
use Modules\Token\Models\Token;
use Modules\Token\Models\Agent;

class AgentController extends Controller
{
    public function use($token)
    {
        $token = Token::whereToken($token)->firstOrFail();

        if (auth()->id() === $token->parent->id) abort(401);

        if (!$token->status) {
            return alert('This token is unactive', false, 400);
        }


        if (!($token->agent_limit && ($token->agents()->count() < $token->agent_limit))) {
            return alert('The maximum number of agents has been reached', false, 400);
        }

        if ($agent = $token->agents()->whereAgentId(auth()->id())->first()) {
            return $agent->status ? $agent->session->id . '|' . $agent->session->token :
            alert('Sorry, you are banned from being an agent for this account', false, 400);
        }

        dd('brake');

        $personalAccessToken = $token->parent->createToken('agent', $token->abilities);

        $tokenId = $personalAccessToken->accessToken->id;

        $token->agents()->create([
            'parent_id' => $token->parent->id,
            'agent_id' => auth()->id(),
            'session_id' => $tokenId
        ]);

        return alert($personalAccessToken->plainTextToken, status:201);
    }

    public function block(Token $token, Agent $agent)
    {
        $this->authorize('block', [$agent, $token]);
        
        if ($agent->update(['status' => false])) {
            return 'das';
        }
    }

    public function unuse()
    {
        
    }
}
