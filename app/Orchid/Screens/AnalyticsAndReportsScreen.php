<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Post;
use App\Orchid\Layouts\Charts\VisitChart;
use App\Orchid\Layouts\Charts\VisitUsers;


class AnalyticsAndReportsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
       
    
        return [
            'visitChart'=>Post::countForGroup('mark')->toChart(),
            // 'visitUsers'=>[
            //     Post::countForGroup('age')->toChart('Возраст пользователей'),
            // ]
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Аналитика и отчеты';
    }
    // public $permission = ['platform.analytics', 'platform.reports'];

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            
            VisitChart::class,
            // VisitUsers::class,

       

        ];
    }
}
