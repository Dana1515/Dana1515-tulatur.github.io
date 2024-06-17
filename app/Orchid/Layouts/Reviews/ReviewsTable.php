<?php

namespace App\Orchid\Layouts\Reviews;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class ReviewsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'post';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make(name:'id', title:'id')->width(80),
            TD::make(name:'name', title:'Имя')->width(100),
            TD::make(name:'age', title:'Возраст')->width(80),
            TD::make(name:'mark', title:'Оценка')->width(80),
            TD::make(name:'review', title:'Отзыв')->width(250),
        ];
    }
}
