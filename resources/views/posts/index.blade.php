@extends('layouts.layout')

@section('header')
@parent
@endsection

@section('content')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$h1}}</h1>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($posts as $post)
            
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$post->title}}</text></svg>
            <div class="card-body">
              <p class="card-text">{{mb_strimwidth($post->text, 0, 120, '...')}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route("posts.$id", ['post'=>$id])}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </a>
                  <a href="">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </a>
                  
                </div>
                <small class="text-body-secondary">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y')}}</small>
                <small class="text-body-secondary">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-12 my-3">
        {{$posts->appends(['test' => request()->test])->links()}}
      </div>
    </div>
  </div>

@endsection