<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Event;
use App\Models\IndustryPartner;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s';

    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('All Event Posts', Event::all()->count()),
            Card::make('All Blog Posts', Blog::all()->count()),
            Card::make('All Contact', Contact::all()->count())
        ];
    }
}
