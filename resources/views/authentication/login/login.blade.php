@extends('authentication..login.layout.login_layout')


@section('styles')


@endsection


@section('content')

	 
	   {!! Form::open(['url'=>'authentication/login' , 'method'=>'POST']) !!}
	
		<!-- our svg must be included here  --> 
		@include('authentication.login.partials.svg')

			<div class="inputGroup inputGroup1">
				<label for="email1">Email</label>
				<input type="text" id="email" name="email" class="email" maxlength="256"/>
				<p class="helper helper1">email@domain.com</p>

			</div>

			@if($errors->has('email'))
					
				<div class="alert alert-danger alert-dismissible text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
					 {!! $errors->first('email') !!}
				</div>
			 
			@endif
			<div class="inputGroup inputGroup2">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="password" />
				
			</div>

			
			@if($errors->has('password'))
		
				<div class="alert alert-danger alert-dismissible text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
					{!! $errors->first('password') !!}
				</div>
				 

			@endif


			<div class="inputGroup inputGroup3">
				<button id="login">Log in</button>
			</div>	


	  {!! Form::close() !!}

@endsection 


@section('scripts')


@endsection

