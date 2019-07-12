@component('mail::message')
#You have got a new message from a visitor!

<strong>Name: </strong>{{ $data['name'] }}  <br>
<strong>Email: </strong>{{ $data['email'] }} <br>
<strong>Message: </strong>{{ $data['message'] }}

@endcomponent
