<?php

namespace Database\Factories;

use App\Models\Tasks;
use App\Models\Users;
use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tasks::class;

    public function definition(): array
    {
        return [
            'company_id' => Companies::factory(),
            'name' => $this->faker->company,
            'description' => $this->faker->text(100),
            'user_id' => Users::factory(),
        ];
    }
}
