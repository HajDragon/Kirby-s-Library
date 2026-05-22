<?php

use Livewire\Component;

new class extends Component
{
    public $book;
};
?>

    <form action="{{ route('books.update', $book) }}" method="post" wire:submit>
        @method('PUT')
        @csrf

        <flux:heading class="text-xl font-mono">Enter Books Data</flux:heading>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl">Title</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input  wire:mode:="{{$book->title}}" name="title " />
                <flux:error name="Title" />

            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Author</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input name="author" value="{{$book->author}}"  />
                <flux:error name="author" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Publisher</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input name="publisher" value="{{$book->publisher}}"  />
                <flux:error name="publisher" />
            </flux:field>

                <flux:field class="max-w-xs">
                    <flux:label class="pt-8 text-xl" >ISBN</flux:label>
                    <flux:description>This will be publicly displayed.</flux:description>
                    <flux:input name="ISBN" value="{{$book->isbn}}"  />
                    <flux:error name="ISBN" />
                </flux:field>

                <flux:field class="max-w-xs">
                    <flux:label class="pt-8 text-xl" >Release Date</flux:label>
                    <flux:description>This will be publicly displayed.</flux:description>
                    <flux:input name="release_date" value="{{$book->release_date}}" type="date"  />
                    <flux:error name="release_date" />
                </flux:field>

        </div>
    </form>
