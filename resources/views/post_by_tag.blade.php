@extends('layouts.master')
@section('content')


<h4>Posts by tag</h4>
<hr>


@php
  $ce = 0;
@endphp
@foreach ($post_by_tag as $post)
  @php
    $ce = $post->id;
  @endphp
@endforeach

@if ($ce==0)
  <p id="single-post-body">No result found!</p>
@endif



<div class="row post-cards">
  @foreach ($post_by_tag as $post)
      <div class="col-md-3">
          <div class="card" style="width: 100%;">
            <img class="card-img-top" src="http://localhost/lara4/laravel/public/{{Storage::url($post->images->image)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="height:47px;">{{ str_limit($post->post_title, $limit = 30, $end = '...') }}</h5>
              <p class="post_meta"><small>By: {{ $post->users->name }}</small>  </p>
              <p class="post_meta" style="margin-top:-20px;"><small>Date: {{ $post->created_at->format('Y-m-d') }}</small> </p>
              <p class="card-text">
                @php
                  echo html_entity_decode(str_limit($post->post_description, $limit = 98, $end = '...'));
                @endphp
              </p>
              <a class="badge badge-primary" href="{{ route('post',  $post->id) }}" class="btn btn-primary" style="padding:7px;margin-left:0;">Read More</a>
            </div>
          </div>
      </div>
  @endforeach
</div>
@endsection
