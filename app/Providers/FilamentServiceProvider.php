<?php

namespace App\Providers;

use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;

//use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            if (auth()->user()) {
                if (auth()->user()->role->name === 'Super Admin') {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manage Users')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-users'),
                    ]);
                }
            }
        });
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()
                    ->label('My Profile')
                    ->url(MyProfile::getUrl()),
            ]);
        });

        FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
            $indicator->showBadge = fn () => false;
            $indicator->showBorder = fn () => false;
        }, isImportant: true);

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('User Site')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Front Banner')
                    ->collapsed(),
            ]);
        });
        Filament::registerNavigationGroups([
            'Career Site',
            'User Site',
            'Front Banner',
        ]);
    }
}
