<?php

namespace App\Orchid\Screens\Reviews;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use App\Models\Post;
use App\Orchid\Layouts\Reviews\ReviewsTable;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;


class ReviewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'post'=>Post::paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Отзывы пользователей';
    }

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
            ReviewsTable::class,

           
        ];
    }

   
    

}
