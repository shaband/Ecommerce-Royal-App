@extends('frontend.template.app')


@section('page_title' , "Product || $product->title")



@section('styles')
     
    {!! Html::style('assets/frontend/css/product-inf.css') !!}


    <style>
        
        #validation_error_ol{

                border-top: 2px dashed;
                padding-top: 9px;
                margin-top: 10px;

        }

        .item {
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        .item_test{
              height: 100%;
              width: 100%;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              display: block ; 


        }

    </style>
    


@endsection



@php 

    $carts = [] ; 

    if(Auth::guard('client')->check()){

      $client  = Auth::guard('client')->user(); 

      $carts = $client->carts ; 

    }

@endphp 


@section('content')




        
          <div class="container">
                <div class="wrapper-content"> 
                    <div class="row">
                        <div class="col-md-12 header-top-bunner">
                            <img class="img-bunner" src="{{ asset("assets/frontend/img/account-bunner.png") }}" alt="">
                        </div>
                    </div>
                    <div class="row product-content">
                        <div class="col-md-6 col-sm-12">
                            <div id="prudoct-Slider" class="carousel slide slider" data-ride="carousel">
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">



                                    @if(count($product->attachements))
                                      @foreach($product->attachements as $image)  
                                       
                                     
                                        <div class="item  {{ $loop->iteration == 1 ? 'active':'' }}">
                                           <a href="{{ asset("uploads/products/attachements/$image->product_image") }}" class="fresco item_test" style="background-image: url('{{ asset("uploads/products/attachements/$image->product_image") }}')"></a>
                                          {{-- <img src="{{ asset("uploads/products/attachements/$image->product_image") }}" alt="">  --}}
                                        

                                        </div>

                                        
                                        @endforeach
                                    @endif

                                    
                                    
                                </div>


                                 <!-- Indicators -->
                                {{-- <div class="carousel-indicators prudoct-Slider-controller clearfix">

                                     @if(count($product->attachements))
                                      @foreach($product->attachements as $image)  
                                       

                                        <div data-target="#prudoct-Slider" data-slide-to="{{ $loop->iteration + 1 }}">
                                            <img src="{{ asset("uploads/products/attachements/$image->product_image") }}" alt="">
                                        </div>


                                        @endforeach
                                    @endif

 
                                     
                                </div> --}}
 


                            </div>        
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="product-inf-content">
                                <h2>{{ $product->title }}</h2>
                                {{-- <p>Under :   {{ $product->package->title }}</p> --}}
                                 
                                 <p >
                                    Price : 
                                    @if($product->discount) 

                                     <span class="price">   {!! sprintf('%0.2f' , $product->price - (( $product->price  * $product->discount ) / 100 )) !!} S.R </span>  
                                    @else 

                                      <span> {{ $product->price }} S.R </span>  

                                    @endif


                                 </p>

                                 <p >
                                   Availability : <span class="stars">{!! ucfirst($product->availability) !!}</span>
                                 </p>
                                 <p class="content">{!! $product->description !!}</p>
                                 <div class="add-to-cart clearfix">



                                   @if(Session::has('add_to_cart_error'))
                                      @if($errors->all())   
                                              <div class="alert alert-danger alert-dismissible"  id="cart_information_div">
                                                  {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
                                                  <strong>Please wait</strong> , we found some errors
                                                  <ol id="validation_error_ol">
                                                  @foreach($errors->all() as $error)
                                                      
                                                      <li>{!! $error !!}</li>

                                                  @endforeach
                                                  </ol>
                                              </div>
                                      @endif
                                   @endif


                                   @if(Auth::guard('client')->check())

                                    @if(!$client->carts->contains('product_id' , $product->id))

                                    {!! Form::open(['route'=>['addItemToCart' , $product->id] , 'method'=>'POST' , 'id'=>"form_$product->id"]) !!}


                                      <input type="number" name="to_be_added_to_cart" value="1" placeholder="" data-toggle="tooltip" data-placement="top" title='Please enter a value from one (1) min to ten (10) max to proceed' min="1" max="10">


                                     {!! Form::close() !!}


                                     @endif

                                  @else

                                     {!! Form::open(['route'=>['addItemToCart' , $product->id] , 'method'=>'POST' , 'id'=>"form_$product->id"]) !!}


                                      <input type="number" name="to_be_added_to_cart" value="1" placeholder="" data-toggle="tooltip" data-placement="top" title='Please enter a value from one (1) min to ten (10) max to proceed' min="1" max="10">


                                     {!! Form::close() !!}


                                  @endif
                                    

                                    {{-- @if(count($client->carts))
                                      
                                      @foreach($client->carts as $cart)
                                        
                                        @if($cart->product_id == $product->id)
                                          
                                          item added

                                        @else

                                          <a href="{!! route("addItemToCart" , $product->id) !!}" title="">add to cart <img src="{{ asset("assets/frontend/img/shopping-bag.png") }}" alt=""></a>

                                        @endif

                                      @endforeach


                                    @else

                                      <a href="{!! route("addItemToCart" , $product->id) !!}" title="">add to cart <img src="{{ asset("assets/frontend/img/shopping-bag.png") }}" alt=""></a>

                                    @endif --}}

                                    @if(Auth::guard('client')->check())

                                    @if($client->carts->contains('product_id' , $product->id))

                                          <a>Item added before <img src="{{ asset("assets/frontend/img/shopping-bag.png") }}" alt=""></a>

                                    @else

                                         <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $product->id }}').submit();" title="">add to cart <img src="{{ asset("assets/frontend/img/shopping-bag.png") }}" alt=""></a>

                                    @endif


                                    @else

                                         <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $product->id }}').submit();" title="">add to cart <img src="{{ asset("assets/frontend/img/shopping-bag.png") }}" alt=""></a>


                                    @endif
                                      


                                 



                                 </div>
                                <p >categories: <span class="categories">{{ $product->category->title }}</span></p>
                                <p >Under :<span class="categories tag">{{ ucfirst($product->package->title)  }}</span></p>



                                @if(Auth::guard('client')->check())


                                  @if(count($client->wishlistItems) > 0 )
                                  
                                    @if(!$client->wishlistItems->contains('product_id' , $product->id))
                                     <a class="add-list" href="{{ route("addItemToWishlist" , $product->id) }}"><i class="fa fa-heart-o"></i> Add to Wishlist</a>


                                    @else

                                       <a class="add-list" href="{{ route("removeItemFromWishlist" , $product->id ) }}" data-toggle="tooltip" data-placement="top" title='Click to remove this item from your Wishlist' min="1" max="10" ><i class="fa fa-heart"></i>Item already added to your wishlist</a>

                                    @endif


                                  @else

                                       <a class="add-list" href="{{ route("addItemToWishlist" , $product->id) }}"><i class="fa fa-heart-o"></i> Add to Wishlist</a>

                                  @endif


                                @else

                                    <a class="add-list" href="{{ route("addItemToWishlist" , $product->id) }}"><i class="fa fa-heart-o"></i> Add to Wishlist</a>

                                @endif
                                <hr>
                               {{--  <div class="social-info">
                                    <a href="#" title="">Facebook</a>
                                    <a href="#" title="">Google+</a>
                                    <a href="#" title="">twitter</a>
                                    <a href="#" title="">Pinterest</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="row tabs-content">
                            <div class="col-md-12"> 
                                   <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                      <li><a data-toggle="tab" href="#add-inform">Additional Information</a></li>
                                      {{-- <li><a data-toggle="tab" href="#review">reviews(1)</a></li> --}}
                                    </ul> 
                                    <hr>
                                    <div class="tab-content">
                                      <div id="description" class="tab-pane fade in active"> 
                                        <p>{!! $product->description !!}</p>
                                      </div>
                                      <div id="add-inform" class="tab-pane fade"> 
                                        <p>{!! $product->another_description !!}</p>
                                      </div>
                                     {{--  <div id="review" class="tab-pane fade"> 
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                      </div> --}}
                                    </div>
                            </div>
                        </div>



                        {{-- <div class="row">
                            <div class="col-md-12 related-products">


                                @php 

                                    $related_products = \App\Models\Product::where(['status'=>'active' , 'package_id'=>$product->package_id])->get();  

                                @endphp 


                                <h1>Related Products</h1>

                                @if(count($related_products) > 0 )



                                  @foreach($related_products as $related)


                                      @if($related->id != $product->id)
                                          <div class="col-md-2 col-sm-4 col-xs-6">
                                               <img src="{{  asset("uploads/products/main/$related->main_image") }}" alt="">
                                               <h2>
                                                   <a href="{{ route("productDetails" , $related->id) }}" title="">{{ $related->title }}</a>
                                               </h2>
                                               
                                              @if($related->discount)
                                                  <p class="decoration">
                                                      <span> {{ $related->price }}  S.R</span>
                                                      <!-- percentage  --> 

                                                       {{ $related->discount }} % OFF 
                                                  </p>

                                                   <p>{!! $related->price - (( $related->price  * $related->discount ) / 100 ) !!} S.R </p>


                                               @else 
                                             
                                                  <p>{{ $related->price }} S.R </p>


                                               @endif
                                          </div>

                                      @endif


                                  @endforeach
                                ssss

                                @else

                                  sss

                                @endif
                        
                            </div>
                        </div> --}}





                        
                    </div>
                    
                </div>
            </div>


@endsection 



@section('scripts')

    <script>
        
        $(document).ready(function(){




            @if(Session::has('cart_item_added')) 
                        
                    new PNotify({
                        title: 'Cart Item Added',
                        text: '{!! Session::get('cart_item_added') !!}',
                        icon: 'fa fa-bell-o fa-2x'
                    });


                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
                    sound.loop = false;
                    sound.play(); 


            @endif 


            @if(Session::has('item_added_to_wishlist')) 
                        
                    new PNotify({
                        title: 'Wishlist Notification',
                        text: '{!! Session::get('item_added_to_wishlist') !!}',
                        icon: 'fa fa-bell-o fa-2x'
                    });


                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
                    sound.loop = false;
                    sound.play(); 


            @endif


            @if(Session::has('item_deleted_from_wishlist')) 
                        
                    new PNotify({
                        title: 'Wishlist Notification',
                        text: '{!! Session::get('item_deleted_from_wishlist') !!}',
                        icon: 'fa fa-bell-o fa-2x'
                    });


                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
                    sound.loop = false;
                    sound.play(); 


            @endif




             $('.carousel').carousel({
                interval: 2000
              });




        });


    </script>

@endsection



