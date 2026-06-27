<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('stores')
                    ->relationship('stores', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('developer')
                    ->required(),
                TextInput::make('genre')
                    ->required(),
                TextInput::make('playtime')
                    ->required()
                    ->numeric(),
                DatePicker::make('release_date'),
                FileUpload::make('image_url')
                    ->image(),
            ]);
    }
}
