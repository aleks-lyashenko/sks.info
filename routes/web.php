<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Admin\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Маршруты, доступные для гостей
Route::group(['middleware' => 'guest'], function() {
    //Регистрация
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    //Авторизация
    Route::get('login', [UserController::class, 'loginForm'])->name('login.form');
    Route::post('login', [UserController::class, 'login'])->name('login');

});

//Маршруты, доступные для авторизованных
Route::group(['middleware' => 'auth'], function() {
    //Выход из аккаунта
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    //Просмотр, добавление статей
    Route::resource('posts', PostController::class);

    //Тестовая страница верстки
    Route::get('/test', [HomeController::class, 'test'])->name('test');

    //Отправка письма
    Route::match (['get', 'post'], 'send', [ContactController::class, 'send'])->name('send');

    //Работа с изображениями
    Route::resource('images', ImageController::class)->only([
        'index', 'store', 'create'
    ]);

});

Route::get('/', [HomeController::class, 'index'])->name('home');

//Админ
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', [MainController::class, 'index'])->name('admin');
});

//404
Route::fallback(function () {
    return view ('errors.404');
});
