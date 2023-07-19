<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail1;

class ContactController extends Controller
{
    public function send(Request $request) {
        $title = 'Contact';

        if($request->method() === "POST") {
            $body = "<p><b>Имя: </b>{$request->input('name')}</p>";
            $body .= "<p><b>E-mail: </b>{$request->input('email')}</p>";
            $body .= "<p><b>Message: </b><br>". nl2br($request->input('message')) ."</p>";

            //Отправляем письмо
            Mail::to('a.lyashenko@komnd.ru')->send(new Mail1($body));
            $request->session()->flash('success', 'Сообщение отправлено');
            return redirect(route('send'));
        }

        return view('send', compact('title'));
    }
}
