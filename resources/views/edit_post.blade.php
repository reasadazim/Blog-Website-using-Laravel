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



                        {{-- Edit Post Form --}}
                        <form action="{{ route('update_post',$post_to_edit->id) }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input name="user_id" type="text" class="form-control" value="{{ Auth::user()->id }}" hidden>

                          <div class="form-group">
                            <label>Post Title</label>
                            <input name="post_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $post_to_edit->post_title }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Post description</label>
                            <textarea name="post_description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post_to_edit->post_description }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect2">Categories</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="category_id">
                              <option selected value="{{ $post_to_edit->category_id }}">{{ $post_to_edit->category_id }}</option>
                              @foreach ($cat_to_edit as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect2">Tags</label>
                            <select multiple="multiple" class="js-example-basic-multiple form-control" name="tag_id[]">

                              @php
                                $id = $post_to_edit->id;
                                $tags_to_edit = $post_to_edit->tag_id;
                                $tags_to_edit_list = unserialize($tags_to_edit);
                              @endphp
                              @foreach ($tags_to_edit_list as $tags_selected)
                                <option selected value="{{ $tags_selected}}">{{ $tags_selected }}</option>
                              @endforeach

                              @foreach ($tag_to_edit as $tag)
                                <option value="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <br>

                            @if ($post_to_edit->images->image)
                              <div class="">
                                Current Featured Image
                              </div>
                                <img id="myImg" class="card-img-top single" src="http://localhost/lara4/laravel/public/{{Storage::url($post_to_edit->images->image)}}" alt="">
                            @endif

                            <br><br><br>
                            <label for="exampleFormControlTextarea1">Featured Image</label>
                            <input type="number" name="image_id" value="{{ $post_to_edit->images->id }}" hidden>
                            <input type="file" name="featured_image" >
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        {{-- Multiple select option - Tag  --}}
                        <script type="text/javascript">
                        $(document).ready(function() {
                          $('.js-example-basic-multiple').select2();
                        });
                        // Show selected featured image
                        $(function () {
                            $(":file").change(function () {
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


                        {{-- END Edit Post Form --}}


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
