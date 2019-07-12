@extends('layouts.master')

@section('content')

  {{-- Contact Header --}}
<div class="page-header" style="background:url('{{asset('images/').'/heading3.jpg'}}');background-size: cover;background-attachment: fixed;background-position:bottom;">
    <div class="page-heading">
      <h1>Contact</h1>
    </div>
  </div>
  {{-- END Contact Header --}}

<div class="row">
  <div class="col-md-6">
    <h3>Send us a messasge</h3>
    <hr>
    @if ($errors->any())
      <div class="alert alert-danger">

              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach

      </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ route('contact') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Doe" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Your Message</label>
        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write your message here..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.7733946835024!2d90.40524831235285!3d23.77968179774643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1561927439272!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>

@endsection
