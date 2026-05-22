<?php

use Livewire\Component;
use App\Models\Book;

new class extends Component
{
    public $sortBy = 'release_date';
    public $sortDirection = 'desc';

    public function sort($column){
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
            return book::query()
                ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)->get();

        }
};
?>


<flux:table>
    <flux:table.columns>
        <flux:table.column>Title</flux:table.column>
        <flux:table.column>Author</flux:table.column>
        <flux:table.column>Publisher</flux:table.column>
        <flux:table.column>ISBN</flux:table.column>
        <flux:table.column sortable :sorted="$sortBy === 'release_date'" :direction="$sortDirection" wire:click="sort('release_date')">release_date</flux:table.column>

        <flux:table.rows>
            @foreach($this->books as $book)
                <flux:table.row :key="$book->id">
                    <flux:table.cell class="flex items-center gap-3">
                        <flux:avatar size="xs" src=""></flux:avatar>
                        {{$book->title}}
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">{{$book->author}} </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm" inset="top bottom">{{ $book->publisher }}</flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="">
                        {{$book->isbn}}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{$book->release_date}}
                    </flux:table.cell>

                    <flux:table.cell>
                        <form action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <flux:button type="submit" variant="danger">Delete</flux:button>
                        </form>
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:button href="{{route('books.edit',$book)}}" variant="primary">Edit</flux:button>
                    </flux:table.cell>

                </flux:table.row>
            @endforeach
        </flux:table.rows>

    </flux:table.columns>
</flux:table>
