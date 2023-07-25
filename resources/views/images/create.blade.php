@extends('layouts/layout')

@section('content')

<h1>Добавьте новое фото в коллекцию</h1>

<form method="POST" action="{{route('images.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
      <label for="path" class="form-label">Your image</label>
      <input class="form-control" type="file" name="path" id="path">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
