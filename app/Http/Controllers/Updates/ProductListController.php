<?php

namespace App\Http\Controllers\Updates;

use App\Http\Controllers\Controller;
use App\Models\Stores\Store;
use App\Models\Updates\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Updates\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function show(ProductList $productList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Updates\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductList $productList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Stores\Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(Store $store)
    {
        $vtex_type = ($store->is_vtex_store) ? $store : false;

        // If the store is a VTEX type, use the api
        if ($vtex_type) {
            $prodList       = new ProductList();
            $apiResponse    = $prodList->updateProductsFrom($store);
            // Update the selected store values
            $store->total_products = $apiResponse['totalprods'];
            $store->total_categories = count($apiResponse['categories']);
            $store->last_products_update = Carbon::now();
            $updateResults = $store->update();
        } else {
            $updateResults  = false;
        }

        if ($updateResults) {
            $message['color']   = 'green';
            $message['icon']    = 'check';
            $message['text']    = '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store\'s products, have been updated.';
        } else {
            $message['color']   = 'red';
            $message['icon']    = 'exclamation-triangle';
            $message['text']    = '<strong>Error!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store\'s products, have not been updated.';
        }

        return redirect(route('store'))->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Updates\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductList $productList)
    {
        //
    }
}
