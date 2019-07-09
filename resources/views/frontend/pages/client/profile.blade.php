@extends('frontend.template.app')





@section('page_title' , 'Client Dashboard')





@section('content') 





	

	 <div class="wrapper-content">

        <div class="container">

            <div class="row">

                <div class="col-md-12 header-top-bunner">

                    <img src="{{  asset("assets/frontend/img/account-bunner.png") }}" alt="client profile image header">

                </div>

                <div class="clearfix"></div>

                <div class="col-12 text-center header-myaccount">

                    <h1>Dashboard</h1>

                </div>

                <div class="col-md-12 myaccount-content">

                    <div class="col-lg-3 col-md-4 col-sm-4 sidebar">

                        <div class="card">

                            

                            

                           @component('frontend.components.profile_image') @endcomponent

                           

                        </div>

                        <p class="myaccount">Welcome  ,  {{  Auth::guard('client')->user()->name }}</p>

                        <div class="card card-information">

                            <ul class="list-group list-group-flush">

                               @component('frontend.components.client_sidebar')@endcomponent

                            </ul>

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-8 content">

                       		   

                       		  



                       		     

                        <h3 class="title-dash">My Dashboard</h3>

                        <div class="col-12 notice-dash">

                            <p>

                                Your dashboard helps you manage your account information , follow up with orders see you desired wish list products  as well as adding you prefered addresses  , your dashboard works as a little helper machine that gives you accessibility and management to you information 

                            </p>

                        </div>







                        @if(Session::has('account_created'))

                             

                                <div class="alert alert-success alert-dismissible" >

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <i class="fa fa-smile-o fa-1x" aria-hidden="true"></i>

                                    <strong>Congrats !</strong> {!! Session::get('account_created') !!}

                                    

                                </div>

                           

                        @endif









                        <h4 class="title-2-dash">Account Information</h4>

                        <div class="row">







                            <!-- Account information  tab  --> 

                            <div class="col-md-12 col-sm-12">

                                <div class="card">

                                    <div class="card-header">

                                        <span class="text-left">Contact Information</span>

                                        <a href="{{  route('client.profile_info')  }}" class="text-right">Edit</a>

                                    </div>





                                    <div class="card-body col-md-6">

                                        <p class="card-text">Name : {!! Auth::guard('client')->user()->name !!}</p>

                                        <p class="card-text">Email : {!! Auth::guard('client')->user()->email !!} </p>

                                        <p class="card-text">Account status : <code>{!! Auth::guard('client')->user()->is_active == 1 ? 'active' : 'not active' !!}</code> </p>

                                         

                                    </div>





                                    <div class="card-body col-md-6">

                                        <p class="card-text">Bio : {!! Auth::guard('client')->user()->accountInformation->short_description !!}</p>

                                        

                                    </div>





                                </div>

                            </div>





                            <div class="col-md-12 col-sm-12">

                                <div class="card">

                                    <div class="card-header">

                                        <span class="text-left">Contact Information</span>

                                        {{-- <a href="#" class="text-right">Edit</a> --}}

                                    </div>

                                    <div class="row contact-bottom">

                                        @if(count(Auth::guard('client')->user()->accountAddresses))

                                        @foreach(Auth::guard('client')->user()->accountAddresses as $address)

                                            <div class="col-md-6 col-sm-12">

                                                 <a href="{!! route("client.edit_address" , $address->id) !!}" class="pull-right text-right" style="padding: 10px;">Edit</a>

                                                <div class="card-body">

                                                    <h4 class="card-title">Address</h4>

                                                    <p class="card-text">{{  $address->address_name }}</p> 





                                                    <h4 class="card-title">first name</h4>

                                                    <p class="card-text">{{  $address->first_name }}</p>





                                                    <h4 class="card-title">last name</h4>

                                                    <p class="card-text">{{  $address->last_name }}</p>





                                                    <h4 class="card-title">Telephone</h4>

                                                    <p class="card-text">{{  $address->telephone_code }} - {{  $address->telephone }}</p>





                                                    <h4 class="card-title">Street info</h4>

                                                    <p class="card-text">{{  $address->street_one }}</p>





                                                     <h4 class="card-title">City</h4>

                                                    <p class="card-text">{{  $address->city }} </p>







                                                    <h4 class="card-title">Country</h4>

                                                    <p class="card-text">{{  $address->country }}</p>

                                                    

                                                </div>

                                            </div>



                                        @endforeach



                                        @else



                                        <div class="col-md-6 col-sm-12">

                                            <div class="card-body">

                                                

                                                <p class="card-text">No addresses added till now</p>

                                               

                                            </div>

                                        </div>



                                        @endif

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



@section('scripts')
    
    
    <script>

    @if(Session::has('address_updated'))



                    new PNotify({

                        title: 'Address Notification',

                        text: '{!! Session::get('address_updated') !!}',

                        icon: 'fa fa-bell-o fa-2x'

                    });





                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

                    sound.loop = false;

                    sound.play(); 


    @endif


    </script>


@endsection 