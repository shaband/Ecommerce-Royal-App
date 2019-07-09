@extends('frontend.template.app')


@section('page_title' , 'Authentication area')

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
                    <img src="{{  asset("assets/frontend/img/account-bunner.png")  }}" alt="header image">
                </div>
            </div>


            <div class="row no-margin">
          
                <div class="col-md-12 login clearfix">
                    

                    <!-- registration part --> 


                    <div class="col-sm-6 col-xs-12 col-md-6 new-customer">
                        <h1>Authentication area</h1>
                        <h2>New Customers</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        <hr>
                       @if(Session::has('registration_errors'))
                        @if($errors->all())
          
                          <div class="alert alert-danger alert-dismissible ">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Registration errors , please fix them </strong>
                            <ol id="validation_error_ol">
                                @foreach($errors->all() as $error) 
                                 <li>{!! $error !!}</li>
                                @endforeach
                            </ol>
                          </div>
                         
                        @endif

                        @endif


                        <h2 class="register-title">Register</h2>
                     
                          {!! Form::open(['route'=>'client.register' , 'method'=>'POST'] ) !!}
                           

                            <label for="reg-first-name">First Name <span>*</span></label>
                            <input class="form-controll" type="text" id="reg-first-name" name="first_name" value="{!! old('first_name') !!}" placeholder="enter your first name">

                            <label for="reg-last-name">Last Name <span>*</span></label>
                            <input class="form-controll" type="text" id="reg-last-name" name="last_name" value="{!! old('last_name') !!}" placeholder="enter your last name">

                            <div class="form-group">
                              
                              <div class="alert alert-warning alert-dismissible text-center hide" id="auto_generate">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                                <i class="fa fa-smile-o fa-1x" aria-hidden="true"></i>
                                  Auto generated username  , you can change it also
                              </div>


                            <label for="reg-user-name">User name<span>*</span></label>
                            <input class="form-controll" type="text" id="reg-user-name" name="username" value="{!! old('username') !!}" placeholder="generated user name">
                              
                            </div>


                            <label for="reg-email">Email<span>*</span></label>
                            <input class="form-controll" type="text" id="reg-email" name="email" value="{!! old('email') !!}" placeholder="enter your email">


                            <div class="form-group">
                                
                                    <label>Gender<span>*</span></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" value="male" name="gender" checked>Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="female" name="gender" >Female
                                    </label>
                                    <br>
                                    <br>
                                 
                            </div>

                            <label for="reg-password">Password<span>*</span></label>
                            <input class="form-controll" type="password" id="reg-password" name="password" value="{!! old('password') !!}" placeholder="enter your password">


                            <input type="submit" name="" value="REGISTER" class="register-submit">

                        {!! Form::close() !!}
                    </div>

                     

                    <!-- login part -->
                    <div class="col-sm-6 col-xs-12 col-md-6 clearfix login-table">
                        <h2>Registered customers</h2>
                        <p>if you have account with us, please log in</p> 
                        
                        @if(Session::has('login_error'))
                         @if($errors->all())
          
                          <div class="alert alert-danger alert-dismissible ">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Login errors , please fix them </strong>
                            <ol id="validation_error_ol">
                                @foreach($errors->all() as $error) 
                                 <li>{!! $error !!}</li>
                                @endforeach
                            </ol>
                          </div>
                         
                        @endif
                        @endif

                        @if(Session::has('invalid_credentials'))
          
                          <div class="alert alert-danger alert-dismissible ">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                             {!! Session::get('invalid_credentials') !!}
                          </div>
                         
                        @endif

                        
                        {!! Form::open(['route'=>'post_client_login' , 'method'=>'POST']) !!}
                            <label for="email"><span>*</span> Email Address</label>
                            <input class="form-controll" type="text" id="email" name="email" value="{!! old('email') !!}" placeholder="enter ur email">
                            <label for="password"><span>*</span> Password</label>
                            <input class="form-controll" type="password" id="password" name="password" value="{!! old('password') !!}" placeholder="enter ur password">

                              <!-- forget password  link --> 
                             {{--  <hr>
                              <a href="#" title="" class="pull-left">Forgot Your Password?</a> --}}

                            <input type="submit" name="" value="login" class="pull-right">
                       
                        {!! Form::close() !!}
                    </div>

 
                </div>


            </div>

            <div class="row">
                <div class="col-md-12 header-top-bunner">
                    <img src="{{  asset("assets/frontend/img/content-bunner.jpg")  }}" alt="footer image">
                </div>
            </div>


        </div>
    </div>



@endsection 



@section('scripts')

  
  <script>
      
      $(document).ready(function(){

         var first_name ; 
         var last_name ; 
         var user_name ; 

         $("#reg-first-name").keyup(function () {
                                                  
            first_name = $(this).val();

            $('#reg-user-name').val(first_name + last_name ); 

            if(first_name.length > 0 ){


              $('#auto_generate').fadeIn('slow').removeClass('hide');

            }


        }).keyup();

         $("#reg-last-name").keyup( function () {

            last_name = $(this).val();

             $('#reg-user-name').val(first_name + last_name); 

        }).keyup();





          


        



      });


  </script>



@endsection
