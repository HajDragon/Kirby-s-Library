<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GameInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('stores.name')
                    ->label('Stores')
                    ->badge(),
                TextEntry::make('name'),
                TextEntry::make('developer'),
                TextEntry::make('genre'),
                TextEntry::make('playtime')
                    ->numeric(),
                TextEntry::make('release_date')
                    ->date()
                    ->placeholder('-'),
                ImageEntry::make('image_url')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
