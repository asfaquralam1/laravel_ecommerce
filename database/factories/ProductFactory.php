<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'category'=>$this->faker->category,
            'details' =>$this->faker->details,
            'price'=>$this->faker->price,
            'discount_price'=>$this->faker->discount_price,
            'quantity'=>$this->faker->quantity,
            'image'=>$this->faker->image,
        ];
    }
}
