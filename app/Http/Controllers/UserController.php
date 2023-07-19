<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create() {
        $title = 'Register Page';
        return view('user.create', compact('title'));
    }
    
    public function store(Request $request) {
        // Валидация полученных данных 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image'
        ]);

        if($request->hasFile('avatar')) {
            //Записываем в переменную текущую дату и в нее сохраняем изображение
            $folder = date('Y-m-d');
            //Сохраняем изображение, $avatar вернет путь
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }



        //Сохраняем информацию в БД
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null
        ]);

        $request->session()->flash('success', 'Successful registration');

        //Авторизовываем пользователя на сайте
        Auth::login($user);

                
        //перенаправляем на главную
        return redirect()->route('home');
    }

    public function loginForm() {
        $title = 'Login Page';
        return view('user.login', compact('title'));
    }

    public function login(Request $request) {
        // Валидация полученных данных 
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        //Если мы успешно авторизованы, делаем редирект на главную
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->home();
        }
        //Если нет - редирект на страницу авторизации, добавляем сообщение об ошибке
        return redirect()->route('login.form')->with('error', 'Неправильный логин или пароль');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
