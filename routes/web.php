<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
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
});

Route::get('/', [HomeController::class, 'index'])->name('home');

//Тестовая страница верстки
Route::get('/test', [HomeController::class, 'test'])->name('test');

//Отправка письма
Route::match (['get', 'post'], 'send', [ContactController::class, 'send'])->name('send');

//Админ
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', [MainController::class, 'index']);
});

//404
Route::fallback(function () {
    return view ('errors.404');
});

// Route::get('/send', [ContactController::class, 'send']);

// Route::get('page/{slug}', [PostController::class, 'show']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/post/{id}', function ($id) {
//     return "Post ${id}";
// });

// Route::get('/post/{id}/{slug}', function ($id, $slug) {
//     return "Post ${id} + ${slug}";
// })->where('id', '[0-9]+');