<?php

namespace App\Orchid\Layouts\Sight;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Sight;
use Orchid\Screen\Actions\ModalToggle;

class SightListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'sights';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
                TD::make(name:'id', title:'id')->width(80),
                TD::make(name:'image', title:'картинка')->width(250),
                TD::make(name:'title', title:'название')->width(200)->filter(filter:TD::FILTER_TEXT),
                TD::make(name:'description', title:'описание')->width(250),
                TD::make(name:'price', title:'Цена (руб)')->width(50),
                TD::make(name:'')->render(function(Sight $sight)
                {
                    return ModalToggle::make('Редактировать')->modal('editSight')
                    ->method('update')
                    ->modalTitle('Редактирование достопримечательности')
                    ->asyncParameters([
                        'sight'=>$sight->id
                    ]);
                }),
                TD::make(name:'')->render(function(Sight $sight)
                {
                    return ModalToggle::make('Удалить')->modal('deleteSight')
                    ->method('delete')
                    ->modalTitle('Вы действительно хотите удалить эту достопримечательность?')
                    ->asyncParameters([
                        'sight'=>$sight->id
                    ]);
                })
                
             
        ];
    }
}
