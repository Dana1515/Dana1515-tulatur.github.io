<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

$datas = DB::select('SELECT * FROM events');
$datas = DB::select('SELECT * FROM hotels');
$datas = DB::select('SELECT * FROM post');
class Event extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'events';
}
class Hotel extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'hotels';
}
class Post extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'post';
}
$events = Event::all();
$hotels = Hotel::all();
$post = Post::all();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/svg+xml" href="/images/logo.svg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Путешествия по Туле, индивидуальные туры в Туле</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
   <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
   <link rel="stylesheet" href="/assets/css/styles.css">
   <link rel="stylesheet" href="/css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body >
  <header class="header" id="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-5 pb-5">
      <div class="container-fluid">
        <div class="logo fs-4 navbar-brand" style="font-weight: 600">Tula Tur</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#events"  >Мероприятия</a>
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="#sights">Достопримечательности</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#hotels">Отели</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#reviews">Отзывы</a>
                </li>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="cookie-block col-12">
    <span class="">Используя данный сайт, Вы даете согласие на использование файлов cookie, помогающих нам сделать его удобнее для Вас. </span>
    <a class="cookie_link" target="_blank" href="https://static.eldorado.ru/static/MVM_Cookie_Policy.pdf">Подробнее</a>
    <button class="ok col-xl-4 col-lg-5 col-md-5 col-sm-5">Хорошо, не показывать больше</button>
</div>
  <main>
    <div class="container-fluid main">
      <div class="container">
        <div class="row justify-content-center align-items-center pt-5 pb-5">
          <div class="col-lg-8 text-center">
            <h1 class="main-title fs-1">Построй сам себе маршрут</h1>
            <p class="main-text fs-3 mt-4 text-center">Приехали в Тулу? <br>Узнай, где выгоднее остановиться,<br> куда сходить и что посмотреть</p>
            <form action="count" class="mt-4 text-center">
              <button class="main-btn mt-4 " type="submit">Подобрать варианты</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
        <div class="container-about">
            <h2 class="title fs-2 text-center" style="font-weight: 600">Почему нужно посетить Тулу</h2>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Город герой
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <img class="col-6 offset-3" src="https://kartageroev.ru/assets/images/tula5.jpg" alt="город герой">
                  <p class="accordion-text ">Самая главная историческая веха — героическая оборона Тулы в годы Великой Отечественной Войны. Этот город один из немногих, защитники которого отбили все атаки фашистов и остались непокоренными. За мужество и героизм 7 декабря 1976 года Туле было присвоено звание «Город-герой».</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Попробовать тульский пряник
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <img class="col-6 offset-3" src="https://cdnmyslo.ru/Contents/ea/58/bb6d-6098-4b2e-8405-d868138feef5/4d862d73-501a-4896-96af-3a3d8cb4e620.jpg"alt="Тульский пряник">
                    <p> Визитная карточка города и самый популярный сувенир среди туристов, к тому же съедобный. Но мало просто купить и попробовать его, гораздо интереснее познакомиться с историей создания, посетив местный музей и мастер-класс по приготовлению и росписи пряников.
                    После можно насладиться чаепитием с вкусной и красивой выпечкой.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Оружейная столица России
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <img class="col-6 offset-3" src="https://www.credos.ru/upload/iblock/e3f/e3fb5fcc65d8ff2333592374970d2df8.jpg" alt="Оружейная столица">
                    <p>В 1595 году Царским указом в Туле была учреждена Кузнецкая слобода (современное Заречье). Память о ней сохранилась до наших дней названиями улиц: Оружейная, Дульная, Курковая, Ствольная, Арсенальная. Оружейники слободы стали прообразами мастеров из сказа «Левша» Н.С. Лескова.
                    С 1704 года Указом Петра I на реке Тулице купцу и промышленнику Никите Демидову было предписано плавить железо и соблюдать оружейное дело. В память о славных делах этой фамилии на территории Кузнецкой слободы открыт историко-мемориальный комплекс «Некрополь Демидовых».
                    В 1712 году еще одним указом Петра I был основан Императорский казенный Тульский оружейный завод. Завод и сейчас занимает свою историческую территорию на острове, образованным рекой Упой и обводным каналом. В честь 200-летия завода и в память о Петре I в 1912 году Императору был поставлен памятник, выполненный известным скульптором Р.Р. Бахом.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Побывать в усадьбе Льва Толстого в Ясной Поляне
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <img class="col-6 offset-3" src="https://geonv.ru/upload/resize_cache/webp/iblock/f1a/mvvya6gdfwtd1rjxsio8p10g573knlm5/DJI_0044-_1_.webp" alt="Усадьба Льва Толстого">
                    <p>Именно здесь писатель родился и провел более 50 лет. А также написал такие известные произведения, как «Война и мир» и «Анна Каренина». В доме сохранилась обстановка последнего года жизни писателя. Все личные вещи, картины и книги — подлинные, они принадлежали Толстому и его семье. Прикоснуться к ним не получится, но полюбоваться и вдохновиться атмосферой ― пожалуйста.
                    Территория усадьбы впечатляет своими размерами и буквально утопает в зелени: от ворот въезда и до самого дома простирается березовая аллея, неподалеку возвышаются вековые дубы, к которым так и хочется прильнуть спиной и ощутить эту многолетнюю мощь. А еще здесь расположена конюшня, поэтому можно совместить приятное с полезным и покататься на лошадях.</p>
                  </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Пожить в доме на дереве в «Лапочкином гнезде»
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <img class="col-6 offset-3" src="https://visittula.com/upload/resize_cache/iblock/c29/905_600_2/ys22tjufc7c5fu65mjnb8juhqsi3myow.jpg" alt="Лапочкино гнездо">
                    <p> Прямо как в детстве, но только не в самодельном, а со всеми удобствами и камином внутри. Отличный вариант для тех, кто хочет пробудить своего внутреннего ребенка. Кроме того, днем можно устроить велопрогулку по проселочным дорогам, полетать на параплане, посетить усадьбу Аксиньино, а вечером расслабиться в бассейне с гидромассажем. Весьма оригинальный вариант загородного досуга.</p>
                  </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Араповские пещеры
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <img class="col-6 offset-3" src="https://lh3.googleusercontent.com/-QxXsUqDc_s0/TvkNher4RXI/AAAAAAAAI7s/k8X9ykaMfz0/s800/%2525D0%252598%2525D0%2525B7%2525D0%2525BE%2525D0%2525B1%2525D1%252580%2525D0%2525B0%2525D0%2525B6%2525D0%2525B5%2525D0%2525BD%2525D0%2525B8%2525D0%2525B5%252520056.jpg" alt="pic">
                    <p>Происхождение подземных келий до сих пор точно неизвестно, но зрелище впечатляет! Однако стоит быть максимально осторожным при посещении ― в каменных лабиринтах легко заблудиться.</p>
                  </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Заглянуть в музей «Старая тульская аптека»
                  </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <img class="col-6 offset-3" src="" alt="pic">
                    <p>«Старая тульская аптека» сохраняет обстановку и антураж провинциальной аптекарской старины минувших дней, раскрывая их посетителю.</p>
                  </div>
                </div>
            </div>
       </div>
    </div>

    <div class="container-fluid mt-5 pt-5 pb-5" id='events'  style=" background: #f3f3f3;">
        <div class="block-events text-center">
          <h2 class="title-event fs-2" style="font-weight: 600">Мероприятия</h2>
          <p class="text-event fs-4 mt-3">Ближайшие мероприятия</p>
        </div>
        <section class="container cards">
          <div class="card__container swiper">
             <div class="card__content">
                <div class="swiper-wrapper">
                  <?php foreach ($events as $event): ?>
                  <article class="card__article swiper-slide">
                    <div class="card__image">
                        <img src="<?= $event->image; ?>" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                    </div>
                    <div class="card__data">
                        <h3 class="card__name"><?= $event->title; ?></h3>
                        <?php
                            $start_date = \Carbon\Carbon::parse($event->dates_begin);
                            $date = $start_date->isoFormat('D MMMM');
                            if ($event->dates_end) {
                                $end_date = \Carbon\Carbon::parse($event->dates_end);
                                $date .= ' - ' . $end_date->isoFormat('D MMMM');
                            }
                        ?>
                        <p class="date"><?= $date ?></p>
                        <a href="<?= $event->more; ?>" class="card__button" target="_blank">Подробнее</a>
                    </div>
                </article>
    
                  <?php endforeach ?>
                </div>
             </div>
  
             <div class="swiper-button-next">
                <i class="ri-arrow-right-s-line"></i>
             </div>
             
             <div class="swiper-button-prev">
                <i class="ri-arrow-left-s-line"></i>
             </div>
  
             <div class="swiper-pagination"></div>
          </div>
       </section>
  
    </div>
  
    <div class="container-fluid mt-5 pt-5" id="sights">
      <div class="block-sight text-center">
        <h2 class="sight fs-2" style="font-weight: 600">Достопримечательности</h2>
      </div>
      
      <div class="slider">
        <div class="nav">
            <div class="prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>            
            </div>    
            <div class="next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>                
            </div>
        </div>
        <div class="item is-active" style="background-image: url(/TulaturProject/public/images/kreml.jpg)">
            <div class="content">
                <div class="item-title ">Тульский Кремль</div>
                <div class="item-text">Памятник архитектуры XVI века, старейшее сооружение города</div>
            </div>
            <div class="imgs">
                <div class="grid">
                    <div class="img img-1">
                        <img src="/TulaturProject/public/images/kreml1.jpg"/>
                    </div>
                    <div class="img img-2">
                        <img src="/TulaturProject/public/images/kreml3.jpg"/>
                    </div>
                    <div class="img img-3">
                        <img src="/TulaturProject/public/images/kreml2.jpg"/>
                    </div>
                    <div class="img img-4">
                        <img src="/TulaturProject/public/images/kreml4.jpg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="item" style="background-image: url(/TulaturProject/public/images/Tolstoy.jpg)">
            <div class="content">
                <div class="item-title">Ясная Поляна</div>
                <div class="item-text">Усадьба в Щёкинском районе, основанная в XVII веке</div>
            </div>
            <div class="imgs">
                <div class="grid">
                    <div class="img img-1">
                        <img src="/images/Tolstoy1.jpg"/>
                    </div>
                    <div class="img img-2">
                        <img src="/images/Tolstoy2.jpg"/>
                    </div>
                    <div class="img img-3">
                        <img src="/images/Tolstoy3.jpg"/>
                    </div>
                    <div class="img img-4">
                        <img src="/images/Tolstoy4.jpg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="item" style="background-image: url(/TulaturProject/public/images/park.jpeg)">
          <div class="content">
              <div class="item-title">ЦПКиО им. П.П. Белоусова</div>
              <div class="item-text">Крупнейший парк Тулы, памятник природы регионального значения и объект общенационального достояния</div>
          </div>
          <div class="imgs">
              <div class="grid">
                  <div class="img img-1">
                      <img src="/public/images/park1.jpg"/>
                  </div>
                  <div class="img img-2">
                      <img src="/public/images/park2.jpg"/>
                  </div>
                  <div class="img img-3">
                      <img src="/public/images/park3.jpg"/>
                  </div>
                  <div class="img img-4">
                      <img src="/public/images/park4.jpg"/>
                  </div>
              </div>
          </div>
      </div>  
         <div class="item" style="background-image: url(/TulaturProject/public/images/naberjnay.jpg)">
          <div class="content">
              <div class="item-title">Казанская набережная</div>
              <div class="item-text">Улица, проходящая вдоль старицы реки Упы мимо Тульского кремля</div>
          </div>
          <div class="imgs">
              <div class="grid">
                  <div class="img img-1">
                      <img src="/TulaturProject/public/images/naberjnay1.jpg"/>
                  </div>
                  <div class="img img-2">
                      <img src="/TulaturProject/public/images/naberjnay2.jpg"/>
                  </div>
                  <div class="img img-3">
                      <img src="/TulaturProject/public/images/naberjnay3.jpg"/>
                  </div>
                  <div class="img img-4">
                      <img src="/TulaturProject/public/images/naberjnay4.jpg"/>
                  </div>
              </div>
          </div>
         </div>  
          <div class="item" style="background-image: url(/TulaturProject/public/images/polenova.jpg)">
            <div class="content">
                <div class="item-title">Поленово</div>
                <div class="item-text">Мемориальный историко-художественный и природный музей-заповедник художника Василия Поленова </div>
            </div>
            <div class="imgs">
                <div class="grid">
                    <div class="img img-1">
                        <img src="/TulaturProject/public/images/polenova1.jpg"/>
                    </div>
                    <div class="img img-2">
                        <img src="/TulaturProject/public/images/polenova2.jpg"/>
                    </div>
                    <div class="img img-3">
                        <img src="/TulaturProject/public/images/polenova3.jpg"/>
                    </div>
                    <div class="img img-4">
                        <img src="/TulaturProject/public/images/polenova4.jpg"/>
                    </div>
                </div>
            </div>
           </div>
    </div>
    <div class="container pt-5">
      <div class="row">
        <form class="form-sight col-12" action="">
          <div class="wrapper">
            <div class="link_wrapper">
              <a href="{{ asset('/sights') }}">Читать подробнее</a>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                  <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
                </svg>
              </div>
            </div>  
        </div>
        </form>
      </div>
    </div>
    
    <div class="container-fluid hotels" id="hotels" style="background: #f3f3f3">
      <div class="row">
        <div class=" text-center">
          <h2 class="hotel fs-2" style="font-weight: 600">Отели и гостиницы</h2>
        </div>
      <?php foreach($hotels as $hotel): ?>
        <div class="hotel">
          <picture class="picture-hotels">
            <img src="<?= $hotel->image; ?>" alt="картинка" class="col-sm-8 offset-sm-1">
          </picture>
          <h3 class="hotel-name"><?= $hotel->title; ?></h3>
          <p class="hotel-price"><?= $hotel->price; ?> &#x20bd;</p>
          <a class="hotel-more text-decoration-none"  href="<?= $hotel->more; ?>" target="_blank">Подробнее</a>
        </div>
      <?php endforeach;?>
      </div>
    </div>
  
    <div class="container-fluid container-reviews" id="reviews">
      <div class="row">
        <h2 class="reviews-title text-center fs-2" style="font-weight: 600">Оставьте отзыв о сервисе</h2>
        
        <div class="block-reviews col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 ">
          <form id="form_reviews" class="form-reviews" method="POST" name="body" action={{ asset('/post') }}>
            @csrf
            <input class="input_text" type="text" placeholder="Введите ваше имя" id="name" name="name" required>
            <input class="input_text" type="number" placeholder="Введите ваш возраст" id="age" name="age" required>
            <p class="give_marks">Поставьте оценку</p>
            <div class="marks d-flex ">
              
              <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="mark" id="markFive" value="5">
                <label class="form-check-label" for="markFive">
                  5
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mark" id="markFour" value="4" >
                <label class="form-check-label" for="markFour">
                  4
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mark" id="markThree" value="3" >
                <label class="form-check-label" for="markThree">
                  3
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mark" id="markTwo" value="2">
                <label class="form-check-label" for="markTwo">
                  2
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mark" id="markTwo" value="2">
                <label class="form-check-label" for="markTwo">
                  1
                </label>
              </div>

            </div>
            <textarea class="input_text" placeholder="Оставьте ваше мнение и пожелания" id="review" name="review"></textarea>
            <button type="submit" class="btn-review pb-10" data-path="form-popup">Отправить</button>
          </form>
        </div>
  
      </div>
    </div>
     
  </main>

<footer class="footer">
  <div class="logo fs-4 d-flex justify-content-center" style="font-weight: 600">Tula Tur</div>
</footer>

<script>
  document.querySelectorAll('#navbarOffcanvasLg .nav-link').forEach(function(element) {
  element.addEventListener('click', function() {
    var offcanvas = document.getElementById('navbarOffcanvasLg');
    offcanvas.classList.remove('show');

    var backdrop = document.querySelector('.offcanvas-backdrop');
    if (backdrop !== null) {
      backdrop.parentNode.removeChild(backdrop);
    }
  });
  });
</script>
<script src="https://cdn.jsdelivr.net/gh/Alaev-Co/snowflakes/dist/Snow.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/anime.min.js') }}"></script>
<script src="{{ asset('js/cookie.min.js') }}"></script>
<script src="{{ asset('js/cookie.js') }}"></script>
<script src="{{ asset('js/arrow.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>   
</body>
</html>

