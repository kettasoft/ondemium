<?php
namespace Modules\Doctor\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Doctor\Models\Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $username = $this->faker->userName();
        $first_name = $this->faker->firstName('male');
        $last_name = $this->faker->lastName('male');
        return [
            //
        ];
    }
}

