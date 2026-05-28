<?php

use Livewire\Component;

new class extends Component
{
        public $book;
};
?>
<div>

@if ($errors->any())
    <div class="mb-4 text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('books.update', $book) }}" method="post">
        @method('PUT')
        @csrf

        <flux:heading class="text-xl font-0xProto">Enter Books Data</flux:heading>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl">Title</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input  value="{{$book->title}}" name="title" />
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
                    <flux:input name="isbn" value="{{$book->isbn}}"  />
                    <flux:error name="isbn" />
                </flux:field>

                <flux:field class="max-w-xs">
                    <flux:label class="pt-8 text-xl" >Release Date</flux:label>
                    <flux:description>This will be publicly displayed.</flux:description>
                    <flux:input name="release_date" value="{{$book->release_date}}" type="date"  />
                    <flux:error name="release_date" />
                </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Library name</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input name="Library_Name" value="{{$book->library->name}}"  />
                <flux:error name="Library_Name" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Library Address</flux:label>
                <flux:description>This will be publicly displayed.</flux:description>
                <flux:input name="address" value="{{$book->library->address}}"  />
                <flux:error name="address" />
            </flux:field>



            <button type='submit' class=" lg:col-span-3 lg:w-1/6 w-1/4 mt-12 col-span-2 border-2 bg-indigo-600 p-2 rounded-xl hover:border-indigo-950 transform-border duration-300 hover:scale-105 hover:text-xl hover:font-mono">Submit</button>

        </div>
    </form>
</div>
