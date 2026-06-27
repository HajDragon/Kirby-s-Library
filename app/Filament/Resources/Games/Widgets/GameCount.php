<?php

namespace App\Filament\Resources\Games\Widgets;

use App\Models\Game;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GameCount extends ChartWidget
{
    protected ?string $heading = 'Game Count by Genre';

    protected function getData(): array
    {
        $data = Game::query()
            ->select('genre', DB::raw('count(*) as count'))
            ->groupBy('genre')
            ->pluck('count', 'genre')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Games',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#3b82f6',
                        '#ef4444',
                        '#10b981',
                        '#f59e0b',
                        '#6366f1',
                    ],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
