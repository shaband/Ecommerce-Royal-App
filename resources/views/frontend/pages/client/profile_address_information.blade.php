@extends('frontend.template.app')





@section('page_title' , 'Client Profile Address Information')





@section('styles')

    

    <style>

        

        #validation_error_ol{



                border-top: 2px dashed;

                padding-top: 9px;

                margin-top: 10px;



        }



    </style>







    





@endsection







@section('content') 





 <div class="wrapper-content">

        <div class="container">

            <div class="row">

                <div class="col-md-12 header-top-bunner">

                    <img src="{{  asset("assets/frontend/img/account-bunner.png") }}" alt="">

                </div>

                <div class="clearfix"></div>

                <div class="col-12 text-center header-myaccount">

                    <h1>Address Book</h1>

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

                        <h3 class="title-dash">Add new address to your addresses</h3>

                        <div class="col-md-12">

                            



                            @if(Session::has('address_information_error'))

                                @if($errors->all())   

                                        <div class="alert alert-danger alert-dismissible"  id="password_change_div">

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





                             @if(Session::has('address_added'))

                                 

                                    <div class="alert alert-success alert-dismissible" >

                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <strong>Congrats !</strong> {!! Session::get('address_added') !!}

                                        

                                    </div>

                               

                            @endif





                            <div class="content-address-book">

                                <h2>Contact Information</h2>



                                {!! Form::open(['route'=>'client.add_address']) !!}



                                    <div class="row">



                                         <div class="col-md-12 col-sm-12">

                                            <label for="addressName">Address name <span>*</span></label>

                                            <input type="text" id="addressName" name="address_name" placeholder="give your address a name" class="form-control" value="{!! old('address_name') !!}">

                                        </div>





                                        <div class="col-md-6 col-sm-6">

                                            <label for="FirstName">First Name <span>*</span></label>

                                            <input type="text" id="FirstName" name="first_name" placeholder="first name" class="form-control" value="{!! old('first_name') !!}">

                                        </div>



                                       

                                        <div class="col-md-6 col-sm-6">

                                            <label for="LastName" id="LastName">Last Name <span>*</span></label>

                                            <input type="text" name="last_name" placeholder="last name" value="{!! old('last_name') !!}" class="form-control">

                                        </div>



                                     

                                        <div class="col-md-6 col-sm-6">

                                            <label>Telephone Code<span>*</span></label>

                                            <br> 

                                             @component('frontend.components.iso_countries_phone_codes_add_address')@endcomponent

                                        </div>

                                  



                                        <div class="col-md-6 col-sm-6">

                                            <label for="Telephone">Telephone<span>*</span></label>

                                            <input type="text" name="telephone" id="Telephone" placeholder="telephone number" class="form-control" value="{!! old('telephone') !!}" >

                                        </div>


 






                                    {{-- 
                                        <div class="col-md-6 col-sm-6">

                                            <label for="Fax">Fax </label>

                                            <input type="text" name="fax" id="Fax" value="{!! old('fax') !!}" placeholder="fax" class="form-control">

                                        </div> --}}




                                    </div>

                                    <h2>Address</h2>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="street">Street Addres<span>*</span></label>

                                            <input type="text" id="street" name="street_one" class="form-control" placeholder="street address one" value="{!! old('street_one') !!}">

                                        </div>

                                        <div class="col-md-12">

                                            <input type="text" class="form-control" name="street_two" placeholder="street address two">

                                        </div>

                                    </div>

                                   

                                    <div class="row">

                                       
                                        <div class="col-md-6 col-sm-6">

                                            <label for="city" class="color-city">City<span>*</span></label>

                                            <input type="text" class="form-control" id="city" name="city" value="{!! old('city') !!}">

                                        </div>

                                      

                                        <div class="col-md-6 col-sm-6">

                                            <label for="city" class="color-city">State<span>*</span></label>

                                            <input type="text" class="form-control" id="state" name="state" value="{!! old('state') !!}">

                                        </div>

                                    </div>

                                    <div class="row">

                                    <div class="col-md-6 col-sm-6">

                                            <label class="color-city" for="country">Country<span>*</span></label>

                                            

                                                {{-- @component('frontend.components.countries')@endcomponent --}}
                                                @component('frontend.components.iso_countries_add_address')@endcomponent

                                            
                                    </div> 


                                    <div class="col-md-6 col-sm-6">

                                            <label class="color-city" >Postal Code<span>*</span></label>

                                            <input type="text" class="form-control" name="postal_code" value="{!! old('postal_code') !!}">

                                    </div>


                                    </div>






                                    <div class="row">

                                        <div class="col-md-12">

                                           

                                            <input type="submit" class="pull-right btn btn-info save" value="Add address" >

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>





                                {!! Form::close() !!}

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



    

   {{--  <script>

        $(document).ready(function() {

            $("#country").msDropdown();

        });

    </script> --}}



@endsection 