<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\PriceChange;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'product_name'=>$this->faker->name(),
            'product_description'=>$this->faker->text(),	
            'image'=>$this->faker->imageUrl(),
            'brand_id'=>Brand::inRandomOrder()->first()->id,
            'category_id'=>Category::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Product $product){
            PriceChange::factory()->create([
                'product_id'=>$product->id,
            ]);
        });
    }
}
