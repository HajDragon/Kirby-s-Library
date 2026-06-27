<x-layouts::app :title="__('Edit Store')">
    <div class="mx-auto my-8 max-w-2xl">
        <flux:heading size="xl">Edit Store: {{ $store->name }}</flux:heading>
        <form action="{{ route('stores.update', $store) }}" method="POST" class="mt-8 space-y-6">
            @csrf
            @method('PUT')
            <flux:field>
                <flux:label>Name</flux:label>
                <flux:input name="name" value="{{ $store->name }}" required />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>City</flux:label>
                <flux:input name="city" value="{{ $store->city }}" required />
                <flux:error name="city" />
            </flux:field>

            <flux:field>
                <flux:label>Address</flux:label>
                <flux:input name="address" value="{{ $store->address }}" required />
                <flux:error name="address" />
            </flux:field>

            <flux:field>
                <flux:label>Store Type</flux:label>
                <flux:select name="store_type" :value="$store->store_type">
                    <flux:select.option value="Physical">Physical</flux:select.option>
                    <flux:select.option value="Digital">Digital</flux:select.option>
                    <flux:select.option value="Hybrid">Hybrid</flux:select.option>
                </flux:select>
                <flux:error name="store_type" />
            </flux:field>

            <flux:field>
                <flux:label>Phone Number</flux:label>
                <flux:input name="phone_number" value="{{ $store->phone_number }}" />
                <flux:error name="phone_number" />
            </flux:field>

            <div class="flex gap-4">
                <flux:button type="submit" variant="primary">Update Store</flux:button>
                <flux:button href="{{ route('stores.index') }}" variant="ghost">Cancel</flux:button>
            </div>
        </form>

        <form action="{{ route('stores.destroy', $store) }}" method="POST" class="mt-12">
            @csrf
            @method('DELETE')
            <flux:button type="submit" variant="danger" icon="trash">Delete Store</flux:button>
        </form>
    </div>
</x-layouts::app>
