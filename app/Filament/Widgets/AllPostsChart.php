<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JQHT\FilamentStaticChartWidgets\Widgets\PieChartWidget;
use JQHT\FilamentStaticChartWidgets\Widgets\PieChartWidget\Slice;

class AllPostsChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    public bool $showTotalLabel = true;

    protected function getHeading(): string
    {
        return 'All Users';
    }

    public static function canView(): bool
    {
        return Auth::user()->role->name === 'Super Admin';
    }

    protected function getSlices(): array
    {
        return [
            Slice::make('User', User::where('role_id', '=', '3')->count())->color('blue'),
            Slice::make('Admin', User::where('role_id', '=', '2')->count()),
            Slice::make('Super Admin', User::where('role_id', '=', '1')->count())->color('green'),
        ];
    }
}
