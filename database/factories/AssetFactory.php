<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word(),
            'serial_number' => $this->faker->bankAccountNumber(),
            'description' => $this->faker->sentence(),
            'fixed' => $this->faker->boolean(),
            'picture_path' => $this->faker->imageUrl(),
            'purchase_date' => $this->faker->dateTime(),
            'start_use_date' => $this->faker->dateTime(),
            'purchase_price' => $this->faker->randomNumber(4),
            'warranty_expiry_date' => $this->faker->dateTime(),//Between('+ 5 years'),
            'degradation' => $this->faker->randomNumber(3),
            'current_value' => $this->faker->randomFloat(),
            'location' => $this->faker->address()
        ];
    }
}
