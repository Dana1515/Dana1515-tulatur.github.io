<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/images/logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Строим маршруты</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sights.css') }}">
    <link rel="stylesheet" href="{{ asset('css/count.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
</head>
<body>
    <header id="container-fluid header">
        <div class="container main pb-4 pt-4">
            <div class="logo fs-4 navbar-brand" style="font-weight: 600">Tula Tur</div>
        </div>
    </header>
    <div class="container-fluid main_count ">
                <button class="btn arrow back">
                    <i class="fa fa-arrow-left back"></i><a class="back" href={{ asset('/') }}>На главную</a> 
                </button>
               
                
                <div class="container-fluid form mb-5">
                    <div class="col-10 ">
                        <div class="form_title mt-5 mb-3 fs-3 col-xl-12 col-lg-12 col-md-12">Введите сумму и выберите варианты</div>
                        <form class="form_count " name="form_count" method="POST" action="{{ route('route.store') }}" id="form_count">
                            @csrf
                            <input class="num mt-5 col-xl-5 col-lg-6 col-md-6 col-sm-12 mb-3" type="text" name="sum" required="required" placeholder="Введите сумму" id="sum">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckEvents" name="events">
                                <label class="form-check-label fs-5" for="flexCheckEvents">
                                  Мероприятия
                                </label>
                            </div>
                            <div id="dateInput" style="display: none;">
                              <label for="eventDate" class="choose_date fs-5">Выберите дату мероприятия:</label>
                              <input type="date" id="eventDate" name="eventDate">
                          </div>
                            <div class="form-check  ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckSights" name="sights">
                                <label class="form-check-label fs-5" for="flexCheckSights">
                                  Достопримечательности
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckHotels" name="hotels">
                                <label class="form-check-label fs-5" for="flexCheckHotels">
                                  Отели
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 col-xl-5 col-lg-6 col-md-6 col-sm-12 mt-2">Сформировать</button>
                        </form>
                    </div>
                </div>
     </div>
    <script>
        document.querySelector('.btn.arrow.back a.back').addEventListener('mouseover', function() {
          document.querySelector('.btn.arrow.back i').style.color = '#c7ddff'; 
        });
      
        document.querySelector('.btn.arrow.back a.back').addEventListener('mouseout', function() {
          document.querySelector('.btn.arrow.back i').style.color = ''; 
        });

        document.getElementById('flexCheckEvents').addEventListener('change', function() {
    var dateInput = document.getElementById('dateInput');
    if (this.checked) {
        dateInput.style.display = 'block';
    } else {
        dateInput.style.display = 'none';
    }
});

      </script>
      

    <script src="https://kit.fontawesome.com/69a649deb9.js" crossorigin="anonymous"></script>
</body>
</html>