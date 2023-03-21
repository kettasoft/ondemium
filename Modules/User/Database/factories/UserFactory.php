<?php

namespace Modules\User\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\User\Models\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'gender' => $gender = ['male', 'female'][rand(0,1)],
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName(),
            'photo' => 'url',
            'date_birth' => $this->faker->date('Y-m-d'),
            'email' => $this->faker->freeEmail,
            'phone' => $this->faker->e164PhoneNumber,
            'password' => \Hash::make('0100123344')
        ];
    }
}
