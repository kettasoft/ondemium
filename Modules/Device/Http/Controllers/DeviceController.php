<?php

namespace Modules\Device\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Device\Models\VerifyDevice;
use Modules\Device\Models\Device;
use Modules\User\Models\User;

class DeviceController extends Controller
{
    private Device $device;

    public function __construct(Request $request)
    {
        $this->device = Device::whereIp($request->ip())->first() ?? new Device;

        if (!$this->device->verify) {
            abort(404);
        }
    }
    public function verify(Request $request)
    {
        $device = $this->device;

        if ($device->verify->code == $request->code) {
            $user = User::find($device->user_id);

            if ($device->verify->delete()) {
                $token = $user->createToken('primary')->plainTextToken;
                return response()->json(['token' => $token], 201);
            }
        }

        return alert('Code is incorrect', false, 400);
    }
}
