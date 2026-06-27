<x-layouts::app :title="__('Stores')">
    <div class="m-8">
        <flux:heading size="xl">Game Stores</flux:heading>
        <flux:table class="mt-4">
            <flux:table.columns>
                <flux:table.column>Name</flux:table.column>
                <flux:table.column>City</flux:table.column>
                <flux:table.column>Type</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column>Action</flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @foreach($stores as $store)
                    <flux:table.row>
                        <flux:table.cell>{{ $store->name }}</flux:table.cell>
                        <flux:table.cell>{{ $store->city }}</flux:table.cell>
                        <flux:table.cell>{{ $store->store_type }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge color="{{ $store->is_active ? 'green' : 'red' }}">
                                {{ $store->is_active ? 'Active' : 'Inactive' }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:button href="{{ route('stores.edit', $store) }}" variant="ghost" icon="pencil-square" />
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
    </div>
</x-layouts::app>
