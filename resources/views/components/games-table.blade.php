<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Game;

new class extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'release_date';
    public $sortDirection = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[\Livewire\Attributes\Computed]
    public function games()
    {
        return Game::query()
            ->with('stores')
            ->when($this->search !== '', function ($query) {
                $searchTerm = $this->search;

                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('developer', 'like', '%' . $searchTerm . '%')
                        ->orWhere('genre', 'like', '%' . $searchTerm . '%')
                        ->orWhereHas('stores', function ($storeQuery) use ($searchTerm) {
                            $storeQuery->where('name', 'LIKE', "%{$searchTerm}%");
                        });
                });
            })
            ->when($this->sortBy, function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            ->paginate(12);
    }
};
?>

<div>
    <div class="m-12 flex gap-2">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search by name, developer or genre..."
            class="border rounded px-2 py-1 w-164"
        >
    </div>

    <flux:table class="m-4">
        <flux:table.columns>
            <flux:table.column>Image</flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Developer</flux:table.column>
            <flux:table.column>Genre</flux:table.column>
            <flux:table.column>Playtime</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'release_date'" :direction="$sortDirection" wire:click="sort('release_date')">Release Date</flux:table.column>
            <flux:table.column>Store Name</flux:table.column>
            <flux:table.column>Action</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach($this->games as $game)
                <flux:table.row :key="$game->id">
                    <flux:table.cell><img src="{{$game->image_url}}" alt="Game cover" class="w-10 h-10"></flux:table.cell>

                    <flux:table.cell class="flex items-center gap-3">
                        {{$game->name}}
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">{{$game->developer}}</flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm" inset="top bottom">{{ $game->genre }}</flux:badge>
                    </flux:table.cell>

                    <flux:table.cell>{{$game->playtime}}h</flux:table.cell>

                    <flux:table.cell>{{$game->release_date}}</flux:table.cell>

                    <flux:table.cell>
                        @foreach($game->stores as $store)
                            <flux:badge size="sm" color="zinc" inset="top bottom">{{ $store->name }}</flux:badge>
                        @endforeach
                    </flux:table.cell>

                    <flux:table.cell>
                        <form action="{{ route('games.destroy', $game) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <flux:button type="submit" variant="danger">Delete</flux:button>
                        </form>
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:button href="{{route('games.edit', $game)}}" variant="primary">Edit</flux:button>
                    </flux:table.cell>

                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <div class="mt-4">
        {{ $this->games->links() }}
    </div>
</div>
