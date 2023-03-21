<?php

namespace Modules\Review\Http\Controllers;

use App\Traits\Global\Helpers\Modelable;
use App\Http\Controllers\Controller;
use Modules\Review\Http\Requests\MakeReviewRequest;

class ReviewController extends Controller
{
    use Modelable;

    protected function instances()
    {
        return [
            'post' => \Modules\Post\Models\Post::class,
            'blog' => \Modules\Blog\Models\Blog::class,
            'clinic' => \Modules\Clinic\Models\Clinic::class,
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(string $key, int $id)
    {
        return view('review::index');
    }

    /**
     * Store the creating review for a storage.
     * @return JsonResponse
     */
    public function create(string $key, int $id, MakeReviewRequest $request)
    {
        $instance = $this->model($key)->findOrFail($id);

        if (! $instance->reviews()->whereUserId(auth()->id())->exists()) {
            $instance->reviews()->create(array_merge($request->all(), ['user_id' => auth()->id()]));
            return alert('Your review has been added successfully.', 201);
        }

        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified review in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(string $key, int $id, MakeReviewRequest $request)
    {
        $instance = $this->model($key)->findOrFail($id);

        $review = $instance->reviews()->whereUserId(auth()->id())->firstOrFail();

        $this->authorize('update', $review);

        if ($review->update($request->all())) {
            return alert('Your review has been updated successfully.');
        }
    }

    /**
     * Remove the specified review from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(string $key, int $id)
    {
        $instance = $this->model($key)->findOrFail($id);

        $review = $instance->reviews()->whereUserId(auth()->id())->firstOrFail();

        $this->authorize('update', $review);

        if ($review->delete()) {
            return alert('Your review has been deleted successfully.');
        }
    }

    public function viewAnyPrivate($key, $id)
    {
        $instance = $this->model($key)->findOrFail($id);
        
        $this->authorize('viewAnyPrivate', $instance->reviews->first());

        dd($instance->reviews()->whereIsPrivate(1)->simplePaginate(20));
    }
}
