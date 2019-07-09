@extends('frontend.template.app')


@section('page_title' , 'Client - Wishlist page')

@section('styles')
     
    {!! Html::style('assets/frontend/css/account.css') !!}


    <style type="text/css">
            
            .item-img{

               height: 90px;
            }

            .prod_image{

                height: 100% ; 
            }


            .in_cart{

                    background-color: #bfbfbf !important;
            }


    </style>

@endsection

@php 
    
     $client  = Auth::guard('client')->user(); 
    
@endphp 


@section('content') 


	   <div class="wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header-top-bunner">
                    <img src="{!! asset('assets/frontend/img/account-bunner.png') !!}" alt="">
                </div>
                <div class="clearfix"></div>
                <div class="col-12 text-center header-myaccount">
                    <h1>My Wishlist items</h1>
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
                        <h3 class="title-dash">My Wishlist</h3>
                        <div class="col-md-12">
                            <div class="content-address-book">


                                @if(count($client->wishlistItems) > 0 )

                                @foreach($client->wishlistItems as $item)




                                    <div class="row">
                                        <div class="col-md-12 wishlist-item-wrapper">
                                            <div class="wishlist-item">

                                                @php 

                                                    $product_image = $item->WishlistProduct->main_image ; 

                                                @endphp


                                                <div class="col-md-3 item-img">
                                                    <a href="{!! asset("uploads/products/main/$product_image") !!}" class="fresco">
                                                        <img class="prod_image" src="{!! asset("uploads/products/main/$product_image") !!}" alt="{!! $item->WishlistProduct->title  !!}">
                                                    </a>
                                                </div>
                                                <div class="col-md-7 wish-item-content">
                                                    <h3>{!! $item->WishlistProduct->title  !!}</h3>
                                                    <p>{!! str_limit($item->WishlistProduct->description  , 300 )  !!}</p>

                                                    @if(count($client->carts) > 0 )

                                                        @if(!$client->carts->contains('product_id' , $item->WishlistProduct->id ))
                                                        <a href="{!! route("addItemToCartFromWishlist" , $item->WishlistProduct->id ) !!}">Add To Cart</a>

                                                        @else

                                                            <a class="in_cart">This item already in your cart</a>

                                                        @endif

                                                    @else

                                                    <a href="{!! route("addItemToCartFromWishlist" , $item->WishlistProduct->id ) !!}">Add To Cart</a>

                                                    @endif






                                                </div>
                                                <div class="col-md-2 wish-item-price">
                                                    <span class="color-price"> {!! $item->WishlistProduct->price  !!} &nbsp; S.R</span>
                                                    <a href="{!! route("removeItemFromWishlist" , $item->WishlistProduct->id) !!}"><i class="fa fa-trash"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                @else

                                    <div class="alert alert-warning alert-dismissible" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <i class="fa fa-smile-o fa-1x" aria-hidden="true"></i>
                                        <strong>Sorry !</strong> we can't find any product added to your wishlist till now  
                                        
                                    </div>

                                @endif
                              
                                
                                {{-- <a href="#" title="" class="show-more">SHOW ME MORE</a> --}}
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
        
        $(document).ready(function(){


              @if(Session::has('item_added_to_cart_from_wishlist')) 
                        
                    new PNotify({
                        title: 'Cart Notification',
                        text: '{!! Session::get('item_added_to_cart_from_wishlist') !!}',
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


        });

    </script>


@endsection