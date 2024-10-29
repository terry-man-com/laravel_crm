<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        return [
            'name'    => $faker->name(),
            'mail'    => $faker->email(),
            'zipcode' => $faker->postcode(),
            'address' => $faker->address(),
            'tel'     => $faker->phoneNumber(),
        ];
    }
}
