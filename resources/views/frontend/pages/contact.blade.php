@extends('frontend.template.app')


@section('page_title' , 'Contact Page')



@section('styles')
    

    {{-- <link rel="stylesheet" href="css/devices.css"> --}}
    {!! Html::style('assets/frontend/css/contact.css') !!}

 
@endsection


@section('content')

     

     <div class="wrapper-content">
                <div class="container">
                    <div class="contact-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="text-center">Contact Us</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 clearfix">
                                <h2>Map Adress: </h2>
                                <p class="small-size">Egypt, Cairo, naser city </p>
                                <h2>Geo Location: </h2>
                                <div class="col-sm-12 iframe-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13813.242678659357!2d31.32135283828926!3d30.056628182387744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e5d94c66301%3A0xddddf100de42206c!2sNasr+City%2C+Al+Manteqah+Al+Oula%2C+Nasr+City%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1520870504496" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                       {{--  <div class="row address">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <h2>Your Store</h2>
                                <p>Address 1</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <h2>Telephone</h2>
                                <p>123456789999</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <h2>Fax</h2>
                                <p>123456789999</p>
                            </div>
                        </div> --}}
                        <div class="form-contact">
                            <div class="form-contact-header">
                                <h2>Contact Form</h2>
                            </div>

                            {!! Form::open(['route'=>'post_contact' , 'POST']) !!}
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="email"><span>*</span> Email </label>
                                    <input class="form-control" required type="text" id="email" name="email" value="" placeholder="">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="name"><span>*</span> Name</label>
                                    <input class="form-control" required type="text" id="name" name="name" value="" placeholder="">
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label for="text"><span>*</span> Message</label>
                                    <textarea name="message" required id="text" class="form-control"></textarea>
                                </div>
                                <input type="submit" name="" value="Submit" class="submit">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

@endsection 



@section('scripts')

        @if(Session::has('contact_saved'))





        <script>
            
                
            new PNotify({
                title: 'Contact Sent',
                text: 'we are glad to inform you that  your Contact message has been sent  successfully',
                icon: 'fa fa-bell-o fa-2x'
            });


            var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
            sound.loop = false;
            sound.play();
 
        </script>

 


     @endif


@endsection



