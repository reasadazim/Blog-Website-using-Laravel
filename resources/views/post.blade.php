@extends('layouts.master')
@section('content')
@if (\Session::has('message'))
    <div class="alert alert-success">
        {!! \Session::get('message') !!}
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-danger">
        {!! \Session::get('warning') !!}
    </div>
@endif


<div class="row">
  {{-- Single post --}}
  <div class="col-md-9">
    <div class="row post-cards">
          <div id="single-post-body" class="card">
            @if ($single_post->images->image)
                <img class="card-img-top single" src="http://localhost/lara4/laravel/public/{{Storage::url($single_post->images->image)}}" alt="">
            @endif

            <div class="card-body">
              <h5 class="card-title"><strong>{{ $single_post->post_title }}</strong></h5>
              <p class="post_meta"><small>By: {{ $single_post->users->name }}</small>  </p>
              <p class="post_meta" style="margin-top:-20px;"><small>Date: {{ $single_post->created_at->format('Y-m-d') }}</small> </p>
              <p class="post_meta" style="margin-top:-20px;"><small>Time: {{ $single_post->created_at->format('H:i A' ) }}</small> </p>
              <p class="card-text">
                @php
                  echo html_entity_decode($single_post->post_description);
                @endphp
              </p>
              <br>
              <p>Category:
                <a href="{{ route('post_by_cat',$single_post->category_id)}}">
                  <span class="badge badge-success">
                    {{ $single_post->category_id }}
                  </span>
                </a>
              </p>

              @php
                $id = $single_post->id;
                $tags = $single_post->tag_id;
                $tags = unserialize($tags);
              @endphp

              <div class="tag-container">Tags:
                @foreach ($tags as $tag)
                  @foreach ($tags_list as $existing_tag)
                    @if ($existing_tag->tag_name == $tag)
                      <a href="{{ route('post_by_tag',$tag)}}">
                        <div class="badge badge-primary">
                            {{ $tag }}
                        </div>
                      </a>
                    @endif
                  @endforeach
                @endforeach
              </div>
              {{-- Share button --}}
                <div class="sharethis-inline-share-buttons"></div>
              {{-- END Share button --}}
            </div>
          </div>
    </div>

  {{-- Comment Form --}}
  @guest
  @else
    <form action="{{ route('save_comment', $single_post->id) }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group" id="single-post-body">
        <label for="exampleFormControlTextarea1">Your Comment</label>
        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comment"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
  <br>
  @endguest

  {{--END - Comment Form --}}

  {{-- Display Comments --}}



{{-- Do not show COMMENTS heading unless there is comment in the post --}}
  @php
    $ce = 0;
  @endphp
  @foreach ($single_post->comments as $comment)
    @php
      $ce = $comment->id;
    @endphp
  @endforeach

  @if ($ce!=0)
    <h4 id="single-post-body">Comments<hr></h4>
  @endif
{{-- END Do not show COMMENTS heading unless there is comment in the post --}}



  @foreach ($single_post->comments as $comment)
  {{-- Check if the comment has no parent id thus it is a Parent Comment--}}

        @if (($comment->parent_id)==Null)
          <div id="single-post-body" class="card" style="margin-bottom:20px;margin-top:20px;">
            <div class="card-header">
              <div class="row">
                <div class="col text-left"><i class="fa fa-user-circle"></i><strong> {{ $comment->users->name }}</strong> says</div>
                <div class="col text-right"><small>{{ $comment->created_at->format('Y-m-d') }} at {{ $comment->created_at->format('h:i A') }}</small></div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $comment->body }}</p>

              @guest
                {{-- If user is a visitor --}}
              @else
                {{-- If user is a registered user --}}
                <div id="open-reply-{{ $comment->id }}" class="btn btn-primary reply">Reply</div>
                @if ($comment->user_id == Auth::user()->id)
                    {{-- If the comment/reply created by the user then show delete button --}}
                  <a class="btn btn-danger" href="{{ route('delete_comment', $comment->id) }}">Delete</a>
                @endif

              @endguest

              {{-- Reply form --}}
              <div id="rep-{{ $comment->id }}"></div>

              <script type="text/javascript">
              // Open reply form only for any reply
              $( document ).ready(function() {
                var form = '<form class="reply_form" id="reply-{{ $comment->id }}" action="{{ route('save_reply', $single_post->id) }}" method="POST"> {{ csrf_field() }}<div class="form-group"> <input name="reply" type="text" name="" value="{{ $comment->id }}" hidden> <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Reply"></textarea></div> <button type="submit" class="btn btn-primary">Submit</button></form>';

                $( "div#open-reply-{{ $comment->id }}" ).click(function() {
                    $("div#rep-{{ $comment->id }}").append(form); //append reply form
                    $('div#rep-{{ $comment->id }}').removeAttr('id'); //delete reply form appen id
                });
              });
              </script>

              {{-- END Reply form --}}

            {{-- Here it calls reply.blade.php file which checks for reply (child comment) of parent comment --}}
              @include('partials.reply')

            </div>
          </div>
        @endif

  @endforeach
  {{-- END Display Comments --}}
  </div>
  {{--END Single post --}}

  {{-- Sidebar --}}
  <div class="col-md-3">

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
                  {{-- <h5 style="font-size: 14px;"><a href="{{ route('post', $recent_post->id) }}">{{ $recent_post->post_title }}</a></h5> --}}
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
              @if ( strlen($recent_post->category_id)>0 )
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

@endsection
