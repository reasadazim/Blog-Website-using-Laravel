@extends('layouts.master')

@section('content')

{{-- Blog Header --}}
<div class="page-header" style="background:url('{{asset('images/').'/heading2.jpg'}}');background-size: cover;background-attachment: fixed;background-position:bottom;">
  <div class="page-heading">
    <h1>Blog</h1>
  </div>
</div>
{{-- END Blog Header --}}



<div class="row">

<div class="col-md">
  {{-- Posts --}}
  <h3>Latest Posts</h3>
  <hr>
    <div class="row post-cards">
      @foreach ($get_post as $post)
        <div class="col-md-4">
          <div class="card" >
            @if ($post->images->image)
                <img class="card-img-top" src="http://localhost/lara4/laravel/public/{{Storage::url($post->images->image)}}" alt="Card image cap">
            @endif

            <div class="card-body">
              <h5 class="card-title" style="height:47px;">{{ str_limit($post->post_title, $limit = 30, $end = '...') }}</h5>
              <p class="post_meta"><small>By: {{ $post->users->name }}</small>  </p>
              <p class="post_meta" style="margin-top:-20px;"><small>Date: {{ $post->created_at->format('Y-m-d') }}</small> </p>
              <p class="card-text" style="height: 95px;">
                @php
                  echo html_entity_decode(str_limit($post->post_description, $limit = 98, $end = '...'));
                @endphp
              </p>
              <a href="{{ route('post',  $post->id) }}" class="badge badge-primary" style="padding:7px;margin-left:0;">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Pagination --}}
    <br>
    <center>{{ $get_post->links() }}</center>
    {{-- END Pagination --}}

  {{-- End Posts --}}
</div>









<div class="col-md-3">

  {{-- Sidebar --}}
  <div class="col-md">

      {{-- Recent Posts --}}
        <div class="recent-posts">
          <h4>Recent Posts</h4>
          <hr>

           @foreach ($recent_posts as $recent_post)
             <div class="row" style="margin-bottom:5px;">
                <div class="col-3">
                  <a href="{{ route('post', $recent_post->id) }}">
                  <img src="http://localhost/lara4/laravel/public/{{Storage::url($recent_post->images->image)}}" alt="" width="50px" height="50px">
                  </a>
                </div>
                <div class="col-9">
                  <h5 style="font-size: 15px;"><a href="{{ route('post', $recent_post->id) }}">{{ str_limit($recent_post->post_title, $limit = 15, $end = '...') }}</a></h5>
                  <small style="position:absolute; top:25px;">{{ $recent_post->updated_at->format('Y-m-d')}} at {{ $recent_post->updated_at->format('h:i A') }}</small>
                </div>
              </div>
           @endforeach

        </div>
      {{-- END Recent Posts --}}
      <br><br>
      {{-- Categories --}}
        <div class="recent-posts">
          <h4>Categories</h4>
          <hr>

          {{-- Getting all category values into an array as we need to print unique categories --}}
           @foreach ($recent_posts as $recent_post)
              @if ( strlen($recent_post->category_id)>2 )
                @php
                  $c[] = $recent_post->category_id;
                @endphp
              @endif
           @endforeach

           {{-- Removing duplicate category names --}}
           @php
            $c = array_unique($c);
           @endphp

           {{-- Print categories --}}
           @foreach ($c as $d)
             <a class="badge badge-info" href="{{ route('post_by_cat', $d) }}">{{ $d }}</a>
           @endforeach


        </div>
      {{-- END Recent Posts --}}
      <br><br>
      {{-- Advertise --}}
        <div class="recent-posts">
          <img class="sidebar-img-ad" src="http://localhost/lara4/laravel/public{{Storage::url('images/sidebar_ad.jpg')}}" alt="">
        </div>
      {{-- END Recent Posts --}}


  </div>
  {{-- END Sidebar --}}

</div>




</div>






@endsection
