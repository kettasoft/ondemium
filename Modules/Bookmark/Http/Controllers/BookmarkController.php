<?php

namespace Modules\Bookmark\Http\Controllers;

use Illuminate\Http\RequestJson;
use Illuminate\Routing\Controller;
use Modules\Bookmark\Models\Bookmark;

class BookmarkController extends Controller
{

    /***/
    private function instance(string $type)
    {
        $instance = match ($type) {
            'post' => \Modules\Post\Models\Post::class,
            'doctor' => \Modules\User\Models\User::class,
            'clinic' => \Modules\Clinic\Models\Clinic::class,
            'blog' => \Modules\Blog\Models\Blog::class,
            default => null
        };

        if (! is_null($instance)) {
            return new $instance;
        }

        return null;
    }

    private function checkIfItemIsExists($instance, int $id)
    {
        return $instance->findOrFail($id)->bookmark()->whereUserId(auth()->id())->first();
    }

    /***/
    public function save(string $type, int $id)
    {
        $instance = $this->instance($type);

        if (! is_null($instance)) {
            if (! $this->checkIfItemIsExists($instance, $id)) {
                $instance->findOrFail($id)->bookmark()->create(['user_id' => auth()->id()]);
                return alert('Item saved successfully', status:201);
            }
            return alert('This item is already saved!', false, 400);
        }

        return alert('An unknown error occurred', false, 400);
    }

    /***/
    public function remove(string $type, int $id)
    {
        $instance = $this->instance($type);

        if (! is_null($instance)) {
            if ($this->checkIfItemIsExists($instance, $id)) {
                $instance->findOrFail($id)->bookmark()->where('user_id', auth()->id())->first()->delete();
                return alert('The item has been removed successfully.');
            }
            return alert('This item does not exist!', false, 400);
        }
    }

    public function get(string $type)
    {
        $instance = $this->instance($type);

        // ()->where('user_id', auth()->id())->get()

        if (! is_null($instance)) {
            $bookmarks = Bookmark::whereHasMorph('bookmarkable', get_class($instance))->simplePaginate(10);
            return response()->json($bookmarks);
        }
    }
}
