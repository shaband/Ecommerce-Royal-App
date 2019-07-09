<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page_title')</title>

        <meta name="description" content="{!! $general_settings_shared->seo_description !!}">

        <meta name="keywords" content="{!! $general_settings_shared->seo_keywords !!}">

        <meta name="viewport" content="width=device-width, initial-scale=1">



        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- Latest compiled and minified CSS -->

            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

            {{ Html::style("assets/frontend/css/slick.css")}}

            {{ Html::style("assets/frontend/css/slick-theme.css")}} 

            {{ Html::style("assets/frontend/css/normalize.css")}} 

            {{ Html::style("assets/frontend/css/bootstrap.css")}} 

            {{ Html::style("assets/frontend/css/font-awesome.css")}} 


            {!! Html::style('assets/backend/bower_components/lightbox2/css/lightbox.min.css') !!} 



            {{ Html::style("assets/countries/css/msdropdown/dd.css")}}

            {{ Html::style("assets/countries/css/msdropdown/flags.css")}}





            {{ Html::style('assets/backend/bower_components/pnotify/css/pnotify.css') }} 

            {{ Html::style('assets/backend/bower_components/pnotify/css/pnotify.brighttheme.css') }} 

            {{ Html::style('assets/backend/bower_components/pnotify/css/pnotify.buttons.css') }} 

            {{ Html::style('assets/backend/bower_components/pnotify/css/pnotify.history.css') }} 

            {{ Html::style('assets/backend/bower_components/pnotify/css/pnotify.mobile.css') }} 

            {{ Html::style('assets/backend/pages/pnotify/notify.css') }}





            <!-- fresco css --> 

            {!! Html::style('assets/frontend/css/fresco/fresco.css') !!}





            

            {{ Html::style("assets/frontend/css/main.css")}} 

            {{ Html::style("assets/frontend/css/account.css")}}

 

            

            

             {{ Html::style('assets/backend/bower_components/dropify/dist/css/dropify.min.css') }}





            {{ Html::script("assets/frontend/js/vendor/modernizr-2.6.2.min.js")}} 

           



             

           



            @yield('styles')





    </head>

    <body>

        <!--[if lt IE 7]>

            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

        <![endif]-->



        <!-- Add your site or application content here -->

        

        <div id="wrapper">







            <div class="header">





                <div class="top-header">

                    <div class="container">

                        <div class="header-support-link pull-right">

                            <p>Contact & Support : <span> {!! $general_settings_shared->header_phone !!}</span></p>

                            <a href="mailto:{!! $general_settings_shared->header_email !!}">{!! $general_settings_shared->header_email !!}</a>

                        </div> <!-- End header support link -->

                    </div><!-- End container -->

                </div><!-- End Top Header -->







                <div class="main-header">

                    <div class="container">

                        <div class="row">

                            <div class="col-md-2 col-sm-2 logo">

                                <h1> 

                                    <a href="{{  route('home_page')  }}"><img src="{{  asset('assets/frontend/img/logo.png') }}" alt=""></a>

                                </h1>

                            </div><!-- End col-md-2 -->

                            <div class="col-md-7 col-sm-10">

                                <div class="search-bar-header">

                                 

                                        {!! Form::open(['route'=>'search' , 'method'=>'GET']) !!}

                                        <span class="catigories">

                                            <select name="category_id" >

                                                {{-- <option value="0">All Categories</option> --}}

                                                @foreach($categories_shared as $category)

                                                    <option value="{{  $category->id }}">{{ ucfirst($category->title) }}</option>

                                                @endforeach

                                                

                                            </select>

                                            <i class="fa fa-sort-desc"></i> 

                                        </span>

                                        <input class="search-input" type="text" name="query"   placeholder="Search our webbsite ...">

                                        <span class="submit pull-right">

                                            <i class="fa fa-search" aria-hidden="true"></i> 
                                            <input type="submit" value="">


                                        </span>

                                        
                                        {!! Form::close() !!}
                                    
                                </div><!-- End search-bar-header -->

                            </div><!-- End col-md-6 -->

                            <div class="col-md-3 col-sm-10">

                                <div class="header-accounts">





                                @if(Auth::guard('client')->check())

                                    <a href="{{  route('client.profile') }}" title="">

                                        <i class="fa fa-user"></i>

                                        <br>

                                        My Account

                                        <span class="border-right"></span>

                                    </a>

                                         

                                    <a href="{{  route('client.profile_logout') }}" title="">

                                        <i  class="fa fa-sign-out" style="margin: 0 0 6px 12px;font-size: 18px;"></i>

                                        <br>

                                       Logout

                                        <span class="border-right"></span>

                                    </a>



                                @else



                                    <a href="{{ route('get_client_login') }}" title="">

                                        <i class="fa fa-lock"></i>

                                        <br>

                                        login

                                    </a>



                                @endif





                                    @component('frontend.components.cart_component')@endcomponent



                                </div> <!-- End header-accounts -->

                            </div><!-- End col-md-4 -->

                        </div><!-- End row -->

                    </div><!-- End container -->

                </div><!-- End main-header -->







                <div class="menu">

                    <div class="container">

                       <div class="row">

                            <div class="col-md-3 col-sm-4 col-xs-7 menu-left">

                                <button class="shop-everything">

                                    Shop Everything 

                                    <i class="fa fa-chevron-down"></i>

                                    <ul class="dropdown-menu-shop">

                                    {{-- <li><a href="#">All</a></li> --}}

                                     @foreach($categories_shared as $category)

                                         <li><a href="{!! $loop->iteration == 1 ? route('subscriptions_page'):route('devices_page') !!}" data-category-id="{{  $category->id }}">{{ ucfirst($category->title) }}</a></li>

                                     @endforeach

                                   

                                </ul>

                                </button>

                                

                            </div>

                            <div class="col-md-9 col-sm-8 col-xs-5">

                                <span id="navbar-menu"><i class="fa fa-bars" aria-hidden="true"></i></span>

                                <ul class="menu-header clearfix">

                                    <li><a href="{{  route("home_page")  }}" title="view home page" class="{!! Route::current()->getName() == 'home_page' ? 'active':'' !!}">Home</a></li>

                                    <li><a href="{!! route('devices_page') !!}" class="{!! Route::current()->getName() == 'devices_page' ? 'active':'' !!}">Devices</a></li>

                                    <li><a href="{!! route('subscriptions_page') !!}" class="{!! Route::current()->getName() == 'subscriptions_page' ? 'active':'' !!}">Subscriptions</a></li>

                                    <li><a href="{{ route('contact_page') }}"  class="{!! Route::current()->getName() == 'contact_page' ? 'active':'' !!}" >contact us</a></li>

                                    {{-- <li><a href="#" title="">faq</a></li> --}}

                                </ul>

                            </div>

                        </div><!-- End row -->

                    </div><!-- End container -->

                </div><!-- End menu -->







                <div class="bunner-header">

                    <div class="container">

                        <div class="row">

                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <div class="banner-content pull-right">

                                    <i class="fa fa-plane"></i>

                                    <h2>FREE SHIPPING</h2>

                                    <p>In Order Min $200</p>

                                </div>

                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <div class="banner-content pull-right">

                                    <i class="fa fa-clock-o"></i>

                                    <h2>30-DAYS RETURNS</h2>

                                    <p>Money Back  Guarantee</p>

                                </div>

                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <div class="banner-content pull-right">

                                    <i class="fa fa-life-ring"></i>

                                    <h2>24/7 SUPPORT</h2>

                                    <p>Lifestyme Support</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- End bunner-header -->





            </div><!-- End header -->