<?php

namespace Database\Factories;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\Assunto>
 */
class AssuntoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Assunto::class;

    public function definition(): array
    {
        return [
            'Descricao' => ucfirst($this->faker->unique()->word()),
        ];
    }
}
