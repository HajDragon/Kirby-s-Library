<?php

use Livewire\Component;

new class extends Component
{
        public $game;
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

    <form action="{{ route('games.update', $game) }}" method="post">
        @method('PUT')
        @csrf

        <flux:heading class="text-xl font-0xProto">Enter Game Data</flux:heading>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl">Name</flux:label>
                <flux:description>The name of the game.</flux:description>
                <flux:input  value="{{$game->name}}" name="name" />
                <flux:error name="name" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Developer</flux:label>
                <flux:description>The game developer.</flux:description>
                <flux:input name="developer" value="{{$game->developer}}"  />
                <flux:error name="developer" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Genre</flux:label>
                <flux:description>The game genre.</flux:description>
                <flux:input name="genre" value="{{$game->genre}}"  />
                <flux:error name="genre" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Playtime (hours)</flux:label>
                <flux:description>Average playtime.</flux:description>
                <flux:input name="playtime" value="{{$game->playtime}}" type="number"  />
                <flux:error name="playtime" />
            </flux:field>

            <flux:field class="max-w-xs">
                <flux:label class="pt-8 text-xl" >Release Date</flux:label>
                <flux:description>When the game was released.</flux:description>
                <flux:input name="release_date" value="{{$game->release_date}}" type="date"  />
                <flux:error name="release_date" />
            </flux:field>

            <flux:field class="lg:col-span-3">
                <flux:label class="pt-8 text-xl" >Available Stores</flux:label>
                <flux:description>Select the stores where this game is available.</flux:description>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                    @foreach(App\Models\Store::all() as $store)
                        <flux:checkbox 
                            name="stores[]" 
                            label="{{ $store->name }}" 
                            value="{{ $store->id }}" 
                            :checked="$game->stores->contains($store->id)" 
                        />
                    @endforeach
                </div>
                <flux:error name="stores" />
            </flux:field>

            <button type='submit' class=" lg:col-span-3 lg:w-1/6 w-1/4 mt-12 col-span-2 border-2 bg-indigo-600 p-2 rounded-xl hover:border-indigo-950 transform-border duration-300 hover:scale-105 hover:text-xl hover:font-mono">Submit</button>

        </div>
    </form>
</div>
