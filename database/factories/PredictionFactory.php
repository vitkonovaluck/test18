<?php

namespace Database\Factories;

use App\Models\Prediction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Prediction>
 */
class PredictionFactory extends Factory
{

    protected $model = Prediction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text,
        ];
    }
}
