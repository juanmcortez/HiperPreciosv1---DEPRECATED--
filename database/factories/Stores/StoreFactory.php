<?php

namespace Database\Factories\Stores;

use App\Models\Stores\Store;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  => $this->faker->company(),
            'store_url'             => $this->faker->url(),
            'is_vtex_store'         => false,
            'last_products_update'  => Carbon::now(config('app.timezone'))->format('Y-m-d H:i'),
        ];
    }
}
