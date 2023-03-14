<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->name();
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'price' => $this->faker->numberBetween(3000000, 30000000),
            'discount' => $this->faker->numberBetween(5, 30),
            'stock' => $this->faker->numberBetween(10, 50),
            'image' => $this->faker->imageUrl,
            'type' => $this->faker->numberBetween(1,3),
            'slug' => $slug,
            'guarantee' => $this->faker->numberBetween(12, 36),
            'content' => $this->faker->paragraph,
            'benefit' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'total_sell' => $this->faker->numberBetween(0,100),
            'category_id' =>  function(){
                return Category::all()->random();
            },
            'brand_id' => $this->faker->numberBetween(6,10),
        ];
    }
}
