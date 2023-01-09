<?php
namespace Modules\Clinic\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Clinic\Models\Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_id' => 1,
            'username' => $username = '@abdow',
            'name' => 'Abdow Haya',
            'summary' => 'fsdfadf fsadfsdaf',
            'photo' => '{"default": "'. strtolower($username[-1]) .'"}',
            'banner' => null,
            'status' => 'active',
            'clinic_type' => 'General',
        ];
    }
}

