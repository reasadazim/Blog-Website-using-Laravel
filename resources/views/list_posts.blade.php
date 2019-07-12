@extends('layouts.app')

@section('content')
@if (Auth::check())
    <div class="row" style="margin:0 !important;">
      <div class="col">
@include('layouts.dashboard_sidebar')
      </div>
      <div class="col-6">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                {!! \Session::get('message') !!}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



@foreach ($list_posts as $post)
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <strong>{{ $post->post_title }}</strong>
        <div class="action-buttons">
          <a class="badge badge-success" href="{{ route('post',  $post->id) }}" target="_blank">View</a>
          <a class="badge badge-primary" href="{{ route('edit_post',  $post->id) }}">Edit</a>
          <a class="badge badge-danger" href="{{ route('delete_post',  $post->id) }}">Delete</a>
          {{-- <a href="{{ route('delete_post',  $post->id) }}" target="_blank">Delete</a> --}}
        </div>
    </li>
  </ul>

@endforeach


                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col">

      </div>
    </div>


@else
  redirect();
@endif
@endsection
