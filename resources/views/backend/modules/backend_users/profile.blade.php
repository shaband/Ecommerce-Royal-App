@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Backend User Profile')


@section('styles')

	
	<style>
		.prod_image {
		    max-width: 15%;
		    height: auto;
		}


		.user_profile_img{

			width: 108px;
    		height: 108px;
		}


		#validation_error_ol{

            border-top: 2px dashed;
            padding-top: 9px;
            margin-top: 10px;

        }


	</style>

@endsection


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-layers

			@endslot

			@slot('main_title')

				Backend User Profile

			@endslot

			@slot('main_short_note') 

				Showing your profile information

			@endslot


			@slot('route_name')
				User Profile
			@endslot


			@slot('route_path')
				{{  route('backend.profile' , $user->id)  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')
 
 
<div class="col-lg-12">
		<div class="cover-profile">
			<div class="profile-bg-img">
				<img class="profile-bg-img img-fluid" src="{!! asset("assets/backend/images/user-profile/bg-img1.jpg") !!}" alt="bg-img">
				<div class="card-block user-info">
					<div class="col-md-12">
						<div class="media-left">
							<a href="{!! is_null($user->image) == true ?   asset("user_placeholder.png")  :  asset("uploads/profile/$user->image") !!}" class="profile-image fresco ">
								<img class="user-img img-radius user_profile_img" src="{!! is_null($user->image) == true ?   asset("user_placeholder.png")  :  asset("uploads/profile/$user->image") !!}" alt="{!! $user->name !!}">
							</a>
						</div>
						<div class="media-body row">
							<div class="col-lg-12">
								<div class="user-title">
									<h2>{!! $user->name !!}</h2>
									<span class="text-white">{!! ucfirst($user->access_level) !!}</span>
								</div>
							</div>
							<div>
								<div class="pull-right cover-btn">
									
									{{-- <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Click here if you wish to update your profile information"><i class="fa fa-edit"></i>Edit profile</button> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		{{-- then after header and user image  --}} 

	{{-- 	<div class="card">
				<div class="card-header">
					<h5 class="card-header-text">About Me</h5>
					<button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
					<i class="icofont icofont-edit"></i>
					</button>
				</div>
				<div class="card-block">
				<div class="view-info">
				<div class="row">
				<div class="col-lg-12">
					<div class="general-info">
						<div class="row">
							<div class="col-lg-12 col-xl-12">
							
								<div class="table-responsive">
									<table class="table m-0">
										<tbody>
											<tr>
												<th scope="row">Full Name</th>
												<td>Josephine Villa</td>
											</tr>
											<tr>
												<th scope="row">Gender</th>
												<td>Female</td>
											</tr>
											<tr>
												<th scope="row">Birth Date</th>
												<td>October 25th, 1990</td>
											</tr>
											<tr>
												<th scope="row">Marital Status</th>
												<td>Single</td>
											</tr>
											<tr>
												<th scope="row">Location</th>
												<td>New York, USA</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div> --}}





</div>

<div class="col-lg-12">

		<div class="card">
				<div class="card-header">
					<h5 class="card-header-text">About Me</h5>
					<button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right" data-toggle="tooltip" data-placement="top" data-original-title="Click here if you wish to update your profile information">
					<i class="icofont icofont-edit"></i>
					</button>
				</div>
				<div class="card-block">
				<div class="view-info">
					<div class="row">
						<div class="col-lg-12">
							<div class="general-info">
								<div class="row">
									<div class="col-lg-12 col-xl-12">
									
										<div class="table-responsive">
											<table class="table m-0">
												<tbody>
													<tr>
														<th scope="row">Full Name</th>
														<td>{!! $user->name !!}</td>
													</tr>
													 
													<tr>
														<th scope="row">Access Level</th>
														<td>{!! ucfirst($user->access_level) !!}</td>
													</tr>
													<tr>
														<th scope="row">Email</th>
														<td>{!! $user->email !!}</td>
													</tr>
													<tr>
														<th scope="row">Account Status</th>
														<td>{!!  $user->is_active == 1 ?  '<span  class="label label-success">Active </span> ' : '<span  class="label label-danger"> Not Active </span> ' !!}</td>
													</tr>

													<tr>
														<th scope="row">Date Added</th>
														<td>{!! date("F j, Y h:i:s A" , strtotime($user->created_at)) !!}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div><!-- end view info -->




				<div class="edit-info" id="errors_dv">

					@if(Session::has('update_admin_profile_error'))
                        @if($errors->all())   
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Please wait</strong> , we found some errors
                                    <ol id="validation_error_ol">
                                    @foreach($errors->all() as $error)
                                        
                                        <li>{!! $error !!}</li>

                                    @endforeach
                                    </ol>
                                </div>
                        @endif
                    @endif




					<div class="row">
						<div class="col-lg-12">
							<div class="general-info">
							{!! Form::open(['route'=>['backend.updateProfile' , $user->id] , 'method'=>'POST' , 'files'=>true , 'id'=>'admin_form_profile' ]) !!}
								<div class="row">

									<div class="col-lg-6">



										<table class="table">
											<tbody>

												
												<tr>
													<td>
														<div class="input-group">
															<span class="input-group-addon"><i class="icofont icofont-user"></i></span>
															<input type="text" class="form-control" required=""  name="name" placeholder="Full Name" value="{!! $user->name  !!}">
														</div>
													</td>
												</tr>

												<tr>
													<td>
														<div class="input-group">
														<span class="input-group-addon"><i class="icofont icofont-email"></i></span>
														<input type="email" class="form-control" required="" name="email" placeholder="Email"  value="{!! $user->email  !!}" >
														</div>
													</td>
												</tr>


												<tr>
													<td>
														<div class="input-group">
														<span class="input-group-addon"><i class="icofont icofont-email"></i></span>
														<input type="password" class="form-control"   name="password" placeholder="Password" >
														</div>
													</td>
												</tr>

												  
											</tbody>
										</table>



									</div>

									<div class="col-lg-6">
										<table class="table">
											<tbody>
												<tr>
													<td>
														<div class="input-group">
															  <input  type="file" id="input-file-now" name="image"  class="dropify"  data-show-errors="true"  data-allowed-file-extensions="png jpg jpeg"/>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>

								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
									<a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
								</div>
							</div>


						</div>

					</div>
							{!! Form::close() !!}

				</div>




</div>


@endsection 



@section('scripts')
 
 	
 	 {{-- <script src="../files/assets/pages/user-profile.js"></script> --}}
 	 {!! Html::script("assets/backend/pages/user-profile.js") !!}


	@if(Session::has('admin_profile_updated')) 

		<script>
 			
 			    
	 		new PNotify({
			    title: 'Profile Update',
			    text: '{!! Session::get('admin_profile_updated') !!}',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif




	<script>
		


		 $(document).ready(function(){

	            $('.dropify').dropify({
	            tpl: {
	                wrap:            '<div class="dropify-wrapper"></div>',
	                loader:          '<div class="dropify-loader"></div>',
	                message:         '<div class="dropify-message"><span class="fa fa-upload" /> <p>Select Profile image</p></div>',
	                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
	                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
	                clearButton:     '<button type="button" class="dropify-clear">Remove</button>',
	                errorLine:       '<p class="dropify-error"></p>',
	                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
	            }, 

	             errorTimeout: 3e3,
	             errorsPosition: "overlay",
	             imgFileExtensions: ["png", "jpg", "jpeg"],
	             allowedFileExtensions: ["png", "jpg", "jpeg"],


	             messages: {
	                    
	                    error: "Ooops, something wrong appended."
	            },


	            error: {
	                    
	                    imageFormat: "The image format is not allowed only).",
	                  
	            },


	        });






        });


	</script>



	@if(Session::has('update_admin_profile_error'))


		<script>
			

			$('.view-info').hide();
            $('.edit-info').show();



		</script>


	@endif

 


  

 

@endsection
 
 