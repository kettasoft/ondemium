<?php

namespace Modules\Interaction\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\Global\Helpers\Modelable;
use App\Enums\InteractionEnum;

class InteractionController extends Controller
{
    use Modelable;

    public function interaction(string $type, int $id, int $interaction)
    {
        $model = $this->model($type)->findOrFail($id);

        if ($action = $model->interactions()->whereUserId(auth()->id())->first()) {
            $action->delete();
            return alert('');
        }

        $model->interactions()->create(['type' => $interaction, 'user_id' => auth()->id()]);

        return alert('');
    }

    public function isInteraction(string $type, int $id)
    {
        $model = $this->model($type)->findOrFail($id);

        if ($action = $model->interactions()->whereUserId(auth()->id())->first()) {
            return response()->json($action);
        }
    }

    public function interventors(string $type, int $id)
    {
        $model = $this->model($type)->findOrFail($id);

        return response()->json($model->interactions()->with('user:id,username,first_name,last_name,photo,account_verified_at')->simplePaginate(100));
    }
}
