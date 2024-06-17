<?php

namespace App\Orchid\Screens\Sight;

use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use App\Models\Sight;
use App\Orchid\Layouts\Sight\SightListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;


class SightListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'sights'=>Sight::paginate(10),
        ];
    }
    // public $permission='permission_sight';

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Достопримечательности';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make(name:'Добавить достопримечательность')->modal('createSight')->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SightListTable::class,

            Layout::modal('createSight', Layout::rows([
                Input::make(name:'id')->title('id'),
                Input::make(name:'image')->title('Ссылка на картинку'),
                Input::make(name:'title')->required()->title('Название достопримечательности'),
                Input::make(name:'description')->required()->title('Описание'),
                Input::make(name:'price')->required()->title('Минимальная цена в рублях'),
            ]))->applyButton('Добавить')->title('Добавить достопримечательность'),

            Layout::modal('editSight', Layout::rows([
                Input::make(name:'sight.id')->type('hidden'),
                Input::make(name:'sight.image')->title('Ссылка на картинку'),
                Input::make(name:'sight.title')->title('Название мероприятия'),
                Input::make(name:'sight.description')->title('Описание'),
                Input::make(name:'sight.price')->title('Минимальная цена в рублях'),
            ]))->applyButton('Изменить')->async('asyncGetSight'),

            Layout::modal('deleteSight', Layout::rows([
                Input::make(name:'sight.id')->type('hidden'),
                Input::make(name:'sight.title')->title('Название мероприятия'),
            ]))->applyButton('Удалить')->async('asyncGetSight')
        ];
    }

    public function asyncGetSight(Sight $sight):array
    {
        return[
            'sight'=>$sight,

        ];
    }
    public function update(Request $request)
    {
        Sight::find($request->input('sight.id'))->update($request->sight);
        alert('Достопримечательность успешно обновлена');
        
    }
    public function delete(Request $request)
    {
        Sight::find($request->input('sight.id'))->delete($request->sight);
        alert('Достопримечательность удалена');
        
    }

    public function create(Request $request):void
    {
        $validatedData=$request->validate([
      
        'image'=>['max:2048'],
        'title'=>['required'],
        'description'=>['max:500'],
        'price'=>['numeric'],
      ]);

    Sight::create( $validatedData);
    alert('Достопримечательность успешно создана');


    }
}
