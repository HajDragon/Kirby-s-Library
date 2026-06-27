<?php

use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated users can see the stores index', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $store = Store::factory()->create();

    $response = $this->get(route('stores.index'));

    $response->assertStatus(200);
    $response->assertSee($store->name);
});

test('authenticated users can create a store', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $storeData = [
        'name' => 'New Game Store',
        'city' => 'Test City',
        'address' => '123 Test St',
        'store_type' => 'Physical',
        'is_active' => 1,
    ];

    $response = $this->post(route('stores.store'), $storeData);

    $response->assertRedirect(route('stores.index'));
    $this->assertDatabaseHas('stores', ['name' => 'New Game Store']);
});

test('authenticated users can update a store', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $store = Store::factory()->create();

    $updatedData = [
        'name' => 'Updated Store Name',
        'city' => $store->city,
        'address' => $store->address,
        'store_type' => $store->store_type,
        'is_active' => $store->is_active,
    ];

    $response = $this->put(route('stores.update', $store), $updatedData);

    $response->assertRedirect(route('stores.index'));
    $this->assertDatabaseHas('stores', ['id' => $store->id, 'name' => 'Updated Store Name']);
});
