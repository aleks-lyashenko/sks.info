@extends('layouts.layout')


@section('content')

<h1 class="mb-5">Войдите в систему</h1>

<form method="POST" action="{{route('login')}}">
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection