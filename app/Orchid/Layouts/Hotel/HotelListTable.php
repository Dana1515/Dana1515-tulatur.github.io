<?php

namespace App\Orchid\Layouts\Hotel;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Hotel;
use Orchid\Screen\Actions\ModalToggle;

class HotelListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'hotels';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make(name:'id', title:'id')->width(80),
            TD::make(name:'image', title:'картинка')->width(200),
            TD::make(name:'title', title:'название')->width(200)->filter(filter:TD::FILTER_TEXT),
            TD::make(name:'price', title:'Цена (руб)')->width(50),
            TD::make(name:'more', title:'ссылка')->width(200),
            TD::make(name:'')->render(function(Hotel $hotel)
                {
                    return ModalToggle::make('Редактировать')->modal('editHotel')
                    ->method('update')
                    ->modalTitle('Редактирование отеля')
                    ->asyncParameters([
                        'hotel'=>$hotel->id
                    ]);
                }),
            TD::make(name:'')->render(function(Hotel $hotel)
            {
                return ModalToggle::make('Удалить')->modal('deleteHotel')
                ->method('delete')
                ->modalTitle('Вы действительно хотите удалить этот отель?')
                ->asyncParameters([
                    'hotel'=>$hotel->id
                ]);
            }),
                
        ];
    }
}
