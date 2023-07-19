<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct(Request $request) {
        // dump($request->route()->getName());
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Cookie::queue('test', 'test1', 1);
        //Вывод содержимого сессии
        // dump($request->session()->all());

        //Запись информации в сессию
        // $request->session()->put('success', ['success' => 'Complete']);

        //Получение значения 
        // dump($request->session()->get('success'));
        
        //Добавить значение в уже существующую переменную
        // $request->session()->push('success', ['step' => '100%']);
        
        //Прочитать значение и сразу же удалить
        // dump($request->session()->pull('success'));

        //Удалить значение
        // dump($request->session()->forget('success'));
        
        //Полностью очищает хранилище сессии
        // $request->session()->flush();

        // dump($request->session()->all());

        //Установка куки
        // Cookie::queue('test', 'test1', 1);
        // Cookie::forget('test');

        // dump(Cookie::get('test'));

        //Кэш. Положить в кэш
        // Cache::put('Test', 'Test value', 60);

        //Запросить из кэша
        // dump(Cache::get('Test'));

        //Проверяем, есть ли что-то в кэше
        // if(Cache::has('posts')) {
        //     $posts = Cache::get('posts');
        // } else {
        //     //Получаем пагинацию по 3 записи на странице
        //     $posts = Post::orderBy('id', 'desc')->paginate(3);
        //     //Кладем в кэш статьи на 1 минуту
        //     Cache::put('posts', $posts, 60);
        // }
        //Получаем пагинацию по 3 записи на странице
        $posts = Post::orderBy('id', 'desc')->paginate(9);

        $title = 'Post Page';
        $h1 = 'Список постов';
        return view('posts.index', compact('title', 'h1', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add new post';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('posts.create', compact('title', 'rubrics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //валидация данных
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'text' => 'required', 
            'rubric_id' => 'integer'
        ]);

        // $rules = [
        //     'title' => 'required|min:5|max:100',
        //     'text' => 'required', 
        //     'rubric_id' => 'integer'
        // ];

        //Кастомизация ошибок валидации
        // $messages = [
        //     'title.required' => 'Заполните поле названия статьи',
        //     'title.min' => 'Минимум 5 символов в названии',
        //     'rubric_id.integer' => 'Выберите рубрику'
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages)->validate();

        Post::create($request->all());

        //Если мы прошли валидацию, сохранили значение в БД, сохраняем информацию во флеш-переменную
        $request->session()->flash('success', 'Статья успешно сохранена');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $title = 'Post show';
        return view('posts.show', compact('id', 'title', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($request);
        dump($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump(__METHOD__);
        dd($id);
    }
}
