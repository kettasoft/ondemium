<?php

namespace Modules\Address\Http\Controllers;

use App\Traits\Global\Helpers\Modelable;
use App\Http\Controllers\Controller;
use Modules\Address\Http\Requests\CreateAddressRequest;

class AddressController extends Controller
{
    use Modelable;

    public static function instances()
    {
        return [
            'clinic' => \Modules\Clinic\Models\Clinic::class
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($key, $username)
    {
        $model = $this->model($key)->whereUsername($username)->firstOrFail();

        return response()->json($model->addresses);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($key, $username, CreateAddressRequest $request)
    {
        $model = $this->model($key)->whereUsername($username)->whereUserId(auth()->id())->firstOrFail();

        if ($model->addresses()->create(array_merge($request->all(), ['user_id' => auth()->id()]))) {
            return alert("A new address for $model->username " . ucfirst($key) . " has been added successfully.", status:201);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('address::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($key, $username, CreateAddressRequest $request)
    {
        $model = $this->model($key)->whereUsername($username)->whereUserId(auth()->id())->firstOrFail();

        dd(auth()->user()->ability('clinic', $model->username));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        //
    }
}
