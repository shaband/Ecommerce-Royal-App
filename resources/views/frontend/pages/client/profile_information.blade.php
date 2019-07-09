@extends('frontend.template.app')





@section('page_title' , 'Client Profile Information')





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

                    <img src="{{  asset("assets/frontend/img/account-bunner.png") }}" alt="client profile image header">

                </div>

                <div class="clearfix"></div>

                <div class="col-12 text-center header-myaccount">

                    <h1> Account Information</h1>

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

                        <h3 class="title-dash">Update account info</h3>



                    @if(Session::has('account_updated'))



                        <div class="alert alert-success alert-dismissible">

                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <strong>Hoola</strong> , {!! Session::get('account_updated') !!}

                        </div>



                    @endif



                        <div class="col-md-12">

                            <div class="content-address-book">

                                <h2>Contact Information</h2>

                                

                                    {!! Form::model( $client , ['route'=>['client.profile_info_update' , $client->id ] ,'method'=>'POST' , 'files'=>true ]) !!}

                                        {!! method_field('put') !!}

                                    <div class="row">

                                        <div class="col-md-6 col-sm-6">

                                            <label for="FirstName">First Name <span>*</span></label>

                                            <input type="text" id="FirstName" name="first_name" value="{{  $client->accountInformation->first_name  }}" class="form-control">

                                        </div>

                                        <div class="col-md-6 col-sm-6">

                                            <label for="LastName" >Last Name <span>*</span></label>

                                            <input type="text" class="form-control" name="last_name" value="{{  $client->accountInformation->last_name  }}" id="LastName">

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="Email">Email Addres<span>*</span></label>

                                            <input type="text" id="Email" class="form-control" name="email" value="{{  $client->email }}">

                                        </div>

                                    </div>



                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Gender<span>*</span></label>

                                            <br>

                                            <label class="radio-inline">

                                                <input type="radio" value="male" name="gender" {!! $client->gender == 'male' ? 'checked':'' !!}>Male

                                            </label>

                                            <label class="radio-inline">

                                                <input type="radio" value="female" name="gender" {!! $client->gender == 'female' ? 'checked':'' !!}>Female

                                            </label>

                                            <br>

                                            <br>

                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Country Phone Code<span>*</span></label>

                                            <br> 

                                             @component('frontend.components.iso_countries_phone_codes')@endcomponent

                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Phone Number<span>*</span></label>

                                            <br>

                                                    <input type="text"  name="phone_number" value="{{  $client->accountInformation->phone_number  }}" class="form-control">
                                                 
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>City<span>*</span></label>

                                            <br>

                                                    <input type="text"  name="city" value="{{  $client->accountInformation->city  }}" class="form-control">
                                                 
                                        </div>

                                    </div> 



                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>State<span>*</span></label>

                                            <br>

                                                    <input type="text"  name="state" value="{{  $client->accountInformation->city  }}" class="form-control">
                                                 
                                        </div>

                                    </div>




                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Postal Code<span>*</span></label>

                                            <br>

                                                    <input type="text"  name="postal_code" value="{{  $client->accountInformation->postal_code  }}" class="form-control">
                                                 
                                        </div>

                                    </div>




                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Country<span>*</span></label>

                                            <br>

                                                @component('frontend.components.iso_countries')@endcomponent

                                            <br>

                                            <br>

                                        </div>

                                    </div>







 







                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="Email">Profile image<span>*</span></label>

                                                 <input  type="file" id="input-file-now" name="image"  class="dropify"  data-show-errors="true"  data-allowed-file-extensions="png jpg jpeg"/>

                                        </div>

                                    </div>



                                    <br>









                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="Email">Short Description<span>*</span></label>

                                           

                                            <textarea class="form-control" name="short_description"  cols="6" rows="6" placeholder="write anything about you">{!! $client->accountInformation->short_description !!}</textarea>

                                        </div>

                                    </div>









                                   



                                    <div class="row">

                                        <div class="col-md-12">

                                           

                                            <input type="submit" class="pull-right btn btn-info save" value="update" name="" id="">

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>









                                {!! Form::close() !!}

                            </div>





                            <br>

                            <br>





                        @if(Session::has('validation_error'))

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





                        @if(Session::has('password_updated'))

                             

                                    <div class="alert alert-success alert-dismissible"  id="password_change_div">

                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <strong>Congrats</strong> , {!! Session::get('password_updated') !!}

                                         

                                    </div>

                                    

                           

                        @endif





                             <div class="content-address-book">

                                <h2>Password Change</h2>





                                {!! Form::model($client , ['route'=>['client.update_password' , $client->id] , 'method'=>'POST']) !!}

                                    {!! method_field('put') !!}

                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="password">Password<span>*</span></label>

                                            <input type="password" id="password" name="password" class="form-control">

                                        </div>

                                    </div> 







                                    <div class="row">

                                        <div class="col-md-12">

                                            <label for="password_confirmation">Password confirmation<span>*</span></label>

                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

                                        </div>

                                    </div>



                                   

                                   



                                    <div class="row">

                                        <div class="col-md-12">

                                           

                                            <input type="submit" class="pull-right btn btn-info save" value="Update password">

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







    





    

    @if(Session::has('validation_error'))



    <script>

            

      $(document).ready(function() {

        $('html, body').hide();



        if (window.location.hash) {

            setTimeout(function() {

                $('html, body').scrollTop(0).show();

                $('html, body').animate({

                    scrollTop: $(window.location.hash).offset().top

                    }, 1000)

            }, 0);

        }

 

        

         

    });

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





@endsection