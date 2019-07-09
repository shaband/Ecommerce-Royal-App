@extends('frontend.template.app') 



@section('page_title' , 'Checkout  Page') 



@section('styles')

 



    {!! Html::style('assets/frontend/css/account.css') !!} 

    {!! Html::style('assets/frontend/css/checkout.css') !!} 









     <style> 



        #validation_error_ol{ 



                border-top: 2px dashed;



                padding-top: 9px;



                margin-top: 10px; 

        } 


        .h4_text{

                color: #676767;
                font-weight: 500;
                display: block;
                margin-bottom: 9px;
                margin-top: 17px;
        }



    </style> 



@endsection 





@section('content')



  



	 <div class="wrapper-content">

        <div class="container">

            <div class="row">

                <div class="col-md-12 header-top-bunner">

                    <img src="{!! asset("assets/frontend/img/account-bunner.png") !!}" alt="">

                </div>

                <div class="clearfix"></div>

                <div class="col-12 text-center header-myaccount">

                    <h1>Checkout</h1>

                </div>

                <div class="col-md-12 myaccount-content">

                    <div class="col-lg-12 content">


                        <div class="alert alert-success alert-dismissible">

                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                <strong>Hoola</strong> , Your billing address information is already taken and sent with payment info from your account information if you wish to update them please click here <a href="{!! route('client.profile_info') !!}" style="text-decoration: none;" > Update account info</a>
                        </div>



                        <div class="col-md-12">

                            <div class="checkout-cart">

                                <div class="row">

                                    <div class="col-sm-6 col-xs-12 pull-right alert alert-warning">

                                        <div class="totals">

                                        	<h2 class="title-Payment">Summary </h2>

                                            

                                             

                                            <div class="totals-item">

                                                <label>Shipping</label>

                                                <div class="totals-value" id="cart-shipping">

                                                		

	                                                @if($general_settings_shared->shipping_cost != null ) 

	                                                   <code> {!!  sprintf('%0.2f', $general_settings_shared->shipping_cost )   !!} </code>

	                                                    <span> &nbsp; S.R</span>



	                                                @else 

	                                                   <code> {!! sprintf('%0.2f', 0 ) !!} </code> <span> &nbsp; S.R</span> 

	                                                @endif



                                                </div>

                                            </div>


                                            <div class="totals-item">

                                                <label>Subtotal</label>

                                                <div class="totals-value" id="cart-subtotal"><code>
                                                    {!! sprintf('%0.2f', $sub_total + $general_settings_shared->shipping_cost ) !!}</code><span> &nbsp; S.R</span></div>

                                            </div>

                                            <div class="totals-item totals-item-total">

                                                <label>Grand Total</label>

                                                <div class="totals-value" id="cart-total">

                                                	

                                                	<code> {!!  sprintf('%0.2f', $sub_total + $general_settings_shared->shipping_cost  ) !!} </code> <span> &nbsp; S.R</span>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

 

                                    <div class="col-sm-6 col-xs-12 pull-left Payment-form">

                                        <h2 class="title-Payment">Your Cart <span class="badge">{!! $carts->sum('quantity') !!}</span> </h2>

                                       

                                            <div class="table-responsive">

                                                <table class="table">

                                                    <thead>

                                                        <tr>

                                                            <th>Product name</th>

                                                            <th>Quantity</th>

                                                            <th>Price</th>



                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                    

                                                    @foreach($carts as $cart)

                                                    
                                                        <tr>

                                                            <td>{!! $cart->product->title !!}</td>

                                                            <td>{!! $cart->quantity !!}</td>

                                                            <td>{!! sprintf('%0.2f' ,  $cart->product->price ) !!} S.R</td>



                                                        </tr>


                                                    @endforeach



                                                    </tbody>

                                                </table>

                                            </div> 
                                    </div>
                                </div>
 

                                <div class="row"> 

                                     <div class="alert alert-warning alert-dismissible">

                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                             You can select a shipping address from available shipping addresses you have added before or you can begin filling the below form to start shipping to a new address , Keep in notice if u do choose an address from the drop list and also filled in a new shipping address we will take into consideration the selected address
                                    </div>

                                    {!! Form::open(['route'=>'perform_checkout' , 'method'=>'POST']) !!} 


                                     <div class="col-md-6"> 
                                            <div class="custom-checkbox">
                                                <label for="address">Ship to this address</label>

                                                @if(count($addresses) > 0 ) 

                                                    
                                                            <select  id="address" class="form-control" name="loaded_addresses" data-toggle="tooltip" data-placement="top" title=' <p   > Please note : if you select an address you have add it before and in the same time clicked on add new address , we will take into consideration  shipping to the selected address and new address will be stored in your addresses list</p>' data-html="true">

                                                                <option   disabled="" selected="">select address</option>

                                                                @foreach($addresses as $address)

                                                                    <option value="{!! $address->id !!}">{!! $address->address_name !!}</option>

                                                                @endforeach

                                                            </select>

                                                      


                                                @else

                                                   <div class="alert alert-warning alert-dismissible">

                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                                            No addresses found 
                                                    </div> 

                                                @endif

                                      </div>          
                                 </div>



                                    <div class="col-md-6"> 
                                         
                                        <h4 class="h4_text">Or Add a new shipping address</h4> 
                                        
                                        <div class="content-address-book" id="address_error">


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



                                            <h2>Personal Information</h2>   

                                            <div class="row"> 

                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="addressName">Address name <span>*</span></label>
                                                        <input type="text" id="addressName" name="address_name" placeholder="give your address a name" class="form-control" value="{!! old('address_name') !!}">


                                                    </div> 

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="FirstName">First Name <span>*</span></label>
                                                        <input type="text" id="FirstName" name="first_name" placeholder="first name" class="form-control" value="{!! old('first_name') !!}">
                                                    </div> 

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="LastName" id="LastName">Last Name <span>*</span></label>
                                                        <input type="text" name="last_name" placeholder="last name" value="{!! old('last_name') !!}" class="form-control">
                                                    </div> 

                                                    <div class="col-md-6 col-sm-6">
                                                        <label>Telephone Code<span>*</span></label>
                                                        <br> 
                                                         @component('frontend.components.iso_countries_phone_codes_checkout')@endcomponent
                                                    </div> 

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="Telephone">Telephone<span>*</span></label>
                                                        <input type="text" name="telephone" id="Telephone" placeholder="telephone number" class="form-control" value="{!! old('telephone') !!}" >
                                                    </div> 
                                            </div>

                                            <h2>Address</h2>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label for="street">Street Addres<span>*</span></label>
                                                    <input type="text" id="street" name="street_one" class="form-control" placeholder="street address one" value="{!! old('street_one') !!}">
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="street_two" placeholder="street address two">
                                                </div>
                                            </div>

                                           

                                            <div class="row">

                                               
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="city" class="color-city">City<span>*</span></label>
                                                    <input type="text" class="form-control" id="city" name="city" value="{!! old('city') !!}">
                                                </div> 

                                                <div class="col-md-6 col-sm-6">
                                                    <label for="city" class="color-city">State<span>*</span></label>
                                                    <input type="text" class="form-control" id="state" name="state" value="{!! old('state') !!}">
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6 col-sm-6">

                                                        <label class="color-city" for="country">Country<span>*</span></label> 
                                                        @component('frontend.components.iso_countries_checkout')@endcomponent
          
                                                </div> 


                                                <div class="col-md-6 col-sm-6">

                                                        <label class="color-city" >Postal Code<span>*</span></label>

                                                        <input type="text" class="form-control" name="postal_code" value="{!! old('postal_code') !!}">

                                                </div> 
                                            </div>   
                                        </div> 
                                    </div>

                                </div> 

                            </div>

                        </div>

                        <div class="clearfix"></div>
 
                        <button class="checkout btn-block" type="submit">Pay Now</button>

                         {!! Form::close() !!}



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




            @if(Session::has('payment_failed'))  



                    new PNotify({

                         type: 'error' , 

                        title: 'Payment Failed',



                        text: '{!! Session::get('payment_failed') !!}',



                        icon: 'fa fa-bell-o fa-2x'



                    });

 



                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');



                    sound.loop = false;



                    sound.play(); 

 



            @endif 











     

        

    





        });

 

   

 



    </script> 



@endsection















