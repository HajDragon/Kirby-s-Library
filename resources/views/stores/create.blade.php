<x-layouts::app :title="__('Create Store')">
    <div class="m-8 max-w-2xl">
        <flux:heading size="xl">Create New Store</flux:heading>
        <form action="{{ route('stores.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf
            <flux:field>
                <flux:label>Name</flux:label>
                <flux:input name="name" required />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>City</flux:label>
                <flux:input name="city" required />
                <flux:error name="city" />
            </flux:field>

            <flux:field>
                <flux:label>Address</flux:label>
                <flux:input name="address" required />
                <flux:error name="address" />
            </flux:field>

            <flux:field>
                <flux:label>Store Type</flux:label>
                <flux:select name="store_type">
                    <flux:select.option value="Physical">Physical</flux:select.option>
                    <flux:select.option value="Digital">Digital</flux:select.option>
                    <flux:select.option value="Hybrid">Hybrid</flux:select.option>
                </flux:select>
                <flux:error name="store_type" />
            </flux:field>

            <flux:field>
                <flux:label>Phone Number</flux:label>
                <flux:input name="phone_number" />
                <flux:error name="phone_number" />
            </flux:field>

            <flux:button type="submit" variant="primary">Create Store</flux:button>
        </form>
    </div>
</x-layouts::app>
