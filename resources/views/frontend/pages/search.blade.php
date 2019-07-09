@extends('frontend.template.app')





@section('page_title' , 'Search Results')







@section('styles')

    


 

    {!! Html::style('assets/frontend/css/devices.css') !!}





@endsection





@section('content')



   <div class="container">
        <div class="wrapper-content">
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="sidebar">
                        <div class="content-header border-r">
                            <h2>Product Filters</h2>
                        </div>
                        <div class="sidebar-content">
                            <div class="product-filter">
                                <a href="#" title="" class="active">Default sorting</a>
                                <a href="#" title="">Sorty by popularity</a>
                                <a href="#" title="">Sorty by average rating</a>
                                <a href="#" title="">Sorty by newness</a>
                                <a href="#" title="">Sorty by price: low to high</a>
                                <a href="#" title="">Sorty by price: high to low</a>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="content">
                        <div class="content-header no-margin-left">
                            <h2>Your Search Results</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="devices-content clearfix">
                                    

                                	@if(count($products) > 0 )


                                		@foreach($products as $product)

		                                    <div class="col-md-3 col-sm-4">
		                                    	<a href="{!! asset("uploads/products/main/$product->main_image") !!}" class="fresco">
		                                        <img src="{!! asset("uploads/products/main/$product->main_image") !!}" alt="">
		                                    	</a>
		                                        <h2>
		                                            <a href="{!! route("productDetails" , $product->id ) !!}" title="{!! $product->title !!}">{!! $product->title !!}</a>
		                                        </h2>
		                                         @if($product->discount)

		                                            <p class="decoration">
		                                                <span> {{ $product->price }}  S.R</span> 
		                                                 	{{ $product->discount }} % OFF 
		                                            </p>
		                                             <p>{!! $product->price - (( $product->price  * $product->discount ) / 100 ) !!} S.R </p> 
                                         		@else 

                                            		<p>{{ $product->price }} S.R </p> 

                                         		@endif

		                                    </div>

	                                    @endforeach


                                    @else

                                    	<div class="alert alert-warning alert-dismissible text-center">

                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                            <strong>Hmmmm , </strong> Sorry we couldn't find any search result with this query : {!! $query !!}

                                             

                                        </div>

                                    @endif
                                    
                                  
                                    
                                    
                                    <div class="clearfix"></div>
                                    {{-- <a href="#" title="" class="show-more">SHOW ME MORE</a> --}}
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







