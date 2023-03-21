<?php

namespace Modules\Token\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Token\Http\Requests\CreateNewTokenRequest;
use Modules\Token\Http\Requests\UpdateTokenRequest;
use Modules\Token\Models\Token;
use Modules\User\Models\User;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('token::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(CreateNewTokenRequest $request)
    {
        $token = auth()->user()->myTokens()->create(array_merge($request->all(), [
            'token' => \Str::random(Token::TOKEN_LENGHT)
        ]));

        return alert("Your token {$token->name} has been created successfully.", status:201);
    }

    /**
     * Show the specified resource.
     * @return JsonResponse
     */
    public function show()
    {
        return (auth()->user()->myTokens);
        return response()->json(auth()->user()->myTokens()->with(['agents:id,first_name,last_name,photo'])->get());
    }

    // public function agents

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(User $account, Token $myToken, UpdateTokenRequest $request)
    {
        if ($myToken->update($request->all())) {
            return alert('Your token has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(User $account, Token $myToken)
    {
        if ($myToken->delete()) {
            return alert('Your token has been deleted successfully.');
        }
    }
}
