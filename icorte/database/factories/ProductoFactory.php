<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'codigo' => $this->faker->unique()->bothify('COD-###??'),
            'nombre' => $this->faker->word,             
            'descripcion' => $this->faker->paragraph,   
            'categoria' => $this->faker->randomElement(['calzado', 'ropa', 'joyería']),  
            'precio' => $this->faker->randomFloat(2, 5, 500),  
            'stock' => $this->faker->numberBetween(1, 100),  
        ];
    }
}
