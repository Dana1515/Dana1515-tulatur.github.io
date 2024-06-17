<?php

namespace App\Orchid\Layouts\Event;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Event;
use Orchid\Screen\Actions\ModalToggle;

class EventListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'events';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
                TD::make(name:'id', title:'id')->width(80),
                TD::make(name:'image', title:'картинка')->width(100),
                TD::make(name:'title', title:'название')->width(150)->filter(filter:TD::FILTER_TEXT),
                TD::make(name:'description', title:'описание')->width(250),
                TD::make(name:'price', title:'Цена (руб)')->width(50),
                TD::make(name:'dates_begin', title:'Дата начала')->width(100),
                TD::make(name:'dates_end', title:'Дата окончания')->width(100),
                TD::make(name:'more', title:'ссылка')->width(150),
                TD::make(name:'')->render(function(Event $event)
                {
                    return ModalToggle::make('Редактировать')->modal('editEvent')
                    ->method('update')
                    ->modalTitle('Редактирование мероприятия')
                    ->asyncParameters([
                        'event'=>$event->id
                    ]);
                }),
                TD::make(name:'')->render(function(Event $event)
                {
                    return ModalToggle::make('Удалить')->modal('deleteEvent')
                    ->method('delete')
                    ->modalTitle('Вы действительно хотите удалить это мероприятие?')
                    ->asyncParameters([
                        'event'=>$event->id
                    ]);
                }),
                
               
                
        ];
    }
}
