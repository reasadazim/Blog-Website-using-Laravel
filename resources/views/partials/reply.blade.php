@php
  $cid = $comment->id;
@endphp

@foreach ($single_post->comments as $comment)
  {{-- check if there is any children comment exists for parent comment id  --}}
  @if ($cid == $comment->parent_id)
    <div class="card" style="margin-bottom:20px;margin-top:20px;">
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

        {{-- Here it calls reply.blade.php file which checks for reply (grand children comment) of children comment --}}
        @include('partials.reply')
      </div>
    </div>
  @endif
@endforeach
