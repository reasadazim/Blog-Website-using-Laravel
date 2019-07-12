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
                    <div class="card-header">Create a new category</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif




        {{-- Create Tag Form --}}
        <form action="{{ route('save_cat') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
        <label>Category Name</label>
        <input name="category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category name">
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
        Categories
        </div>
        <ul class="list-group list-group-flush">

        @foreach ($categories as $category)
          <li class="list-group-item">{{ $category->category_name }} <span class="text-right"><span class="text-right"><a style="float:right;" class="badge badge-danger" href="{{ route('delete_cat', $category->id) }}"> Delete</a></span><a style="float:right;margin-right:10px;" class="badge badge-success" href="{{ route('edit_cat', $category->id) }}"> Edit</a></span></li>
        @endforeach
        </ul>
        </div>
      </div>
    </div>


@else
  redirect();
@endif
@endsection
