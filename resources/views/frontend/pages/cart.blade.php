@extends('frontend.template.app')





@section('page_title' , 'Cart Page')







@section('styles')

    



    {{-- <link rel="stylesheet" href="css/devices.css"> --}}

    {!! Html::style('assets/frontend/css/card-page.css') !!}





    <style type="text/css">

        

            .actions{





                    display: inline-flex;

                    border: none !important;

            }





            .update_icon{



                    padding-left: 5px;

            }





    </style>





     <style>

        

        #validation_error_ol{



                border-top: 2px dashed;

                padding-top: 9px;

                margin-top: 10px;



        }



    </style>





@endsection





@section('content')





        @php 



            $client  = Auth::guard('client')->user(); 



        @endphp 



        

        <div class="container">

                <div class="row">

                    <div class="col-md-12 page-shopping-cart">

                        <img src="{{ asset("assets/frontend/img/shopping-card.jpg") }}" alt="">

                    </div>

                </div>

                <div class="wrapper-content" id="cart_wrapper_start">

                    <h2 class="card-title">Cart</h2>





                    @if(Session::has('cart_error'))

                        @if($errors->all())   

                                <div class="alert alert-danger alert-dismissible"  id="cart_information_div">

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



                    <div class="table-responsive">

                        <table class="table table-bordered text-center">

                            

                            <tr>

                                  <td class="text-bold">Image</td>

                                  <td class="text-bold">Product</td>

                                  <td class="text-bold">Price</td>

                                  <td class="text-bold">Quantity</td>

                                  <td class="text-bold">Total</td>

                                  <td>Actions</td>

                            </tr>



                        





                                @if(count($client->carts) > 0 )



                                    @foreach($client->carts as $cart)



                                   

                                    <tr>



                                        @php 

                                            $product_image = $cart->product->main_image ; 

                                        @endphp 

                                        <td>

                                            <a href="{!! asset("uploads/products/main/$product_image") !!}" class="fresco">

                                            <img src="{!! asset("uploads/products/main/$product_image") !!}" alt="{!! $cart->product->title !!}">

                                            </a>

                                        </td>

                                        <td>{!! $cart->product->title !!}</td>

                                        <td class="text-bold"><code>{!! $cart->product->price !!} </code> <span> S.R</span></td>





                                     {!! Form::open(['route'=>['update_cart_product' , $cart->id] , 'method'=>'POST' , 'id'=>"form_$cart->product_id"]) !!}







                                        <td>

                                            {{-- <span class="text-bold">Qty:</span> --}}

                                            <input class="text-bold cart_page_product_qty" type="number" required="required"  min="1" max="10"  name="product_cart_quantity" value="{!! $cart->quantity !!}"   data-html="true"  data-toggle="tooltip" data-placement="top" title='If you change this value remember to click on update button this one (  <i class="fa fa-edit"></i>  ) to update your cart'>

                                        </td>





                                    {!! Form::close() !!}







                                        <td class="text-bold"><code>{!!  $cart->product->price * $cart->quantity !!} </code> 

                                            <span> S.R</span> 

                                        </td>

                                        <td class="actions">

                                            

                                            {!! Form::open(['route'=>['deleteItemFromCart' , $cart->id] , 'method'=>'POST' , 'id'=>"delete_item_$cart->id"]) !!}





                                                <span><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Remove this from cart" onclick="document.getElementById('delete_item_{{ $cart->id }}').submit();"></i></span>



                                            {!! Form::close() !!}



                                                

                                                <span class="update_icon">

                                                    <i class="fa fa-edit update_cart_btn"   data-toggle="tooltip" data-placement="top" title="Update your cart now"   onclick="document.getElementById('form_{{ $cart->product_id }}').submit();"></i>

                                                </span>



                                        </td>



                                    </tr>

                                  

                                    @endforeach



                                @else



                                    <tr>

                                        <td colspan="6">

                                            <p class="alert alert-warning text-center"> there are no items added to your cart yet </p>

                                        </td>

                                    </tr>



                                @endif

                            

                           

                              

                        </table>

                    </div>







                     @if(count($client->carts) > 0 )

                    

                    <div class="row">

                        <div class="col-md-6 col-sm-10 col-xs-11 pull-right">

                            <div class="card-total clearfix">

                                <h2>Cart Totals</h2>

                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>

                                            <td class="text-bold">Sub total</td>

                                            <td class="text-bold"> 



                                            @php 

                                                    $sub_total  = 0  ;  

                                                    foreach ($client->carts as $cart) {  

                                                          $sub_total += $cart->quantity * $cart->product->price ; 

                                                    }

                  

                                            @endphp 



                                            <code>{!! sprintf('%0.2f', $sub_total ) !!}</code>

                                                <span> &nbsp; S.R</span>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td class="text-bold">Shipping</td>

                                            <td class="text-bold">

                                                

                                                @if($general_settings_shared->shipping_cost != null )





                                                   <code> {!!  sprintf('%0.2f', $general_settings_shared->shipping_cost )   !!} </code>

                                                    <span> &nbsp; S.R</span>

                                                @else



                                                   <code> {!! sprintf('%0.2f', 0 ) !!} </code> <span> &nbsp; S.R</span>



                                                @endif



                                            </td>

                                        </tr>

                                        <tr>

                                            <td class="text-bold">Total</td>

                                            <td class="text-bold"> <code> {!!  sprintf('%0.2f', $sub_total + $general_settings_shared->shipping_cost  ) !!} </code> <span> &nbsp; S.R</span></td>

                                        </tr>

                                    </tbody>

                                </table>

                                <a href="{!! route("getCheckout") !!}" class="btn checkout" title="">Proceed To Checkout</a>

                            </div>

                        </div>

                    </div>



                    @endif











                    {{-- interested products           --}}

                  {{--   <div class="row maybe-card">

                        <div class="col-md-12">

                            <h3>You May Be Interested In ...</h3>

                        </div>

                        <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6">

                             <img src="img/m-1.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/m-1.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                         <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/m-1.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span >Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                         <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/m-1.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                         <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/m-1.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span >Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                        <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6">

                             <img src="img/n-2.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span >Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                         <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/n-2.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/n-2.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                         <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/n-2.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6">

                             <img src="img/n-2.png" alt="">

                             <h2>

                                 <a href="#" title="">R 2000 BOX 12M ROYAL IPTV SUBSCRIPTION</a>

                             </h2>

                             <p>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star"></i>

                                 <i class="fa fa-star-half-o" aria-hidden="true"></i>

                             </p>

                             <p class="decoration"><span>Rs 499</span> [30% OFF]</p>

                             <p> Rs 350</p>

                         </div>

                    </div> --}}

                </div>

            </div> 





@endsection 







@section('scripts')



    <script>

        

        $(document).ready(function(){







            @if(Session::has('cart_updated')) 

                        

                    new PNotify({

                        title: 'Cart Updated',

                        text: '{!! Session::get('cart_updated') !!}',

                        icon: 'fa fa-bell-o fa-2x'

                    });





                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

                    sound.loop = false;

                    sound.play(); 





            @endif 







            @if(Session::has('cart_item_deleted')) 

                        

                    new PNotify({

                        title: 'Cart Item Deleted',

                        text: '{!! Session::get('cart_item_deleted') !!}',

                        icon: 'fa fa-bell-o fa-2x'

                    });





                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

                    sound.loop = false;

                    sound.play(); 





            @endif





            



        });





    </script>



@endsection







