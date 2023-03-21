<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Setting\Http\Requests\GeneralSettingRequest;
use Modules\User\Models\User;

class GeneralSettingController extends Controller
{
    /**
     * Get the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function get(User $user)
    {
        return response()->json($user->settings);
    }

    /**
     * Update the specified resource in storage.
     * @param GeneralSettingRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(GeneralSettingRequest $request, User $user)
    {
        $user->setting()->update($request->all());
        return alert('Settings has been updated successfully.');
    }
}
