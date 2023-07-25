@extends('layouts.layout')

@section('content')

<h1>Обзор всех фото</h1>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($images as $image)

        <div class="col">
          <div class="card shadow-sm">
              <img src="{{asset("storage/$image->path")}}" alt="">
            <div class="card-body">
              <p class="card-text">{{$image->title}}</p>
              <div class="d-flex justify-content-between align-items-center">
{{--                <div class="btn-group">--}}
{{--                  <a href="posts/123">--}}
{{--                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
{{--                  </a>--}}
{{--                  <a href="">--}}
{{--                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
{{--                  </a>--}}

{{--                </div>--}}
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="col-md-12 my-3">
            {{$images->links()}}
        </div>

</div>

@endsection
