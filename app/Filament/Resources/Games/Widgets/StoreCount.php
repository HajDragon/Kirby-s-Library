<?php

namespace App\Filament\Resources\games\Widgets;

use App\Models\Store;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StoreCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // This will display a card with "Total Stores" and the actual count
            Stat::make('Total Stores', Store::count()),
        ];
    }
    protected int | string | array $columnSpan = [
        'default' => 2, // Full width on mobile
        'md' => 1,       // Takes 1 column on desktop grids
    ];
}
