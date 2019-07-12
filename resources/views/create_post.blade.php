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

                    {{-- Create Post Form --}}
                    <form action="{{ route('save_post') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input name="user_id" type="text" class="form-control" value="{{ Auth::user()->id }}" hidden>

                      <div class="form-group">
                        <label>Post Title</label>
                        <input name="post_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your post title here" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Post description</label>
                        <textarea name="post_description" class="form-control" id="exampleFormControlTextarea1" rows="3" required>Enter your post body here</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Categories</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="category_id" required>
                          @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Tags</label>
                        <select multiple="multiple" class="js-example-basic-multiple form-control" name="tag_id[]" required>
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Featured Image</label>
                        <img id="myImg" src="#" width="100%" />
                        <input type="file" name="featured_image" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                          {{-- Multiple select option - Tag  --}}
                          <script type="text/javascript">
                          $(document).ready(function() {
                            $('.js-example-basic-multiple').select2();
                            $('#myImg').hide();
                          });
                          // Show selected featured image
                          $(function () {
                              $(":file").change(function () {
                                $('#myImg').show();
                                  if (this.files && this.files[0]) {
                                      var reader = new FileReader();
                                      reader.onload = imageIsLoaded;
                                      reader.readAsDataURL(this.files[0]);
                                  }
                              });
                          });

                          function imageIsLoaded(e) {
                              $('#myImg').attr('src', e.target.result);
                          };
                          </script>
                          {{-- END Multiple select option - Tag  --}}


                    {{-- END Create Post Form --}}

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
