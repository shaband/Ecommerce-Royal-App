@extends('frontend.template.app')


@section('page_title' , 'Client Dashboardd')


@section('content') 


	
	 <div class="wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header-top-bunner">
                    <img src="{{  asset("assets/frontend/img/account-bunner.png") }}" alt="client profile image header">
                </div>
                <div class="clearfix"></div>
                <div class="col-12 text-center header-myaccount">
                    <h1>MY Account</h1>
                </div>
                <div class="col-md-12 myaccount-content">
                    <div class="col-lg-3 col-md-4 col-sm-4 sidebar">
                        <div class="card">
                            <img class="card-img-top" src="{{  asset("assets/frontend/img/profile.jpg") }}" alt="client profile image">
                           {{--  <div class="card-body photo-profile">
                                <a class="card-title" href="#">click or drop <br> picture here</a>
                            </div> --}}
                        </div>
                        <p class="myaccount">Welcome  ,  {{  Auth::guard('client')->user()->name }}</p>
                        <div class="card card-information">
                            <ul class="list-group list-group-flush">
                               @component('frontend.components.client_sidebar')@endcomponent
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 content">
                       		   
                       		   @yield('content')

                       		     
         <h3 class="title-dash">My Dashboard</h3>
                        <div class="col-12 notice-dash">
                            <p>
                                Your dashboard helps you manage your account information , follow up with orders see you desired wish list products  as well as adding you prefered addresses  , your dashboard works as a little helper machine that gives you accessibility and management to you information 
                            </p>
                        </div>



                        <h4 class="title-2-dash">Account Information</h4>
                        <div class="row">



                            <!-- Account information  tab  --> 
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="text-left">Contact Information</span>
                                        <a href="#" class="text-right">Edit</a>
                                    </div>


                                    <div class="card-body col-md-6">
                                        <p class="card-text">Name : {!! Auth::guard('client')->user()->name !!}</p>
                                        <p class="card-text">Email : {!! Auth::guard('client')->user()->email !!} </p>
                                        <p class="card-text">Account status : <code>{!! Auth::guard('client')->user()->is_active == 1 ? 'active' : 'not active' !!}</code> </p>
                                         
                                    </div>


                                    <div class="card-body col-md-6">
                                        <p class="card-text">Name</p>
                                        <p class="card-text">Email@email.com</p>
                                        <a href="#" >Change Password</a>
                                    </div>


                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="text-left">Contact Information</span>
                                        <a href="#" class="text-right">Edit</a>
                                    </div>
                                    <div class="row contact-bottom">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card-body">
                                                <h4 class="card-title">Default Billing Address</h4>
                                                <p class="card-text">You have not set default billing address.</p>
                                                <a href="#" >Edit Address</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card-body">
                                                <h4 class="card-title">Default Billing Address</h4>
                                                <p class="card-text">You have not set default billing address.</p>
                                                <a href="#" >Edit Address</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



@endsection  