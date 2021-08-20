<?php

namespace App\Models\Dashboards;

use App\Models\Stores\CategoryUpdates;
use App\Models\Stores\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use HasFactory;


    /**
     * This formula returns the values of the
     * evolution of products per store by date
     *
     * @return void
     */
    public static function productsPerStoreEvolution()
    {
        $stores = Store::all();
        foreach ($stores as $store) {
            $categories = CategoryUpdates::where('store', $store->id)->orderBy('updated_at')->get();
            foreach ($categories->groupBy('updated_at') as $date => $categoryDates) {
                $updates[$store->id][$date]['store'] = $store->name;
                $updates[$store->id][$date]['product_totals'] = 0;
                foreach ($categoryDates as $category) {
                    $updates[$store->id][$date]['product_totals'] += $category->product_totals;
                }
                $updates[$store->id][$date]['updated_at'] = $date;
            }
        }

        return $updates;
    }
}
