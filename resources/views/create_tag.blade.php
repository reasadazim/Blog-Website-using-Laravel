@extends('layouts.app')

@section('content')
@if (Auth::check())
    <div class="row" style="margin:0 !important;">
      <div class="col">
@include('layouts.dashboard_sidebar')
      </div>
      <div class="col-6">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Create a new tag</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif




        {{-- Create Tag Form --}}
        <form action="{{ route('save_tag') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
        <label>Tag Name</label>
        <input name="tag_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tag name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        {{-- END Create Tag Form --}}
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                {!! \Session::get('message') !!}
            </div>
        @endif
        @if ($errors->any())
          <div class="alert alert-danger">

                  @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach

          </div>
        @endif
        <div class="card" style="width: 18rem;">
        <div class="card-header">
        Tags
        </div>
        <ul class="list-group list-group-flush">

        @foreach ($tags as $tag)
          <li class="list-group-item">{{ $tag->tag_name }}  <span class="text-right"><a style="float:right;" class="badge badge-danger" href="{{ route('delete_tag', $tag->id) }}"> Delete</a></span><span class="text-right"><a style="float:right; margin-right:10px;" class="badge badge-success" href="{{ route('edit_tag', $tag->id) }}"> Edit</a></span></li>
        @endforeach
        </ul>
        </div>
      </div>
    </div>


@else
  redirect();
@endif
@endsection
