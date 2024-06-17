<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
$datas = DB::select('SELECT * FROM sights');

class Sight extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'sights';
}
$sights = Sight::all();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/images/logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Достопримечательности Тульской области</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sights.css') }}">
    <link rel="stylesheet" href="{{ asset('css/arrow.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
   
</head>
<body>

    <header class="container-fluid header" id="header">
        <div class="container main pb-4 pt-4">
            <div class="logo fs-4 navbar-brand" style="font-weight: 600">Tula Tur</div>

            <div class="btn-group d-flex col-xl-3 col-lg-4 col-md-5">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Список
                </button>
                
                <ul class="dropdown-menu" id="menu">
                  <?php foreach ($sights as $sight): ?>
                  <li><a class="link sights" href="#<?= $sight['id']; ?>"><?= $sight['title']; ?></a></li><hr>
                  <?php endforeach; ?>
                </ul>
                
            </div>
        </div>
    </header>
    

    <div class="container">
        <button class="btn arrow">
            <i class="fa fa-arrow-left"></i><a class="sights_link" href={{ asset('/') }}>На главную</a> 
        </button>
    </div>

    <div class="container-fluid">
        <?php foreach ($sights as $sight): ?>
    <div class="accordion" id="<?= $sight['id']; ?>">
        <div class="accordion-block">
          <div class="block">
            <h3 class="accordion-title"><?= $sight['title']; ?></h3>
          </div>
          <div class="subscribe">
            <picture class="picture-block-1">
              <img src="<?= $sight['image']; ?>" alt="картинка">
            </picture>
            <div class="about">
              <p class="accordion-text"><?= $sight['description']; ?></p>
            </div>
          </div>    
        </div>
    </div>
        <?php endforeach; ?>
    </div>

    <footer class="footer">
      <div class="logo fs-4 d-flex justify-content-center" style="font-weight: 600">Tula Tur</div>
    </footer>

    <script>
      document.querySelector('.btn.arrow .sights_link').addEventListener('mouseover', function() {
        document.querySelector('.btn.arrow i').style.color = 'blue'; 
      });
    
      document.querySelector('.btn.arrow .sights_link').addEventListener('mouseout', function() {
        document.querySelector('.btn.arrow i').style.color = ''; 
      });

    </script>


    <script src="https://kit.fontawesome.com/69a649deb9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/arrow.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   

</body>
</html>

