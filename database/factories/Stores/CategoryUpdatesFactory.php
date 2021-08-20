<?php

namespace Database\Factories\Stores;

use App\Models\Stores\Category;
use App\Models\Stores\CategoryUpdates;
use App\Models\Stores\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryUpdatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryUpdates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store'             => Store::factory()->create(),
            'category'          => Category::factory()->create(),
            'product_totals'    => random_int(1000, 30000),
        ];
    }
}
