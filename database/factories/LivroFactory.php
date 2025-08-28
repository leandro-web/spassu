<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Livro::class;

    public function definition(): array
    {
        return [
            'Titulo'         => $this->faker->sentence(3),
            'Editora'        => $this->faker->company(),
            'Edicao'         => $this->faker->numberBetween(1, 10),
            'AnoPublicacao'  => (string) $this->faker->numberBetween(1990, (int) date('Y')),
            'Valor'          => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
