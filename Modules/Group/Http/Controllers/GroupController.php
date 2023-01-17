<?php

namespace Modules\Group\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Group\Models\Group;
use Modules\Group\Models\Memberable;
use Modules\Group\Http\Requests\CreateGroupRequest;
use Modules\Group\Http\Requests\UpdateGroupRequest;
use Modules\Group\Http\Requests\JoinToGroupRequest;
use Modules\Doctor\Models\Doctor;
use Illuminate\Database\Query\Builder;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return Group::where('visible', 1)->simplePaginate(20);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(CreateGroupRequest $request)
    {
        auth()->user()->group()->create(array_merge($request->all(), [
            'doctor_id' => auth()->user()->id
        ]));

        return response()->json([
            'status' => true,
            'message' => 'Group created successfully.',
        ]);
    }

    /**
     * Updated the group
     * @param UpdateGroupRequest $request
     * @param int $id
     * @return bool
     */
    public function update(UpdateGroupRequest $request, int $id)
    {
        $success = false;

        foreach (auth()->user()->group as $group) {
            if ($group->id === $id) {
                $success = $group->update($request->all());
            }
        }

        if ($success) {
            return response()->json([
                'status' => true,
                'message' => 'Group updated successfully.'
            ]);
        }

        return response()->json([
            'success' => $success,
            'message' => 'Unauthorized process.'
        ]);

    }

    /**
     * Show the All members.
     * @return Collection
     */
    public function members(int $id)
    {
        $members = Memberable::whereHasMorph('memberable', ['*'], function ($query) use ($id) {
            return $query->where('group_id', $id);
        })->paginate(20);

        foreach ($members as $member) {
            $data[] = $member->memberable;
        }

        return response()->json($data);
    }

    public function current()
    {
        return auth()->user()->group;
    }

    /**
     * 
     * 
     * @return Response
     **/
    public function membership()
    {
        $membership = Memberable::whereHasMorph('memberable', get_class(auth()->user()), function ($query) {
            return $query->where('memberable_id', auth()->user()->id);
        })->get();

        $groups = $membership->map(function ($group) {
            return $group->groups->first();
        });

        return response()->json($groups);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return Response
     */
    public function join(int $id)
    {
        auth()->user()->join()->create(['group_id' => $id]);

        return response()->json([
            'status' => true,
            'message' => 'You have successfully joined the group.'
        ]);
    }

    public function get($id)
    {
        return response()->json([
            'data' => Group::whereId($id)->first(),
        ]);
    }

    public function delete(Request $request, int $id) {
        $success = false;
        $groups = auth()->user()->group ?: false;

        if ($groups) {
            foreach ($groups as $group) {
                if ($group->id === $id) {
                    if (\Hash::check($request->password, auth()->user()->password)) {
                        $group->delete();
                        return response()->json([
                            'success' => true,
                            'message' => 'Your group has been deleted successfully.'
                        ]);
                    }
                    return response()->json([
                        'success' => false,
                        'message' => 'The password is incorrect'
                    ], 401);
                }
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'You don\'t have a group.'
        ], 403);
    }
}
