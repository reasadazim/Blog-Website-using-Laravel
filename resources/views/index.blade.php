{{-- Adding master template --}}
@extends('layouts.master')
{{-- END Adding master template --}}

{{-- Adding content --}}
@section('content')



{{-- Header Slider --}}

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="{{ asset('images/h3.jpg') }}"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Jungfrau Mountain</h3>
        <p>Switzerland</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset('images/h2.jpg') }}"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">World's Largest Sea Beach</h3>
        <p>Cox's Bazar, Bangladesh</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset('images/h1.jpg') }}"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Machu Picchu</h3>
        <p>Andes Mountains, Peru</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<script type="text/javascript">
$('.carousel').carousel({
  interval: 2000
})
</script>

{{-- END Header Slider --}}



<br><br>



{{-- Posts --}}
<h3>Latest Posts</h3>
<hr>
  <div class="row post-cards">
    @foreach ($get_post as $post)
      <div class="col-md-3">
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
  {{-- END Pagination --}}

{{-- End Posts --}}




{{-- Featured posts --}}
<h4>Featured</h4>
<hr>
<div class="row">
@foreach ($reatured_posts as $post)
  <div class="col-md-6">
    <div class="card bg-dark text-white featured_image_card">
      <img class="card-img-top" src="http://localhost/lara4/laravel/public/{{Storage::url($post->images->image)}}" alt="Card image cap">
      <a class="featured" href="{{ route('post',  $post->id) }}">
        <div class="card-img-overlay">
          <h5 class="card-title">{{ $post->post_title }}</h5>
          <p class="card-text">{{ str_limit($post->post_description, $limit = 100, $end = '...') }}</p>
          <a href="{{ route('post',  $post->id) }}" class="badge badge-primary" style="margin-top:20px;padding:7px;margin-left:0;">Read More</a>
        </div>
      </a>
    </div>
  </div>
@endforeach
</div>
{{-- END Featured posts  --}}



{{-- CTA --}}
<div class="row cta_bg">
  <div class="col-md-6">

  </div>
  <div class="col-md-6">
    <br><br><br>
    <h5><strong>Subscribe us</strong></h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    <form>
      <div class="form-row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="col">
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- END CTA --}}


@endsection
{{-- END Adding content --}}
