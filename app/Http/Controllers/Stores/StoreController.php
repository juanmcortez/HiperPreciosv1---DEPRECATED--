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
        $stores = Store::query()->orderBy('total_products')->orderBy('name')->get();
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

        $message['color']   = 'green';
        $message['icon']    = 'check';
        $message['text']    = '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been created.';
        return redirect(route('store'))->with('status', $message);
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

        $message['color']   = 'green';
        $message['icon']    = 'check';
        $message['text']    = '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been updated.';
        return redirect(route('store'))->with('status', $message);
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

        $message['color']   = 'green';
        $message['icon']    = 'check';
        $message['text']    = '<strong>Success!</strong> <em>' . ucfirst(strtolower($store->name)) . '</em> store, has been deleted.';
        return redirect(route('store'))->with('status', $message);
    }
}
