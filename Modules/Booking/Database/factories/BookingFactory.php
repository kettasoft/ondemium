<?php
namespace Modules\Booking\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\User;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Booking\Models\Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clinic_id' => 1,
            'doctor_id' => 2,
            'user_id' => User::all()->random()->id,
            'booking_date' => '2023-02-05',
            'turn' => 1,
            'code' => random_int(10000000, 99999999)
        ];
    }
}

