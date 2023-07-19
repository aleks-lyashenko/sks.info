<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Проверяем права пользователя на доступ к админской части сайта
        if(Auth::check() && Auth::user()->isAdmin) {
            //если пользователь админ - передаем управление дальше
            return $next($request);
        }
        //Если админских прав нет можно редиректить на стр авторизации либо вернуть ошибку 404
        // return redirect()->route('login.form');
        abort('404');

    }
}
