<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\SightsController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PostController;
// Route::get('/bd', function () {
//     try {
//         DB::connection()->getPdo();
//         return "Соединение с базой данных установлено успешно!";
//     } catch (\Exception $e) {
//         return "Не удалось установить соединение с базой данных: " . $e->getMessage();
//     }
// });
Route::get('/', [MainController::class, 'main']);
Route::get('/sights', [SightsController::class, 'sights']);
Route::get('/count', [CountController::class, 'count']);
Route::get('/result', [ResultController::class, 'result']);
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('/search', [RouteController::class, 'store'])->name('route.store');

