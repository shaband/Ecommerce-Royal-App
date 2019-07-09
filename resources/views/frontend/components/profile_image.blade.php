@if(Auth::guard('client')->user()->image == null)
    <img class="card-img-top" src="{{  asset("assets/frontend/img/profile.jpg") }}" alt="client profile image">
  
@else
    @php 
    $image = Auth::guard('client')->user()->image ; 
    @endphp
    <img class="card-img-top" src="{{  asset("uploads/profile/$image") }}" alt="client profile image">
@endif