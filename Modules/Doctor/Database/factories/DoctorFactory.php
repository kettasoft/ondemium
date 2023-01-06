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
        return [
            'username' => $this->faker->userName(),
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName('male'),
            'email' => $this->faker->email,
            'photo' => json_encode(['default' => $this->faker->imageUrl(640, 480, 'cats')]),
            'gender' => 'male',
            'country_code' => $this->faker->postcode,
            'date_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone' => $this->faker->e164PhoneNumber(),
            'password' => bcrypt('0100123344'),
        ];
    }
}

