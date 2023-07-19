@extends('layouts.layout')


@section('content')

<form class="mt-3" method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="row mb-3">
      <label for="title" class="col-sm-2 col-form-label">Имя статьи</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Имя" value="{{old('title')}}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="row mb-3">
      <label for="text" class="col-sm-2 col-form-label">Содержание</label>
      <div class="col-sm-10">
        <textarea rows="5" class="form-control" id="text" name="text" placeholder="Контент">{{old('text')}}</textarea>
      </div>
    </div>
    
    <div class="row mb-3">
        <label for="rubric_id" class="col-sm-2 col-form-label">Выбор рубрики</label>
        <div class="col-sm-10">
        <select class="form-select" name="rubric_id" id="rubric_id">
            <option>Выберите рубрику</option>
            @foreach ($rubrics as $k => $v)
            <option value="{{$k}}" 
                @if (old('rubric_id') == $k) selected @endif   
            >{{$v}}</option>
            @endforeach
        </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
@endsection
