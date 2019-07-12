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
                    <div class="card-header">Welcome</div>

                    <div class="card-body">

{{-- BODY  --}}

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

{{-- END BODY  --}}

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
