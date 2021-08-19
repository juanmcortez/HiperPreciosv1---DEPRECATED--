<?php

namespace App\Models\Updates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Http;

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
        return (empty($store_products) || !$store_products) ? false : $store_products;
    }


    /**
     * Get information of the store via the vtex API
     *
     * @param String $store_url
     * @return Array
     */
    private function getProductsPerCategories($store_url)
    {
        // Init
        $productsList = array();
        $total_prods = 0;

        // Get the category tree
        $categ_xml = Http::retry(3, 500)->get($store_url . "/api/catalog_system/pub/category/tree/0");

        if ($categ_xml->successful()) {
            // Get products based on category
            foreach ($categ_xml->json() as $idx => $parent_categ) {
                // Default values
                $i = $j = 0;
                $step = 49;
                $limit = 2500;

                // Category details
                $category[$idx]['id']     = $parent_categ['id'];
                $category[$idx]['name']   = strtolower(str_replace(' ', '-', $parent_categ['name']));

                // Get total products in category
                $prods_per_categ = Http::retry(3, 500)->get($store_url . "/api/catalog_system/pub/products/search/", [
                    'O'     => 'OrderByNameASC',
                    'fq'    => 'C:' . $parent_categ['id'],
                ]);

                if ($prods_per_categ->successful()) {
                    // Total Products + Limit
                    $total_cat_prods = explode('/', $prods_per_categ->header('resources'));
                    $total_cat_prods = $total_cat_prods[1];
                    $total_prods += $total_cat_prods;
                    // $limit = ($limit >= $total_cat_prods) ? $total_cat_prods : $limit;

                    // Loop all the products in the category
                    /*for ($i = 0; $i <= $limit; $i += $step) {
                        $productsAPI = Http::retry(3, 500)->get($store_url . "/api/catalog_system/pub/products/search/", [
                            'O'     => 'OrderByNameASC',
                            'fq'    => 'C:' . $parent_categ['id'],
                            '_from' => $i,
                            '_to'   => $i + $step,
                        ]);

                        if ($productsAPI->successful()) {
                            // Add the individual products to the final list
                            foreach ($productsAPI->json() as $productDetail) {
                                $productsList[$j]['storeId'] = $productDetail['productId'];
                                $productsList[$j]['storeCat'] = $category[$idx]['name'];
                                $productsList[$j]['prodName'] = $productDetail['productName'];
                                $productsList[$j]['prodTitl'] = $productDetail['productTitle'];
                                $productsList[$j]['prodDesc'] = $productDetail['description'];
                                foreach ($productDetail['items'] as $item) {
                                    $productsList[$j]['prodItemName'] = $item['name'];
                                    $productsList[$j]['prodItemFullName'] = $item['nameComplete'];
                                    $productsList[$j]['prodItemEan'] = $item['ean'];
                                    $productsList[$j]['prodItemUnit'] = $item['measurementUnit'];
                                    $productsList[$j]['prodItemMultiplier'] = $item['unitMultiplier'];
                                    $productsList[$j]['prodItemImage'] = $item['images'][0]['imageUrl'];
                                    $productsList[$j]['prodItemImageTest'] = $item['images'][0]['imageText'];
                                    $productsList[$j]['prodItemPrice'] = $item['sellers'][0]['commertialOffer']['ListPrice'];
                                    $productsList[$j]['prodItemPriceDisc'] = $item['sellers'][0]['commertialOffer']['PriceWithoutDiscount'];
                                    $productsList[$j]['prodItemPriceStor'] = $item['sellers'][0]['commertialOffer']['Price'];
                                    $productsList[$j]['prodItemTax'] = $item['sellers'][0]['commertialOffer']['Tax'];
                                    $productsList[$j]['prodItemAvailQuan'] = $item['sellers'][0]['commertialOffer']['AvailableQuantity'];
                                    $productsList[$j]['prodItemIsAvailable'] = $item['sellers'][0]['commertialOffer']['IsAvailable'];
                                }
                                $j++;
                            }
                        } else {
                            return false;
                        }
                    }*/
                } else {
                    return false;
                }
            }
        } else {
            // Failed to obtain categories
            return false;
        }

        $list_totals['total_prods'] = $total_prods;
        $list_totals['categories'] = $category;

        return $list_totals;
    }
}
