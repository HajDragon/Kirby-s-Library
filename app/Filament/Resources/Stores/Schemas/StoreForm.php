<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('store_type')
                    ->required()
                    ->default('Physical'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel(),
            ]);
    }
}
