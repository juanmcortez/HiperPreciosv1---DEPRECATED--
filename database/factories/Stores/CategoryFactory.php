<?php

namespace Database\Factories\Stores;

use App\Models\Stores\Category;
use App\Models\Stores\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = ucfirst(strtolower(implode(' ', $this->faker->words(2))));
        return [
            'store_reference_id'    => random_int(10, 1000),
            'name'                  => $category,
            'slug'                  => strtolower(str_replace(' ', '-', $category)),
        ];
    }
}
