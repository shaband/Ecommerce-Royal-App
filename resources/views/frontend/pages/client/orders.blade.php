@extends('frontend.template.app')





@section('page_title' , 'Client Orders')



@section('styles')
    
     {!! Html::style('assets/frontend/css/account.css') !!} 

    {!! Html::style('assets/frontend/css/checkout.css') !!} 


@endsection



@section('content') 





	

	 <div class="wrapper-content">

        <div class="container">

            <div class="row">

                <div class="col-md-12 header-top-bunner">

                    <img src="{{  asset("assets/frontend/img/account-bunner.png") }}" alt="client profile image header">

                </div>

                <div class="clearfix"></div>

                <div class="col-12 text-center header-myaccount">

                    <h1>Orders</h1>

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

                       		   

                       		  



                       		     

                        <h3 class="title-dash">Your Orders</h3>

                        <div class="col-12 notice-dash">

                            <p>

                               Below are listing of your orders with payment statuses , you can click to show order details also 

                            </p>

                        </div>







                        @if(Session::has('payment_success'))

                             

                                <div class="alert alert-success alert-dismissible" >

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <i class="fa fa-smile-o fa-1x" aria-hidden="true"></i>

                                    <strong>Congrats !</strong> {!! Session::get('payment_success') !!}

                                    

                                </div>

                           

                        @endif



                        <div class="col-sm-12 col-xs-12 pull-left Payment-form">

                                        

                                       

                                            <div class="table-responsive">

                                                <table class="table">

                                                    <thead>

                                                        <tr>

                                                            <th>Order Ticket</th>


                                                            <th>Order Total</th>

                                                            <th>Payment Status</th>

                                                         

                                                            <th>Actions</th>



                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                    

                                                    @foreach($orders as $order)

                                                       


 
                                                        <tr>

                                                            <td>{!! $order->order_ticket !!}</td>

                                                            <td>{!! '<code>'.$order->order_total.'</code>' !!} SAR</td>

                                                            <td>{!! ucfirst($order->payment_status) !!}</td>


                                                            <td>
                                                                <a href="{!! asset("orders.jpg") !!}" data-lightbox="4" 
                                                                data-title='
                                                                <div class="table-responsive">




                                                                <table class="table">

                                                                    <thead>

                                                                        <tr>

                                                                            <th>Product title</th>
                                                                            <th>Product price</th>
                                                                            <th>Quantity ordered</th>
 

                                                                        </tr>

                                                                    </thead>

                                                                    <tbody>

                                                                        @if(count($order->orderProduct) > 0 )

                                                                            @foreach( $order->orderProduct as $order_product)
                                                                            
                                                                            <tr>
                                                                                <td>{!! $order_product->product->title !!}</td>
                                                                                <td><code>{!! $order_product->product->price !!}</code> SAR</td>
                                                                                <td>{!! $order_product->quantity !!}</td>
                                                                            </tr>

                                                                            @endforeach

                                                                            

                                                                        @endif

                                                                            
                                                                       

                                                                    </tbody>

                                                                </table>

                                                            </div>


                                                                ' >
                                                                <i style="cursor: pointer;" class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="See in details" 
                                                               
                                                                ></i>
                                                                </a>

                                                            </td>

                                                            {{--  @foreach($order->orderProduct->product as $product)

                                                            <td>{!! $product->title !!}</td>

                                                            <td>{!! $product->orderProduct->quantity !!}</td>

                                                            <td>{!! sprintf('%0.2f' , $product->price ) !!} S.R</td>

                                                             @endforeach --}}

                                                        </tr>

                                                       


                                                    @endforeach



                                                    </tbody>

                                                </table>

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

    @if(Session::has('payment_success'))



                    new PNotify({

                        title: 'Payment Notification',

                        text: '{!! Session::get('payment_success') !!}',

                        icon: 'fa fa-bell-o fa-2x'

                    });





                    var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');

                    sound.loop = false;

                    sound.play(); 


    @endif


    </script>


@endsection 