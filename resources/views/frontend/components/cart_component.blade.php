                                  <style type="text/css">
                                    
                                      .hide{

                                        display: none ; 
                                      }

                                  </style>


                                  @php
                                    
                                    if(Auth::guard('client')->check()){

                                        $client = Auth::guard('client')->user() ;  

                                    } 
      
                                  @endphp 


                                


                                   
                                    <a href="#" title="" id="cart" class="purch">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                        <span> 

                                          @php
                                    
                                            if(Auth::guard('client')->check()){

                                                  echo $client->carts->sum('quantity')  ; 

                                            }else{

                                                  echo "0" ; 
                                            }
              
                                          @endphp 

                                            
                                            
                                        </span>

                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </a>

                                    <div class="shopping-cart">


                                        <div class="shopping-cart-header">
                                          <i class="fa fa-shopping-cart cart-icon"></i>

                                          <span class="badge badge_total">

                                              

                                                @php
                                    
                                                  if(Auth::guard('client')->check()){

                                                        echo $client->carts->sum('quantity')  ; 

                                                  }else{

                                                        echo "0" ; 
                                                  }
                    
                                                @endphp

                                                

                                          </span>

                                          <div class="shopping-cart-total">
                                            <span class="lighter-text">Total:</span>
                                            <span class="main-color-text cart_total">
                                              
                                              @php
                                    
                                                if(Auth::guard('client')->check()){

                                                    $total = 0  ; 

                                                    if(count($client->carts) > 0 ){

                                                        foreach ($client->carts as $cart) {
                                                            
                                                              $total += $cart->quantity * $cart->product->price ; 
                                                        }

                                                        echo "<code>".  $total ."</code>" ; 

                                                    }else{

                                                        echo "0.00" ; 

                                                    }
                                                      

                                                }else{

                                                      echo "0.00" ; 
                                                }
                  
                                              @endphp



                                            <span class="currency"> S.R</span></span>
                                          </div>
                                        </div> <!--end shopping-cart-header -->

                                        <ul class="shopping-cart-items">


          



                                         @if(Auth::guard('client')->check())

                                          @if(count($client->carts) > 0 )


                                            @foreach($client->carts as $cart)

                                              <li class="clearfix">
                                                @php 
                                                  $product_image = $cart->product->main_image ; 
                                                @endphp
                                                <img src="{!! asset("uploads/products/main/$product_image") !!}" />
                                                <span class="item-name">{!! $cart->product->title !!}</span>
                                                <span class="item-price ">Price : <span class="product_price">{!! $cart->product->price !!} </span> </span>
                                                <span class="item-quantity">Quantity: <span class="product_cart_quantity">{!! $cart->quantity !!}</span></span>
                                              </li>


                                            @endforeach

                                            @else

                                              <li><p class="alert alert-warning text-center">No items added to your cart yet</p></li>


                                            @endif

                                          @else

                                              <li><p class="alert alert-warning text-center">Login to see you cart</p></li>

                                          @endif

                                           
                                         
                                        </ul>

                                        @if(Auth::guard('client')->check())
                                        <a href="{!! route("cart_page") !!}" class="button {!! count($client->carts) > 0 ? '':'hide' !!}" >Procced to cart</a>
                                        @else 

                                          <a href="{{ route("get_client_login") }}" class="button" >Login</a>  

                                        @endif


                                      </div> <!--end shopping-cart -->