@extends('frontend.template.app')











@section('page_title' , 'Home page')


@php 
    

    $client = Auth::guard('client')->user(); 

@endphp 




@section('styles')



    

    <style type="text/css">

        

        .label_added{



            color: #020202!important ; 

        }





        .header_title{



            font-size: 30px !important;

        }



        .description{



                line-height: 16px !important;

        }





    </style>



@endsection







@section('content')







 



	



	              



            <!-- Slider Part --> 







            <div class="wrapper-slider">



                <div class="container">



                    <div class="slider-content">



                        <div class="row">



                            <div id="mainSlider" class="carousel slide slider" data-ride="carousel">



                              <!-- Wrapper for slides -->



                              <div class="carousel-inner">







                                



                                <!-- looping from here --> 







                                @if(count($slider_posts) > 0 )



                                    



                                    @foreach($slider_posts as $slide)







                                        <div class="item  {!! $loop->iteration == 1 ? 'active' : '' !!}">



                                            <img src="{!! asset("uploads/slider/$slide->slide_image") !!}" alt="{{  strtolower($slide->title)  }}"> 







                                            {{-- <img src="{!! asset("assets/frontend/img/slide-1.jpg") !!}" alt="{{  strtolower($slide->title)  }}"> --}}



                                            <div class="item-content">



                                                <h2>{!! ucfirst($slide->title) !!}</h2>



                                                <p>{!! str_limit($slide->description , 200 ) !!}</p>



                                                <a    class="btn"  href="{!! asset("uploads/slider/$slide->slide_image") !!}" data-lightbox="4"  data-title=' <div class="alert alert-primary background-primary"><p class="pull-right label bg-success label_added">Added : {{  date("F j, Y, g:i a" , strtotime($slide->created_at))  }}</p>

                                                    <h2 class="header_title">{{  $slide->title  }}</h2>  

                                                    <p class="description"> {{  $slide->description }} </p>

                                                </div>



                                                '>Read MORE</a>



                                            </div>



                                        </div>







                                    @endforeach







                                @endif



  











                              </div>



                                 <!-- Indicators -->



                              <div class="carousel-indicators slider-controller">











                                <!-- looping from here  --> 











                                @if(count($slider_posts) > 0 )



                                    @php $index = 0 ; @endphp 



                                    @foreach($slider_posts as $slide)







                                        







                                        <div data-target="#mainSlider" data-slide-to="{!! $index !!}" class="controller-item {!! $loop->iteration == 1 ? 'active' : '' !!} clearfix">



                                            <div class="img-control pull-left">



                                               <img src="{!! asset("uploads/slider/$slide->slide_image") !!}" alt="{{  strtolower($slide->title)  }}"> 



                                            </div>



                                            <div class="content-control pull-right">



                                                <h3>{!! ucfirst($slide->title) !!}</h3>



                                                <p>{!! str_limit($slide->description , 100 ) !!}</p> 



                                            </div>



                                        </div>







                                        @php $index++ ;   @endphp 











                                    @endforeach















                                @endif











                                



 















 



                            </div>



                            



                        </div>



                    </div>



                    



                </div>



            </div>















            <div class="subscrip">



                <div class="container">



                    <div class="row">



                        



                        @if(count($categories_shared))







                        @foreach($categories_shared as $category)







                            <div class="col-md-6">



                                <div class="subscrip-{!! $loop->iteration == 1 ? 'left':'right' !!}">







                                    <div class="subscrip-content">



                                        <h3>{{  ucfirst($category->title) }}</h3>



                                        <p>{{  str_limit($category->description , 50 )  }}</p>



                                        <a href="{!! $loop->iteration == 1 ? route('subscriptions_page'):route('devices_page') !!}" title="" class="btn">SHOW ME MORE</a>



                                    </div>



                                    <img src="{{  asset("uploads/categories/$category->category_image")  }}" alt="">



                                </div>



                            </div>







                        @endforeach











                        @endif







 



                    </div><!-- End row -->



                </div><!-- End container -->



            </div><!-- End subscrip -->










            <div class="subscrip-slider devices">



                <div class="container">



                    <div class="row">



                        <div class="col-md-12">



                            <h2 class="title-subscrip">Devices</h2>  



                        </div>



                     </div><!-- End row -->



                     <div class="row">



                         <div class="col-md-12 col-sm-11 s col-xs-10 margin-left">



                             <div class="subscrip-slider-content scound-slider">











                                 @if(count($devices_products) > 0 )



                            



                                @foreach($devices_products as $device)



                                    <div class="item">

                                        <span class="offer-sale">Sale!</span>

                                        <a href="{{ route("productDetails" , $device->id) }}" class="item-img-link">

                                            <img src="{{  asset("uploads/products/main/$device->main_image")  }}" alt="{{  $device->title  }}">

                                        </a>



                                         <h2>



                                             <a href="{{ route("productDetails" , $device->id) }}" title="">{{  ucfirst($device->title)  }}



                                                <br>{{  ucfirst($device->package->title)  }}</a>



                                         </h2>



                                        {{--   <button type="button" class="btn btn-success btn-sm">Type &nbsp;<span class="badge">{{  ucfirst($device->package->title)  }}</span></button> --}}



                                          @if($device->discount)



                                            <p class="decoration">



                                                <span> {{ $device->price }}  S.R</span>



                                                <!-- percentage  --> 







                                                 {{ $device->discount }} % OFF 



                                            </p>







                                             <p>{!! $device->price - (( $device->price  * $device->discount ) / 100 ) !!} S.R </p>











                                         @else 



                                       



                                            <p>{{ $device->price }} S.R </p>











                                         @endif




                                  @if(Auth::guard('client')->check())



                                    @if($client->carts->contains('product_id' , $device->id))



                                          <a class="add-to-cart-home">Item added</a>



                                    @else


                                         {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                          {!! Form::close() !!}



                                         <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();" class="add-to-cart-home" > <i class="fa fa-shopping-cart"></i>  add to cart  </a>



                                    @endif





                                    @else

                                          {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                          {!! Form::close() !!}

                                         <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();" class="add-to-cart-home" ><i class="fa fa-shopping-cart"></i>  add to cart  </a>





                                    @endif



                                        {{--   {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                           {!! Form::close() !!}




                                        <a  style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();"  class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a> --}}

                                    </div>



                                @endforeach







                            @endif



                                



                            </div>



                         </div>



                     </div><!-- End row -->



                </div><!-- End container -->



            </div><!-- subscrip-slider -->






            















            <div class="subscrip-slider">



                <div class="container">



                    <div class="row">



                        <div class="col-md-12">



                            <h2 class="title-subscrip">SUBSCRIPTION</h2>  



                        </div>



                     </div><!-- End row -->



                     <div class="row">



                         <div class="col-md-12 col-sm-11 s col-xs-10 margin-left">



                             <div class="subscrip-slider-content first-slider">



                                











                            @if(count($subscriptions_products) > 0 )



                            



                                @foreach($subscriptions_products as $subscription)



                                    <div class="item">

                                        <span class="offer-sale">Sale!</span>

                                        <a href="{{ route("productDetails" , $subscription->id) }}" class="item-img-link">

                                            <img src="{{  asset("uploads/products/main/$subscription->main_image")  }}" alt="{{  $subscription->title  }}">

                                        </a>



                                         <h2>



                                             <a href="{{ route("productDetails" , $subscription->id) }}" title="">{{  ucfirst($subscription->title)  }}



                                                <br>{{  ucfirst($subscription->package->title)  }}</a>



                                         </h2>



                                        {{--  <p>



                                             <i class="fa fa-star"></i>



                                             <i class="fa fa-star"></i>



                                             <i class="fa fa-star"></i>



                                             <i class="fa fa-star"></i>



                                             <i class="fa fa-star-half-o"></i>



                                         </p> --}}



                                          {{-- <button type="button" class="btn btn-success btn-sm">Package &nbsp;<span class="badge">{{  ucfirst($subscription->package->title)  }}</span></button> --}}



                                          



                                          @if($subscription->discount)



                                            <p class="decoration">



                                                <span> {{ $subscription->price }}  S.R</span>



                                                <!-- percentage  --> 







                                                 {{ $subscription->discount }} % OFF 



                                            </p>







                                             <p>{!! $subscription->price - (( $subscription->price  * $subscription->discount ) / 100 ) !!} S.R </p>











                                         @else 



                                       



                                            <p>{{ $subscription->price }} S.R </p>











                                         @endif



                                        @if(Auth::guard('client')->check())



                                            @if($client->carts->contains('product_id' , $subscription->id))


                                            
                                                <a  class="add-to-cart-home"></i>Item added</a>


                                            @else




                                                 {!! Form::open(['route'=>['addItemToCartPages' , $subscription->id] , 'method'=>'POST' , 'id'=>"form_$subscription->id"]) !!}


                                                {!! Form::close() !!}



                                                <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $subscription->id }}').submit();" class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a>
                                       



                                            @endif





                                        @else


                                             {!! Form::open(['route'=>['addItemToCartPages' , $subscription->id] , 'method'=>'POST' , 'id'=>"form_$subscription->id"]) !!}


                                                {!! Form::close() !!}



                                                <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $subscription->id }}').submit();" class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a>    





                                        @endif







                                          

                                    </div>



                                @endforeach







                            @endif



                                



                                 



                                  



                                  



                                 



                                 



                            </div>



                         </div>



                     </div><!-- End row -->



                </div><!-- End container -->



            </div><!-- subscrip-slider -->



















@endsection 



@section('scripts')
    
    <script>

      @if(Session::has('cart_item_added_pages')) 

                        

                    new PNotify({

                        title: 'Cart Notification',

                        text: '{!! Session::get('cart_item_added_pages') !!}',

                        icon: 'fa fa-bell-o fa-2x'

                    });





                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

                    sound.loop = false;

                    sound.play(); 





            @endif

    </script>


@endsection 














