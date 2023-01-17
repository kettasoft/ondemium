<?php
namespace Modules\Group\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Group\Models\Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => \Modules\Doctor\Models\Doctor::inRandomOrder()->first(),
            'name' => 'Group',
            'img' => $this->faker->imageUrl(640, 480, 'cats'),
            'around' => $this->faker->paragraph,
            'is_public' => rand(0,1),
            'visible' => rand(0,1)
        ];
    }
}

