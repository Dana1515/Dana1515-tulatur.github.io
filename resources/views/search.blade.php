<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/public/images/logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результат</title>
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
</head>
<body>
    <header class="container-fluid header" id="header"> 
        <div class="container main pb-4 pt-4">
            <div class="logo fs-4 navbar-brand" style="font-weight: 600">Tula Tur</div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="btn arrow back">
                    <i class="fa fa-arrow-left back"></i><a class="back text-decoration-none" href={{ asset('/count') }} >Назад</a> 
                </button>
            </div>
        </div>
    </div>


    @if (is_array($allCombinations) && count($allCombinations) > 0)
    @foreach ($allCombinations as $combination)
    <div class="combination col-10">
        <h2 class="variatoin_text text-center">Вариант {{ $loop->iteration }}</h2>

        @if (!empty($combination['hotel']))
        <div class="hotel_card">
            <div class="block_hotel ">
                <h3 class="hotel_text">Отель: {{ $combination['hotel']->title }}</h3>
                <p class="minprice">Цена (минимальная): {{ $combination['hotel']->price }} &#x20bd;</p>
                <a class="hotel_more text-decoration-none"  href="{{ $combination['hotel']->more }}" target="_blank">Подробнее</a>
            </div>
            <img src="{{ $combination['hotel']->image }}" alt="{{ $combination['hotel']->title }}" class="img">
        </div>
        @endif
    
        @if (!empty($combination['events']))
        <div class="events">
            @foreach ($combination['events'] as $event)
            <div class="event">
                <div class="block_event ">
                    <h3>Мероприятие: {{ $event->title }}</h3>
                    <p class="description col-7">{{ $event->description }} </p>
                    <p class="minprice">Цена (минимальная): {{ $event->price }}&#x20bd; </p>
                    <a href="{{ $event->more }}"target="_blank" class="text-decoration-none">Подробнее</a>
                </div>
                <img src="{{ $event->image }}" alt="картинка мероприятия" class="img ">
            </div>
            @endforeach
        </div>
        @endif
    
        @if (!empty($combination['sights']))
        <div class="sights">
            @foreach ($combination['sights'] as $sight)
            <div class="sight">
                <div class="sight_card">
                    <h3>Достопримечательность: {{ $sight->title }}</h3>
                    <p class="minprice">Цена (минимальная):{{ $sight->price }}&#x20bd; </p>
                </div>
                <img src="{{ $sight->image }}" alt="картинка достопримечательности" class="img">
            </div>
            @endforeach
        </div>
        @endif
    </div>
        
    @endforeach
@else
<div class="container">
    <div class="col-12">
        <div class="not_found">
            <img class="no_results" src="/images/notresults.png">
            <h2 class="sorry">Извините, на указанную сумму нет результатов</h2>
        </div>
    </div>

</div>
    
  
@endif


    <script>
        document.querySelector('.btn.arrow.back a.back').addEventListener('mouseover', function() {
          document.querySelector('.btn.arrow.back i').style.color = 'blue'; 
        });
      
        document.querySelector('.btn.arrow.back a.back').addEventListener('mouseout', function() {
          document.querySelector('.btn.arrow.back i').style.color = ''; 
        });
      </script>

    <script src="https://kit.fontawesome.com/69a649deb9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/arrow.js') }}"></script>
</body>
</html>