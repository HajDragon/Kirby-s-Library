<?php

use Livewire\Component;
use Livewire\WithPagination; // We need this for Livewire pagination!
use App\Models\Book;

new class extends Component
{
    use WithPagination;

    public $search = ''; // Store the search term here instead of the URL
    public $sortBy = 'release_date';
    public $sortDirection = 'desc';

    // This tells Livewire to go back to page 1 whenever the user types a new search
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
    public function books()
    {
        // Capitalized Book::query() and added with('library')
        return Book::query()
            ->with('library')
            ->when($this->search !== '', function ($query) {
                $searchTerm = $this->search;

                // Our bulletproof grouped search logic from earlier!
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('author', 'like', '%' . $searchTerm . '%')
                        ->orWhere('isbn', 'like', '%' . $searchTerm . '%')
                        ->orWhere('publisher', 'like', '%' . $searchTerm . '%')
                        ->orWhereHas('library', function ($libraryQuery) use ($searchTerm) {
                            $libraryQuery->where('name', 'LIKE', "%{$searchTerm}%")
                                ->orWhere('address', 'LIKE', "%{$searchTerm}%");
                        });
                });
            })
            // Apply the sorting
            ->when($this->sortBy, function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            // Use pagination instead of get() for large tables
            ->paginate(12);
    }
};
?>

<div>
    <div class="m-12 flex gap-2">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search by title or author..."
            class="border rounded px-2 py-1 w-164"
        >
    </div>

    <flux:table class="m-4">
        <flux:table.columns>
            <flux:table.column>Image</flux:table.column>
            <flux:table.column>Title</flux:table.column>
            <flux:table.column>Author</flux:table.column>
            <flux:table.column>Publisher</flux:table.column>
            <flux:table.column>ISBN</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'release_date'" :direction="$sortDirection" wire:click="sort('release_date')">Release Date</flux:table.column>
            <flux:table.column>Library Name</flux:table.column>
            <flux:table.column>Library Address</flux:table.column>
            <flux:table.column>Action</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach($this->books as $book)
                <flux:table.row :key="$book->id">
                    <flux:table.cell><img src="{{$book->image_url}}" alt="Book cover" class="w-10 h-10"></flux:table.cell>

                    <flux:table.cell class="flex items-center gap-3">
                        <flux:avatar size="xs" src=""></flux:avatar>
                        {{$book->title}}
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">{{$book->author}}</flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm" inset="top bottom">{{ $book->publisher }}</flux:badge>
                    </flux:table.cell>

                    <flux:table.cell>{{$book->isbn}}</flux:table.cell>

                    <flux:table.cell>{{$book->release_date}}</flux:table.cell>

                    <flux:table.cell>{{$book->library->name}}</flux:table.cell>

                    <flux:table.cell>{{$book->library->address}}</flux:table.cell>

                    <flux:table.cell>
                        <form action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <flux:button type="submit" variant="danger">Delete</flux:button>
                        </form>
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:button href="{{route('books.edit', $book)}}" variant="primary">Edit</flux:button>
                    </flux:table.cell>

                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <div class="mt-4">
        {{ $this->books->links() }}
    </div>
</div>
