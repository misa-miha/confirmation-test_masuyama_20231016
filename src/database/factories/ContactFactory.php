<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail,
            'zip11' => $this->faker->postcode('-', 3, 0),
            'addr11' => $this->faker->prefecture,
            'addr11' => $this->faker->streetAddress,
            'address2' => $this->faker->secondaryAddress,
            'content' => $this->faker->realText(100)
        ];
    }
}
