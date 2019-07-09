



            <div class="bunner-footer">

                <div class="bunner-footer">

                    <div class="container">

                        <div class="row">

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <div class="bunner-footer-content">

                                    <i class="fa fa-plane"></i>

                                    <h2>FREE SHIPPING</h2>

                                    <p>In Order Min $200</p>

                                </div>

                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <div class="bunner-footer-content">

                                    <i class="fa fa-clock-o"></i>

                                    <h2>30-DAYS RETURNS</h2>

                                    <p>Money Back  Guarantee</p>

                                </div>

                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <div class="bunner-footer-content">

                                    <i class="fa fa-life-ring"></i>

                                    <h2>24/7 SUPPORT</h2>

                                    <p>Lifestyme Support</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- End bunner-header -->

            </div><!--End Bunner-footer -->

            <div class="footer">

                <div class="container">

                    <div class="row">

                        <div class="col-md-3 col-sm-4 col-xs-6 links-footer">
                            <h2>Browse Categories</h2>
                             @if(count($categories_shared))
                                @foreach($categories_shared as $category)
                                    <a href="{!! $loop->iteration == 1 ? route('subscriptions_page'):route('devices_page') !!}" title="" ><span class="glyphicon glyphicon-triangle-left"></span>{!! $category->title !!}</a>
                                 @endforeach
                            @endif
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-6 links-footer">
                            <h2>My Account</h2>
                            @if(Auth::guard('client')->check())
                                <a href="{{  route('client.profile') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span>Your Account</a>
                                <a href="{{  route('client.profile_info') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span> Update Account</a>
                                <a href="{{  route('client.get_addresses') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span>Add New Address</a>
                                <a href="#" title=""><span class="glyphicon glyphicon-triangle-left"></span>Orders</a>
                                <a href="{{  route('client.wishlistItems') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span>Wishlist</a>
                            @else

                                 <a href="{{  route('get_client_login') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span>Login now </a>

                                  <a href="{{  route('get_client_login') }}" title=""><span class="glyphicon glyphicon-triangle-left"></span>Create an account ?</a> 

                            @endif

                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 links-footer mr-top">
                            <h2>Keep In Touch</h2>
                            <div class="download">
                                <a href="#" title="" class="app"></a>
                                <a href="#" title="" class="android"></a>
                            </div>
                            <div class="social">
                                @if(count($social_shared))
                                    @foreach($social_shared as $link)
                                        <a href="{{ $link->url }}" target="_blank" title=""><i class="{{ $link->icon }}"></i></a>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-7 col-xs-6 footer-form">
                            <h2>Newsletter & Social Media</h2>
                            <p>Join our news letter to recieve up to date updates from our website</p>
                            <div class="send-mail">
                                {!! Form::open(['route'=>'newsletter_subscripe' , 'method'=>'POST']) !!}
                                    <input type="text" name="email" value="" placeholder="your email">
                                    <input type="submit" name="" value="">
                                {!! Form::close() !!}

                            </div>
                        </div>

                    </div><!-- End row -->

                </div><!-- End container -->

            </div><!-- End footer -->

            <div class="bottom-footer">

                <div class="container">

                    <div class="row">

                        <div class="col-md-5 col-sm-4">

                            <p>Copyright © 2018 Royaliptvstore All rights reserved.</p>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <span class="sponser"><img src="{{ asset('assets/frontend/img/secured.png') }}" alt=""></span>

                        </div>

                        <div class="col-md-4 col-sm-4 last-div">

                            <p>Designed By: <a href="http://www.tatweers.com" target="_blank" title="">tatweers.com</a></p>

                        </div>

                    </div>

                </div>

            </div><!-- End bottom-footer -->

            

        </div> 





        {{ Html::script("assets/frontend/js/vendor/jquery-1.10.2.min.js")}} 

        {{ Html::script("assets/frontend/js/bootstrap.js")}} 

        {{ Html::script("assets/frontend/js/slick.js")}} 

        {{ Html::script('assets/backend/bower_components/dropify/dist/js/dropify.min.js') }} 

        {!! Html::script('assets/backend/bower_components/lightbox2/js/lightbox.min.js') !!}

        {{ Html::script("assets/countries/js/msdropdown/jquery.dd.min.js")}}

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.desktop.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.buttons.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.confirm.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.callbacks.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.animate.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.history.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.mobile.js') !!}  

        {!! Html::script('assets/backend/bower_components/pnotify/js/pnotify.nonblock.js') !!}  

        {!! Html::script('assets/backend/pages/pnotify/notify.js') !!} 

        {!! Html::script('assets/frontend/js/fresco/fresco.js') !!} 

        {{ Html::script("assets/frontend/js/main.js")}} 



     @if(Session::has('subscripe_made'))

        <script>

              

            new PNotify({

                title: 'Subscription Success',

                text: 'we are glad to inform you that  your subscription to our newsletter went successfully',

                icon: 'fa fa-bell-o fa-2x'

            });





            var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

            sound.loop = false;

            sound.play();

        </script>

     @endif



     <script>  

        $(document).ready(function(){

              $('[data-toggle="tooltip"]').tooltip(); 

        });

     </script>


   {{--   <script>

        
        lightbox.option({
            'resizeDuration': 300,
            'wrapAround': true
        });

    </script> --}}

 

     @yield('scripts')

    </body>

</html>

