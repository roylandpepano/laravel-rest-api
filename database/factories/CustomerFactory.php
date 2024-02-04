<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        $age = $this->faker->numberBetween(18, 65);
        $sex = $this->faker->randomElement(['M', 'F']);
        $email = $this->faker->unique()->safeEmail;
        $phone = $this->faker->unique()->phoneNumber;
        $city = $this->faker->city;
        $state = $this->faker->state;
        $zip = $this->faker->postcode;
        $country = $this->faker->country;
        $type = $this->faker->randomElement(['Individual', 'Company']);

        return [
            'name' => $name,
            'age' => $age,
            'sex'=> $sex,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'country' => $country,
            'type' => $type,
        ];
    }
}