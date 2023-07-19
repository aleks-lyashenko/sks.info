@extends('layouts.layout')

@section('content')
    <h1>Отправка электронной почты</h1>

    <form method="POST" action="{{route('send')}}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Мы не будем использовать ваш электронный адрес не по назначению.</div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" cols="15" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection