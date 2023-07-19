@extends('layouts.layout')

@section('content')
    <h1>Домашняя страница</h1>
    @if (!auth()->check())
        <p>
            Чтобы воспользоваться нашим сайтом - зарегистрируйтесь или войдите в свой аккаунт
        </p>
    @endif
@endsection