<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index() {
        // Raw SQL-запрос
        // $query = DB::insert("INSERT INTO posts (title,text) values (?,?)", ['SOHO in small office', 'lorem100']);
        // $posts = DB::select("SELECT * FROM posts");
        // DB::update("UPDATE posts SET text= :text WHERE id= :id", ['text' => 'lorem000', 'id' => 2]);
        // DB::delete("DELETE FROM posts WHERE id> :id", ['id' => 2]);
        // dd($posts);

        //Конструктор запросов
        // $data = DB::table('posts')->get();
        // $data = DB::table('posts')->limit(1)->get();
        // $data = DB::table('posts')->limit(1)->select('text')->get();
        // $data = DB::table('posts')->first();
        // $data = DB::table('posts')->orderBy('id', 'desc')->get();
        // $data = DB::table('posts')->select('title')->find(2);
        // $data = DB::table('posts')->select('title')->where('id', '=', 1)->get();
        // $data = DB::table('posts')->select('title')->where('id', '=', 1)->get();
        // $data = DB::table('posts')->pluck('title');
        //distinct, join...
        // $data = DB::table('posts')->count();
        // dd($data);

        // Работа с моделями
        // Создаем экземпляр модели
        // $post = new Post();
        // $post->title = 'Soft SkySoft';
        // $post->text = 'Список программ для SkySoft';
        // $post->save();
        
        // $data = Post::all();
        // $data = Post::limit(3)->select('title')->get();
        // $data = Post::find(16);

        // Добавление, удаление, изменение записей - создаем экземпляр модели и заполняем атрибуты для данного объекта
        
        // создать запись. Вариант 1
        // $data = new Post();
        // $data->title = 'Настройка роутеров MikroTik';
        // $data->text = 'Если вкратце, это довольно сложно. Смотрите видео на ютубе, чтобы разобраться';
        // $data->save();

        // создать запись. Вариант 2
        // Массовое присвоение свойств
        // для разрешения массового присваивания необходимо добавить нужные поля в свойство fillable нужной модели
        // Post::create(['title'=>'Post20', 'text'=>'Text for Post20']);

        // Обновить запись, мы сначала получаем нужную запись
        // $post = Post::find(1);
        // $post->text = 'Содержимое статьи было изменено';
        // $post->save();
        // //Изменить сразу несколько значений
        // Post::where('id', '<', 3)->update(['created_at'=>NOW()]);

        //Удалить модель - delete / destroy
        //Если такой записи нет - в метод delete попадет NULL, что вызовет ошибку
        // $post = Post::find(16);
        // $post->delete();
        // Post::destroy(17);
        // dd(Post::all());

        //Получаем рубрику для поста в связи 1-1
        // $post = Post::find(1);
        // dd($post->rubric->title);

        //One-to-Many
        // $rubric = Rubric::find(2);
        // dd($rubric->posts);
        // $post = Post::find(1);
        // dd($post->rubric);

        //Ленивая загрузка (выполняется несколько sql-запросов, чтобы получить связанные данные)
        // $posts = Post::where('id', '>', 1)->get();
        //Жадная загрузка
        // $posts = Post::with('rubric')->where('id', '>', 1)->get();
        // foreach($posts as $post) {
        //     dump($post->title, $post->rubric->title);
        // }

        //Many-to-Many
        // $post = Post::find(4);
        // dump($post->title);
        // foreach($post->tags as $tag) {
        //     dump($tag->title);
        // }

        // $tag = Tag::find(2);
        // dump($tag->title);
        // foreach($tag->posts as $post) {
        //     dump($post->title);
        // }

        $title = 'Home page';

        return view('home', compact('title'));
    }

    public function test() {
        $title = 'Test page';
        return view('test', compact(['title']));
    }
}