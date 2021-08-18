<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stores\StoreRequest;
use App\Models\Stores\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('pages.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Stores\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = new Store();
        $store->name            = $request->input('name');
        $store->store_url       = $request->input('store_url');
        $store->is_vtex_store   = (empty($request->input('is_vtex_store'))) ? false : true;
        $store->save();

        return redirect(route('store'))
                ->with('status', '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('pages.stores.show', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Stores\StoreRequest  $request
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store->name            = $request->input('name');
        $store->store_url       = $request->input('store_url');
        $store->is_vtex_store   = ($request->input('is_vtex_store') == 'on') ? true : false;
        $store->update();

        return redirect(route('store'))
                ->with('status', '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect(route('store'))
                ->with('status', '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been deleted.');
    }
}
