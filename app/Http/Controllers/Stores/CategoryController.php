<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Models\Stores\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categList = Category::orderBy('slug')->get();
        $categories = array();
        $totals = 0;
        foreach ($categList as $idx => $category) {
            foreach ($category->productsQuantity->groupBy('store') as $jdx => $quantity) {
                $categories[$idx][$jdx]['category'] = $category->name;
                $categories[$idx][$jdx]['product_totals'] = $quantity->first()->product_totals;
                $categories[$idx][$jdx]['store'] = $quantity->first()->storeOwner->name;
                $categories[$idx][$jdx]['updated_at'] = $quantity->first()->updated_at;
                $totals += $quantity->first()->product_totals;
            }
        }
        return view('pages.categories.index', compact('categories', 'totals'));
    }
}
