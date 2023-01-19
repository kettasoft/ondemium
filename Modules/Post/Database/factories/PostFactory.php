<?php
namespace Modules\Post\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Doctor\Models\Doctor;

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
            'createdable_type' => Doctor::class,
            'createdable_id' => Doctor::inRandomOrder()->first(),
            'body' => $this->faker->paragraph,
        ];
    }
}

