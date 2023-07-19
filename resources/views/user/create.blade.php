@extends('layouts.layout')


@section('content')

<h1 class="mb-5">Зарегистрируйте нового пользователя</h1>

<form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <div class="mb-3">
      <label for="avatar" class="form-label">Your avatar</label>
      <input class="form-control" type="file" name="avatar" id="avatar">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection