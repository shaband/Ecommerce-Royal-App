@extends('frontend.template.app')





@section('page_title' , 'Update Client Profile Address Information')





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

                    <h1>Edit Address</h1>

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

                        <h3 class="title-dash">Edit current Address <code> {!! $address->address_name !!} </code> </h3>

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

 

                            <div class="content-address-book">

                                <h2>Contact Information</h2>



                                {!! Form::model( $address ,  ['route'=>['client.update_address'  , $address->id] , 'method'=>'POST']) !!}

                                    {!! method_field('PUT') !!}

                                    <div class="row">



                                         <div class="col-md-12 col-sm-12">

                                            <label for="addressName">Address name <span>*</span></label>

                                            <input type="text" id="addressName" name="address_name" placeholder="give your address a name" class="form-control" value="{!! $address->address_name !!}">

                                        </div>





                                        <div class="col-md-6 col-sm-6">

                                            <label for="FirstName">First Name <span>*</span></label>

                                            <input type="text" id="FirstName" name="first_name" placeholder="first name" class="form-control" value="{!! $address->first_name !!}">

                                        </div>



                                       

                                        <div class="col-md-6 col-sm-6">

                                            <label for="LastName" id="LastName">Last Name <span>*</span></label>

                                            <input type="text" name="last_name" placeholder="last name" value="{!! $address->last_name !!}" class="form-control">

                                        </div>


                                        {{-- <div class="col-md-6 col-sm-6">

                                            <label for="Telephone_code">Telephone Code<span>*</span></label>

                                            <input type="text" name="telephone_code" id="Telephone_code" placeholder="telephone international code number" class="form-control" value="{!! $address->telephone_code !!}">

                                        </div>
                                        --}}


                                        <div class="col-md-6 col-sm-6">

                                            <label>Telephone Code<span>*</span></label>

                                            <br> 

                                             @component('frontend.components.iso_countries_phone_codes_add_address')@endcomponent

                                        </div>



                                        <div class="col-md-6 col-sm-6">

                                            <label for="Telephone">Telephone<span>*</span></label>

                                            <input type="text" name="telephone" id="Telephone" placeholder="telephone number" class="form-control" value="{!! $address->telephone !!}" >

                                        </div>



                                       





                                       {{--  <div class="col-md-6 col-sm-6">

                                            <label for="Fax">Fax </label>

                                            <input type="text" name="fax" id="Fax" value="{!! $address->fax !!}" placeholder="fax" class="form-control">

                                        </div> --}}

                                    </div>

                                    <h2>Address</h2>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="street">Street Addres<span>*</span></label>

                                            <input type="text" id="street" name="street_one" class="form-control" value="{!! $address->street_one !!}">

                                        </div>

                                        <div class="col-md-12">

                                            <input type="text" class="form-control" name="street_two" value="{!! $address->street_two !!}">

                                        </div>

                                    </div>

                                   

                                    <div class="row">



                                        <div class="col-md-6 col-sm-6">

                                            <label for="city" class="color-city">City<span>*</span></label>

                                            <input type="text" class="form-control" id="city" name="city" value="{!! $address->city !!}">

                                        </div>


                                          <div class="col-md-6 col-sm-6">

                                            <label for="city" class="color-city">State<span>*</span></label>

                                            <input type="text" class="form-control"  name="state" value="{!! $address->state !!}">

                                        </div>

 
                                      

                                    </div>

                                    <div class="row">

                                    <div class="col-md-6 col-sm-6">

                                            <label class="color-city" for="country">Country<span>*</span></label>

                                             @component('frontend.components.iso_countries_update_address' , ['address'=>$address])

                                               

                                             @endcomponent

                                    </div>


                                     <div class="col-md-6 col-sm-6">

                                            <label for="city" class="color-city">Postal Code<span>*</span></label>

                                            <input type="text" class="form-control" name="postal_code" value="{!! $address->postal_code !!}">

                                   </div>

                                   </div>



                                    <div class="row">

                                        <div class="col-md-12">

                                           

                                            <input type="submit" class="pull-right btn btn-info save" value="Update address" >

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



    

    <script>

        $(document).ready(function() {

            $("#country").msDropdown();

        });

    </script>



@endsection 