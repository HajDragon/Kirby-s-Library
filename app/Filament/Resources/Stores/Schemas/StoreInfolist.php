<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StoreInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('city'),
                TextEntry::make('address'),
                TextEntry::make('store_type'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('phone_number')
                    ->placeholder('-'),
            ]);
    }
}
