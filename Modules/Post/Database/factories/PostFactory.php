<?php
namespace Modules\Post\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Models\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'body' => $this->faker->paragraph,
            'commentable' => rand(0,1)
        ];
    }
}

