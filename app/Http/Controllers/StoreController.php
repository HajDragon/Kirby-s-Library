<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('stores.index', [
            'stores' => Store::all(),
        ]);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'store_type' => 'required|string|max:255',
            'is_active' => 'boolean',
            'phone_number' => 'nullable|string|max:20',
        ]);

        Store::create($validated);

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    public function show(Store $store)
    {
        return view('stores.show', [
            'store' => $store,
        ]);
    }

    public function edit(Store $store)
    {
        return view('stores.edit', [
            'store' => $store,
        ]);
    }

    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'store_type' => 'required|string|max:255',
            'is_active' => 'boolean',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $store->update($validated);

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
}
