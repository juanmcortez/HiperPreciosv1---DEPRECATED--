<?php

namespace App\Models\Updates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductList extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * Return values of the store for DB Update
     *
     * @param Eloquent $store
     * @return void
     */
    public function updateProductsFrom($store)
    {
        $store_products = $this->getProductsPerCategories($store->store_url);
        return (empty($store_products)) ? false : $store_products;
    }


    /**
     * Get information of the store via the vtex API
     *
     * @param String $store_url
     * @return Array
     */
    private function getProductsPerCategories($store_url)
    {
        $categ_URL = $store_url . "/api/catalog_system/pub/category/tree/0";
        $categ_xml = trim(file_get_contents($categ_URL));
        $categ_xml = json_decode($categ_xml);

        $list_totals['totalprods'] = 0;

        foreach ($categ_xml as $parent_categ) {
            $productsURL = $store_url . "/api/catalog_system/pub/products/search/?O=OrderByNameASC&fq=C:" . $parent_categ->id;
            file_get_contents($productsURL);
            $total_products = explode('/', $http_response_header[11]);

            // save the total products for the category id
            if (isset($total_products[1])) {
                $categoryname = strtolower(str_replace(' ', '-', $parent_categ->name));
                $list_totals['categories'][$parent_categ->id]['name'] = $categoryname;
                $list_totals['categories'][$parent_categ->id]['products'] = $total_products[1];
                $list_totals['totalprods'] += $total_products[1];
            }
        }

        return $list_totals;
    }
}
