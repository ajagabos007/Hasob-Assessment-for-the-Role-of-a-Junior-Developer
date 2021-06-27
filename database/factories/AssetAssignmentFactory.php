<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\User; 
use App\Models\AssetAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetAssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetAssignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Asset::factory(1)->create();
        return [
            //
            'asset_id' => Asset::factory(1)->create()[0]->id,
            'assignment_date' => $this->faker->dateTime(),
            'status' => $this->faker->word(),
            'is_due' => $this->faker->boolean(),
            'due_date' => $this->faker->dateTime(),
            'assigned_user_id' => User::factory(1)->create()[0]->id,
            'assigned_by' => $this->faker->name
        ];
    }
}
