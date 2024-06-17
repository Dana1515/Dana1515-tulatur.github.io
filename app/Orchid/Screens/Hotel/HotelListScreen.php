<?php

namespace App\Orchid\Screens\Hotel;

use Orchid\Screen\Screen;


use Illuminate\Http\Request;

use Orchid\Screen\Fields\Input;
use App\Models\Hotel;
use App\Orchid\Layouts\Hotel\HotelListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;


class HotelListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'hotels'=>Hotel::paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Отели';
    }
    // public $permission='permission_hotel';

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make(name:'Добавить отель')->modal('addHotel')->method('add'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            HotelListTable::class,

            Layout::modal('addHotel', Layout::rows([
                Input::make(name:'id')->title('id'),
                Input::make(name:'image')->required()->title('Ссылка на картинку'),
                Input::make(name:'title')->required()->title('Название отеля'),
                Input::make(name:'price')->required()->title('Минимальная цена в рублях'),
                Input::make(name:'more')->required()->title('Ссылка на официальный сайт отеля'),
            ]))->applyButton('Создать')->title('Добавление отеля'),

            Layout::modal('editHotel', Layout::rows([
                Input::make(name:'hotel.id')->type('hidden'),
                Input::make(name:'hotel.image')->title('Ссылка на картинку'),
                Input::make(name:'hotel.title')->title('Название отеля'),
                Input::make(name:'hotel.price')->title('Минимальная цена в рублях'),
                Input::make(name:'hotel.more')->title('Ссылка на бронирование или подробное описание'),
            ]))->applyButton('Изменить')->async('asyncGetHotel'),

            Layout::modal('deleteHotel', Layout::rows([
                Input::make(name:'hotel.id')->type('hidden'),
                Input::make(name:'hotel.title')->title('Название отеля'),
        
            ]))->applyButton('Удалить')->async('asyncGetHotel')
        ];
        
    }
    public function asyncGetHotel(Hotel $hotel):array
    {
        return[
            'hotel'=>$hotel,

        ];
    }
    public function update(Request $request)
    {
        Hotel::find($request->input('hotel.id'))->update($request->hotel);
        alert('Отель успешно редактирован');
        
    }
    public function delete(Request $request)
    {
        Hotel::find($request->input('hotel.id'))->delete($request->hotel);
        alert('Отель удален');
        
    }


    public function add(Request $request):void
    {
        $validatedData=$request->validate([
      
        'image'=>['required'],
        'title'=>['required'],
        'price'=>['numeric'],
        'more'=>['required'],
      ]);

    Hotel::create( $validatedData);
    alert('Отель успешно добавлен');
    }
}
