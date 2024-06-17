<?php

declare(strict_types=1);

namespace App\Orchid;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;


class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Мероприятия')
                ->icon('')
                ->route('platform.events'),
                // ->permission('permission_event'),

            Menu::make('Достопримечательности')
                ->icon('')
                ->route('platform.sights'),
                // ->permission('permission_sight'),
               

            Menu::make('Отели')
                ->icon('')
                ->route('platform.hotels'),
                // ->permission('permission_hotel'),

            Menu::make('Отзывы')
                ->icon('star')
                ->route('platform.reviews'),

            Menu::make('Аналитика и отчеты')
                ->icon('bar-chart')
                ->route('platform.analiticsAndReports'),
                // ->permission(['platform.analytics', 'platform.reports']),
            

            Menu::make(__('Users'))
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->icon('people')
                ->title(__('Права доступа')),
            
            Menu::make(__('Roles'))
                ->route('platform.systems.roles')
                ->icon('lock')
                ->permission('platform.systems.roles'),

            
                

        

        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
            ItemPermission::group('Возможности')
                ->addPermission('platform.analitics','Аналитика')
                ->addPermission('platform.events','Мероприятия')
                ->addPermission('platform.sights','Достопримечательности')
                ->addPermission('platform.hotels','Отели'),
            
        ];
    }
}
