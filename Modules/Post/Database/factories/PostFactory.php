<?php
namespace Modules\Post\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'doctor_id' => \Modules\Doctor\Models\Doctor::inRandomOrder()->first(),
            'content' => $this->faker->paragraph,
        ];
    }
}

