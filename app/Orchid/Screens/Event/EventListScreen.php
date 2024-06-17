<?php


namespace App\Orchid\Screens\Event;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use App\Models\Event;
use App\Orchid\Layouts\Event\EventListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Group;


class EventListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            
            'events'=>Event::paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Мероприятия';
    }
    // public $permission="permission_event";

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make(name:'Создать мероприятие')->modal('createEvent')->method('create'),
           
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return[
            EventListTable::class,

            Layout::modal('createEvent', Layout::rows([
                Input::make(name:'id')->title('id'),
                Input::make(name:'image')->required()->title('Ссылка на картинку'),
                Input::make(name:'title')->required()->title('Название мероприятия'),
                Input::make(name:'description')->title('Описание'),
                Input::make(name:'price')->required()->title('Минимальная цена в рублях'),
                Group::make([
                    DateTimer::make(name:'dates_begin')->required()->format('Y-m-d')->title('Дата начала'),
                    DateTimer::make(name:'dates_end')->format('Y-m-d')->title('Дата окончания'),
                ]),
                Input::make(name:'more')->required()->title('Ссылка на бронирование или подробное описание'),
            ]))->applyButton('Создать')->title('Создание мероприятия'),

            Layout::modal('editEvent', Layout::rows([
                Input::make(name:'event.id')->type('hidden'),
                Input::make(name:'event.image')->title('Ссылка на картинку'),
                Input::make(name:'event.title')->title('Название мероприятия'),
                Input::make(name:'event.description')->title('Описание'),
                Input::make(name:'event.price')->title('Минимальная цена в рублях'),
                Group::make([
                    DateTimer::make(name:'event.dates_begin')->format('Y-m-d')->title('Дата начала'),
                    DateTimer::make(name:'event.dates_end')->format('Y-m-d')->title('Дата окончания'),
                ]),
                Input::make(name:'event.more')->title('Ссылка на бронирование или подробное описание'),

            ]))->applyButton('Изменить')->async('asyncGetEvent'),

            Layout::modal('deleteEvent', Layout::rows([
                Input::make(name:'event.id')->type('hidden'),
                Input::make(name:'event.title')->title('Название мероприятия'),
            ]))->applyButton('Удалить')->async('asyncGetEvent')
        ];
    
    }

    public function asyncGetEvent(Event $event):array
    {
        return[
            'event'=>$event,

        ];
    }
    public function update(Request $request)
    {
        Event::find($request->input('event.id'))->update($request->event);
        alert('Мероприятие успешно обновлено');
        
    }
    public function delete(Request $request)
    {
        Event::find($request->input('event.id'))->delete($request->event);
        alert('Мероприятие удалено');
        
    }

    public function create(Request $request):void
    {
        $validatedData=$request->validate([
      
        'image'=>['required'],
        'title'=>['required'],
        'description'=>['max:500'],
        'price'=>['numeric'],
        'dates_begin'=>['required'],
        'more'=>['required'],
      ]);

    Event::create( $validatedData);
    alert('Мероприятие успешно создано');
    } 
}
   

