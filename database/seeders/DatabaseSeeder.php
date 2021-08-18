<?php

namespace Database\Seeders;

use App\Models\Stores\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Users\User::factory(10)->create();

        Store::factory()->create([
            'name'          => 'Cordiez',
            'store_url'     => 'https://www.cordiez.com.ar',
            'is_vtex_store' => true,
        ]);
        Store::factory()->create([
            'name'          => 'Supermercados Día',
            'store_url'     => 'https://diaonline.supermercadosdia.com.ar',
            'is_vtex_store' => true,
        ]);
        Store::factory()->create([
            'name'          => 'Walmart',
            'store_url'     => 'https://www.walmart.com.ar',
            'is_vtex_store' => true,
        ]);
        Store::factory()->create([
            'name'          => 'Carrefour',
            'store_url'     => 'https://www.carrefour.com.ar',
            'is_vtex_store' => true,
        ]);
    }
}
