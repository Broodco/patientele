<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\fr_BE;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gender' => $this->faker->boolean(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->dateTimeBetween('-60 years', '-3 years'),
            'birth_place' => $this->faker->city(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'country' => $this->faker->randomElement(['BE', 'FR', 'LU']),
        ];
    }
}
