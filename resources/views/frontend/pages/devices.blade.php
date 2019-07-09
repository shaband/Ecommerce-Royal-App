@extends('frontend.template.app')





@section('page_title' , 'Devices Page')







@section('styles')

    



    {{-- <link rel="stylesheet" href="css/devices.css"> --}}

    {!! Html::style('assets/frontend/css/devices.css') !!}





@endsection



@php 
    

    $client = Auth::guard('client')->user(); 


@endphp 



@section('content')



        

        <div class="container">

                <div class="wrapper-content">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="sidebar">

                                <div class="content-header border-r">

                                    <h2> Filters</h2>

                                </div>

                                <div class="sidebar-content">

                                    

                                    @component('frontend.components.product_filter')@endcomponent



                                    <!-- special fucking offers commented for now -->

                                    {{-- <div class="special-offer">

                                        <h2>Special Offers</h2>

                                        <ul>

                                            <li>

                                                <img src="img/m-1.png" alt="">

                                                <div class="offer-content">

                                                    <h4><a href="#" title="">R 2000 BOX WITH 12M ROYAL IPTV</a></h4>

                                                    <p class="offer-price"><span>£899.99</span> £849.99</p>

                                                </div>

                                            </li>

                                            <li>

                                                <img src="img/m-1.png" alt="">

                                                <div class="offer-content">

                                                    <h4><a href="#" title="">R 2000 BOX WITH 12M ROYAL IPTV</a></h4>

                                                    <p class="offer-price"><span>£899.99</span> £849.99</p>

                                                </div>

                                            </li>

                                            <li>

                                                <img src="img/m-1.png" alt="">

                                                <div class="offer-content">

                                                    <h4><a href="#" title="">R 2000 BOX WITH 12M ROYAL IPTV</a></h4>

                                                    <p class="offer-price"><span>£899.99</span> £849.99</p>

                                                </div>

                                            </li>

                                            <li>

                                                <img src="img/m-1.png" alt="">

                                                <div class="offer-content">

                                                    <h4><a href="#" title="">R 2000 BOX WITH 12M ROYAL IPTV</a></h4>

                                                    <p class="offer-price"><span>£899.99</span> £849.99</p>

                                                </div>

                                            </li>

                                        </ul>

                                        <br>

                                        <br>

                                        <br>

                                        <br>

                                        <br>

                                        <br>

                                        <br>

                                    </div> --}}







                                </div>

                            </div>

                        </div>

                        <div class="col-md-9">

                            <div class="content">

                                <div class="content-header no-margin-left">

                                    <h2>Devices</h2>

                                </div>

                                <div class="row">

                                     <div class="col-md-12">

                                         <div class="devices-content clearfix">







                                        @if(count($devices_products) > 0 )



                                            @foreach($devices_products as $device)

                                                <div class="col-md-4 col-sm-6 devices-item">

                                                    <span class="offer-sale">Sale!</span>

                                                    <a href="{{ route("productDetails" , $device->id) }}" class="item-img-link">

                                                     <img src="{!! asset("uploads/products/main/$device->main_image") !!}" alt="{!! $device->title !!}">

                                                     </a>

                                                     <h2>

                                                         <a href="{{ route("productDetails" , $device->id) }}" title="">{!! $device->title !!}



                                                            <br>{{  ucfirst($device->package->title)  }}

                                                         </a>

                                                     </h2>

                                                     {{-- <button type="button" class="btn btn-success btn-sm">Type &nbsp;<span class="badge">{{  ucfirst($device->package->title)  }}</span></button> --}}

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


                                            
                                                <a  class="add-to-cart-home"></i>Item added</a>


                                            @else




                                                 {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                                {!! Form::close() !!}



                                                <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();" class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a>
                                       



                                            @endif





                                        @else


                                             {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                                {!! Form::close() !!}



                                                <a style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();" class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a>    





                                        @endif








{{-- 
                                                       {!! Form::open(['route'=>['addItemToCartPages' , $device->id] , 'method'=>'POST' , 'id'=>"form_$device->id"]) !!}


                                                        {!! Form::close() !!}

                                                    <a  style="cursor: pointer;" onclick="document.getElementById('form_{{ $device->id }}').submit();" class="add-to-cart-home"><i class="fa fa-shopping-cart"></i> Add To cart</a> --}}

                                                </div>

                                            @endforeach





                                              <div class="clearfix"></div>

                                            {{-- <a href="#" title="" class="show-more">SHOW ME MORE</a> --}}



                                        @else

                                            

                                            <h3 class="text-center" style="margin: 25px;"> no devices added till now </h3>



                                        @endif

                                             

                                           

                                        </div>

                                     </div>

                                 </div><!-- End row -->

                            </div>

                        </div>

                    </div>

                </div><!-- End Wrapper content -->

            </div>





@endsection 







@section('scripts')



    <script>

        

        $(document).ready(function(){





        });





    </script>



@endsection







