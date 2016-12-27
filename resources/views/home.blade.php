@extends('layouts.default')

@section('content')

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/bg/mapi-3.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3 class="grey-text text-darken-2 text-50">A <b>BETTER</b> WAY TO TRAVEL TO PERU</h3>
                    <h5 class="light grey-text text-darken-3">$150 average saving | 24/7 local authentic assitance | 100s of testimonials</h5>
                    
                    <div class="row margin-top-50 font-moserrat">
                        <div class="col s12 m8 offset-m2 l3 offset-l6">
                            <a href="" class="waves-effect">
                            <p class="yellow-text text-darken-3 grey darken-4">ALL INCLUDED</p>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/transfers.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/entrances.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/breakfast.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/assistances.png')}}" alt="" class="responsive-img">
                            </div>
                            <div class="col s3">
                                <img src="{{asset('img/icons//include/flight.png')}}" alt="" class="responsive-img">
                            </div>

                            <div class="col s12 text-20 white-text">
                                from New York <span class="yellow-text text-darken-3">5 DAYS</span> $1699
                            </div>
                            </a>
                        </div>
                        {{--<a class="waves-effect waves-light btn lime darken-4">Travel Packages</a>--}}
                        {{--<a class="waves-effect waves-light btn grey darken-4">Design Your Trip</a>--}}
                    </div>
                </div>
            </li>
            {{--<li>--}}
                {{--<img src="{{asset('img/bg/cusco-1.jpg')}}"> <!-- random image -->--}}
                {{--<div class="caption center-align">--}}
                    {{--<h3>Left Aligned Caption</h3>--}}
                    {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->--}}
            {{--<div class="caption right-align">--}}
            {{--<h3>Right Aligned Caption</h3>--}}
            {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->--}}
            {{--<div class="caption center-align">--}}
            {{--<h3>This is our big Tagline!</h3>--}}
            {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
            {{--</div>--}}
            {{--</li>--}}
        </ul>
    </div>
    <section class="spacer-10">
        <div class="row no-margin">
            <div class="col s1">
                <img src="{{asset('img/logos/apavit.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/apotur.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/asta.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/expedia.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/facebook.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/meetup.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/new.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/peru.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/prom-peru.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/tripadvisor.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/yelp.png')}}" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="{{asset('img/logos/youtube.png')}}" alt="" class="responsive-img">
            </div>
        </div>
    </section>


    <div class="parallax-container parallax-container-1">
        <div class="parallax">
            <img src="{{asset('img/bg/meetup3.jpg')}}" alt="">
        </div>
    </div>


    <div class="container">
        <div class="section">
            <div class="row center">
                <h4 class="yellow-text text-darken-4">ALL <b>INCLUDED</b></h4>
                <p class="lime-text text-darken-4 font-moserrat text-20 no-margin">MACHUPICCHU TOURS WITH AIR FROM US</p>
                <p class="grey-text text-darken-4 text-20 no-margin">DOOR TO DOOR, Including a $50 <img src="{{asset('img/icons/uber.png')}}" width="30" alt=""> Credit</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center margin-bottom-30">
                    <h3 class="grey-text text-darken-2 no-margin">7 DAYS</h3>
                    <p class="yellow-text text-darken-3 font-moserrat text-25 no-margin">LIMA, CUSCO, SACRED VALLEY, MACHU PICCHU</p>
                </div>
                <div class="row margin-bottom-30">
                    <div class="col s6">
                        <p class="text-25 no-margin grey-text text-darken-1">TRAVEL OUTLINE</p>
                        <ul class="text-20">
                            <li><b>Day 1:</b> Flight from US to Peru</li>
                            <li><b>Day 2:</b> Flight from US to Peru</li>
                            <li><b>Day 3:</b> Flight from US to Peru</li>
                            <li><b>Day 4:</b> Flight from US to Peru</li>
                            <li><b>Day 5:</b> Flight from US to Peru</li>
                            <li><b>Day 6:</b> Flight from US to Peru</li>
                            <li><b>Day 7:</b> Flight from US to Peru</li>
                        </ul>
                    </div>
                    <div class="col s6">
                        <img src="{{asset('img/maps/GTP600.jpg')}}" alt="" class="responsive-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> NEW YORK</p>
                            <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin">Small group</p>
                            <p class="no-margin">Tourist to Superior</p>
                            <ul class="font-moserrat">

                                <li class="text-14 margin-bottom-10">
                                    <form action="{{route('home_show_date_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'6-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        <input type="hidden" value="1599" name="txt_price">
                                        January 21, 2017 <span class="blue-text">$1499</span>
                                        <input type="submit" class="btn" value="BOOK">
                                    </form>
                                </li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> MIAMI</p>
                            <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin">Small group</p>
                            <p class="no-margin">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> LOS ANGELES</p>
                            <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin">Small group</p>
                            <p class="no-margin">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="" class="btn"> BOOK</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    {{--<div class="parallax-container parallax-container-1">--}}
        {{--<div class="parallax"><img src="{{asset('img/bg/we-care.jpg')}}"></div>--}}
        {{--<div class="container">--}}
            {{--<div class="row valign-wrapper margin-top-10">--}}
                {{--<div class="col s4">--}}
                    {{--<div class="card-panel hoverable lime darken-4">--}}
                        {{--<h5 class="white-text">Social <b>Responsability</b></h5>--}}
                        {{--<p>Giving back to our hometown communities!</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col s4 center">--}}
                    {{--<h4 class="white-text"><b>WE CARE</b></h4>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<div class="card-panel hoverable white">--}}
                        {{--<h5>HEY, WE'RE <b>GOTOPERU</b></h5>--}}
                        {{--<p>Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>--}}
                        {{--<h5>We enjoy what we do</h5>--}}
                        {{--<p>Service, expertise, community and fun are our core GOTOPERU values! We enjoy designing, organizing and operating unforgettable Peru Vacations: we are very proud to show daily the best of our country!</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}



    <div class="container hide">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m6 margin-top-15">
                    <img src="{{asset('img/banners/slider-peru-rail.jpg')}}" alt="" class="responsive-img">
                    <p class="center-align text-10">READ ABOUT US IN</p>
                    <div class="col s8 offset-s2">
                        <div class="col s4">
                            <img src="{{asset('img/logos/prom-peru.png')}}" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="{{asset('img/logos/expedia.png')}}" alt=""  class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="{{asset('img/logos/tripadvisor.png')}}" alt="" class="responsive-img">
                        </div>
                    </div>
                </div>
                {{--<div class="col s12 m6 hide">--}}
                    {{--<img src="http://gotoperu.travel/img/logos/trip-choice.png" alt="" class="responsive-img">--}}
                {{--</div>--}}
                <div class="col s12 m6">
                    <h5>HEY, WE'RE <b>GOTOPERU</b></h5>
                    <p>Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>
                    <h5>We enjoy what we do</h5>
                    <p>Service, expertise, community and fun are our core GOTOPERU values! We enjoy designing, organizing and operating unforgettable Peru Vacations: we are very proud to show daily the best of our country!</p>
                </div>

            </div>

        </div>
    </div>



    <div class="container hide">
        <div class="section">

            <div class="row center">

                <h4>DISCOVER LIMA AND <b>MACHU PICCHU</b></h4>
            </div>

            <div class="row">
                <div class="col s6 position-relative">
                    {{--<h2 class="header col s12 left-align"><strong>6 DAYS</strong></h2>--}}
                    {{--<p class="yellow-text text-darken-3 text-20">Destinations: Lima, Cusco, Sacred Valley, Machu Picchu</p>--}}
                    <img src="{{asset('img/banners/discover.jpg')}}" alt="" class="responsive-img">
                    <div class="box-circle-absolute">
                        <div class="text-circle">
                            <p><i class="material-icons text-40">location_on</i></p>
                            <p>Destinations <span class="text-12">Lima, Cusco, Machu Picchu, Sacred Valley</span></p>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    {{--<div class="card-panel hoverable">--}}
                    {{--<img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img">--}}
                    {{--</div>--}}


                    <div class="card card-packages no-margin">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#!"><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                            <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-content no-padding">
                            <div class="row no-margin">
                                {{--only tours--}}
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light grey darken-2 white-text padding-5">
                                            <div><i class="material-icons">camera_alt</i></div>
                                            <div>Only Tours</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light grey darken-1 white-text padding-5">
                                            <div><i class="material-icons">attach_money</i></div>
                                            <div>699</div>
                                        </a>
                                    </div>
                                </div>

                                {{-- T & H--}}
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light grey darken-4 white-text padding-5">
                                            <div>
                                                <i class="material-icons">camera_alt</i>
                                                <i class="material-icons">hotel</i>
                                            </div>
                                            <div>Tours &amp; Hotels</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light grey darken-3 white-text padding-5">
                                            <div><i class="material-icons">attach_money</i></div>
                                            <div>899</div>
                                        </a>
                                    </div>
                                </div>

                                {{--Internal F--}}
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light  lime darken-4 white-text padding-5">
                                            <div>
                                                <i class="material-icons">camera_alt</i>
                                                <i class="material-icons">hotel</i>
                                                <i class="material-icons">airplanemode_active</i>
                                            </div>
                                            <div>With Internal Flights</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light  lime darken-3 white-text padding-5">
                                            <div><i class="material-icons">attach_money</i></div>
                                            <div>1498</div>
                                        </a>
                                    </div>
                                </div>

                                {{-- International F--}}
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light yellow darken-3 white-text padding-5">
                                            <div>
                                                <i class="material-icons">camera_alt</i>
                                                <i class="material-icons">hotel</i>
                                                <i class="material-icons">airplanemode_active</i>
                                            </div>
                                            <div class="truncate">With International Flights</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col s6 no-padding">
                                    <div class="center">
                                        <a href="" class="waves-effect waves-light amber darken-1 white-text padding-5">
                                            <div><i class="material-icons">attach_money</i></div>
                                            <div>1599</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">DISCOVER LIMA AND MACHU PICCHU<i class="material-icons right">close</i></span>
                            <p>Paquete configurable</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>





    <div class="parallax-container parallax-container-2">
        <div class="section">
            <div class="container">
                <div class="row margin-bottom-20">

                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4>GROUND <b>PACKAGES</b></h4>
                        {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                    </div>

                    <div class="col s12 m8 offset-m2 l9 offset-l2 include-services margin-bottom-10">
                        <ul class="list-services">
                            <li><img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img"><span>Hotels</span></li>
                            <li><img src="{{asset('img/icons//include/transfers.png')}}" alt="" class="responsive-img"><span>Transfers</span></li>
                            <li><img src="{{asset('img/icons//include/entrances.png')}}" alt="" class="responsive-img"><span>Entrances</span></li>
                            <li><img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img"><span>Trains</span></li>
                            <li><img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img"><span>Tours</span></li>
                            <li><img src="{{asset('img/icons//include/breakfast.png')}}" alt="" class="responsive-img"><span>Breakfast</span></li>
                            <li><img src="{{asset('img/icons//include/assistances.png')}}" alt="" class="responsive-img"><span>Assistances</span></li>

                        </ul>
                    </div>

                    <div class="customNavigation center">
                        <a class="btn prev"><i class="material-icons left">arrow_back</i> Previous</a>
                        <a class="btn next"><i class="material-icons right">arrow_forward</i>Next</a>
                    </div>
                    <div id="owl-demo" class="owl-carousel">

                        @foreach($paquete as $paquetes)
                            <div class="item">
                                <div class="col s12">

                                    <div class="card card-packages">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                            <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                        </div>

                                        <div class="card-content">
                                            <div class="">
                                                <h2 class="text-16 no-margin"><b>{{$paquetes->codigo}}: {{$paquetes->titulo}}</b></h2>
                                            </div>
                                            <div class="spacer-20">
                                                <p class="lime-text text-darken-4">
                                                    @foreach($paquetes->paquetes_destinos as $destino)
                                                        {{ucwords(strtolower($destino->destinos->nombre))}}
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="margin-bottom-10">
                                                @foreach($paquetes->precio_paquetes as $precio)
                                                    @if($precio->estrellas == 2)
                                                        <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">{{$paquetes->duracion}} days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span></h4>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row no-margin valign-wrapper">
                                                <div class="col s2">
                                                    <a href="" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Add my wishlist"><i class="material-icons valign small">favorite</i></a>
                                                </div>
                                                <div class="col s10">
                                                    <a class="waves-effect waves-light btn yellow darken-3"><i class="material-icons right">send</i>View Trip</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <a href="" class="font-moserrat valign-wrapper right">View All Programs <i class="material-icons">input</i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="Unsplashed background img 3"></div>
    </div>




    <div class="parallax-container parallax-container-2 hide">
        <div class="section">
            <div class="container">
                <div class="row margin-bottom-20">

                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4>GROUND PACKAGES + <b>FLIGHTS</b></h4>
                        {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                    </div>

                    <div class="col s12 m9 offset-m2 l12 offset-l1 include-services margin-bottom-10">
                        <ul class="list-services">
                            <li><img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img"><span>Hotels</span></li>
                            <li><img src="{{asset('img/icons//include/transfers.png')}}" alt="" class="responsive-img"><span>Transfers</span></li>
                            <li><img src="{{asset('img/icons//include/entrances.png')}}" alt="" class="responsive-img"><span>Entrances</span></li>
                            <li><img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img"><span>Trains</span></li>
                            <li><img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img"><span>Tours</span></li>
                            <li><img src="{{asset('img/icons//include/breakfast.png')}}" alt="" class="responsive-img"><span>Breakfast</span></li>
                            <li><img src="{{asset('img/icons//include/assistances.png')}}" alt="" class="responsive-img"><span>Assistances</span></li>
                            <li class="center"><i class="material-icons">add</i></li>
                            <li><img src="{{asset('img/icons//include/flight.png')}}" alt="" class="responsive-img"><span>Flights</span></li>

                        </ul>
                    </div>

                    <div class="customNavigation center">
                        <a class="btn prev"><i class="material-icons left">arrow_back</i> Previous</a>
                        <a class="btn next"><i class="material-icons right">arrow_forward</i>Next</a>
                    </div>
                    <div id="owl-demo2" class="owl-carousel">

                        @foreach($paquete as $paquetef)
                            <div class="item">
                                <div class="col s12">

                                    <div class="card card-packages">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                            <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                        </div>

                                        <div class="card-content">
                                            <div class="">
                                                <h2 class="text-16 no-margin"><b>{{$paquetef->codigo}}: {{$paquetef->titulo}}</b></h2>
                                            </div>
                                            <div class="spacer-20">
                                                <p class="lime-text text-darken-4">
                                                    @foreach($paquetef->paquetes_destinos as $destino)
                                                        {{ucwords(strtolower($destino->destinos->nombre))}}
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="margin-bottom-10">
                                                @foreach($paquetef->precio_paquetes as $precio)
                                                    @if($precio->estrellas == 2)
                                                        <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">{{$paquetef->duracion}} days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span></h4>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row no-margin valign-wrapper">
                                                <div class="col s2">
                                                    <a href="" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Add my wishlist"><i class="material-icons valign small">favorite</i></a>
                                                </div>
                                                <div class="col s10">
                                                    <a class="waves-effect waves-light btn yellow darken-3"><i class="material-icons right">send</i>View Trip</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <a href="" class="font-moserrat valign-wrapper right">View All Programs <i class="material-icons">input</i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="Unsplashed background img 3"></div>
    </div>


    <div class="container">
        <div class="section font-moserrat">
            <div class="row">
                <p class="yellow-text text-darken-4 text-20">BY CATEGORY</p>
            </div>
            <div class="row">
                <div class="col s3 valign-wrapper">
                    <a href="" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/trekking.png')}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                ADVENTURE
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/family.png')}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                FAMILY
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/classic.png')}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                CLASSIC
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/human.png')}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                LUXURY
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a href="" class="font-moserrat valign-wrapper right">View All Category <i class="material-icons">input</i></a>
                </div>
            </div>


            <div class="row">
                <p class="yellow-text text-darken-4 text-20">BY DAYS</p>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="pagination">
                        <li class="waves-effect"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!">6</a></li>
                        <li class="waves-effect"><a href="#!">7</a></li>
                        <li class="waves-effect"><a href="#!">8</a></li>
                        <li class="waves-effect"><a href="#!">9</a></li>
                        <li class="waves-effect"><a href="#!">10</a></li>
                        <li class="waves-effect"><a href="#!">11</a></li>
                        <li class="waves-effect"><a href="#!">12</a></li>
                        <li class="waves-effect"><a href="#!">13</a></li>
                        <li class="waves-effect"><a href="#!">14</a></li>
                        <li class="waves-effect"><a href="#!">15</a></li>
                        <li class="waves-effect active"><a href="#!">16+</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a href="" class="font-moserrat valign-wrapper right">View All Durations<i class="material-icons">input</i></a>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="container">--}}
        {{--<div class="section">--}}
            {{--<div class="row center">--}}
                {{--<img src="{{asset('img/icons/uber.png')}}" alt="">--}}
                {{--<h4>DOOR TO DOOR, Including a <b>$50 UBER</b> Credit</h4>--}}
            {{--</div>--}}

            {{--<div class="row" id="demo">--}}

                {{--@foreach($featured as $featured)--}}
                    {{--<div class="col s6 font-moserrat">--}}
                        {{--<div class="card horizontal">--}}
                            {{--<div class="card-image waves-effect waves-block waves-light">--}}
                                {{--<img class="activator" src="{{asset('img/descarga.jpg')}}">--}}
                            {{--</div>--}}
                            {{--<div class="card-stacked">--}}
                                {{--<div class="card-content center include-services box-door">--}}
                                    {{--<h5 class="card-title activator yellow-text text-darken-3 center no-margin">{{$featured->duracion}} DAYS<i class="material-icons right-absolute-card">more_vert</i></h5>--}}
                                    {{--<p><b>FROM MIAMI</b></p>--}}
                                    {{--<p class="text-13">ALL INCLUDED!</p>--}}
                                    {{--<ul class="list-services uber">--}}
                                        {{--<li><img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/transfers.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/entrances.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/breakfast.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/assistances.png')}}" alt="" class="responsive-img"></li>--}}
                                        {{--<li><img src="{{asset('img/icons//include/flight.png')}}" alt="" class="responsive-img"></li>--}}

                                    {{--</ul>--}}
                                    {{--<div class="divider spacer-margin-10"></div>--}}
                                    {{--<p class="text-30 yellow-text text-darken-3">$6000</p>--}}
                                    {{--<p><b>4 TRAVELERS</b></p>--}}
                                    {{--<p class="grey-text">6 Members: $8,000</p>--}}
                                    {{--<p class="grey-text">8 Members: $10,000</p>--}}
                                    {{--<div class="divider margin-top-20 margin-bottom-10"></div>--}}
                                    {{--<a href="" class="waves-effect waves-light btn yellow darken-3">Inquire Now</a>--}}
                                {{--</div>--}}
                                {{--<div class="card-content center">--}}
                                    {{--<h5 class="card-title activator grey-text text-darken-4 center">{{$featured->titulo}}<i class="material-icons right-absolute-card">more_vert</i></h5>--}}
                                    {{--<div class="divider spacer-margin-20"></div>--}}
                                    {{--<p>{{$featured->descripcion}}</p>--}}
                                    {{--<div class="divider margin-top-20 margin-bottom-30"></div>--}}
                                    {{--<a href="" class="waves-effect waves-light btn yellow darken-3">Inquire Now</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="card-reveal">--}}
                                {{--<span class="card-title grey-text text-darken-4"><b class="yellow-text text-darken-3">{{$featured->titulo}}</b> <i class="material-icons right-absolute-card">close</i></span>--}}
                                {{--<p><b class="grey-text text-darken-2">Duration:</b> {{$featured->duracion}} DAYS / {{$featured->duracion-1}} NIGHTS</p>--}}
                                {{--<p><b class="grey-text text-darken-2">Price:</b> Precio basado en doble acomodacion</p>--}}


                                {{--@foreach($featured->precio_paquetes as $precio)--}}
                                    {{--<p class="valign-wrapper">--}}
                                        {{--<i class="material-icons yellow-text text-darken-3">play_arrow</i>--}}
                                        {{--<b class="grey-text text-darken-2"> {{$precio->estrellas}} estrellas: </b> <span class="spacer-m-10">${{$precio->precio_d}}</span>--}}
                                    {{--</p>--}}
                                {{--@endforeach--}}

                                {{--<p><b class="grey-text text-darken-2">Destinos:</b>--}}
                                    {{--@foreach($featured->paquetes_destinos as $destino)--}}
                                        {{--{{ucwords(strtolower($destino->destinos->nombre))}} /--}}
                                    {{--@endforeach--}}
                                 {{--</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="row testimonials-box">
        <img src="{{asset('img/banners/banner_1.jpg')}}" alt="" class="responsive-img">
        <div class="col s5 testimonials-box-text margin-top-40">
            <i class="material-icons right white-text">format_quote</i>
            <h5 class="white-text margin-top-80">Everything about this trip was wonderful and it was because of the service and attention of the great staff at GOTOPERU</h5>
            <p class="white-text right-align">ennifer Powers & Family New York - USA</p>
            <a href="" class="btn waves-effect right">View all testimonials</a>
        </div>
    </div>


    <div class="container">
        <div class="section">
            <div class="row center">
                <h4>Design Your <b>TRIP</b></h4>
            </div>
        </div>
    </div>

    <div class="margin-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">SELECT <b>DESTINATIONS</b></h5>
                    <h6 class="font-moserrat text-18 red-text text-darken-4 center">PERU</h6>
                    <div class="divider"></div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/machupicchu-2.jpg')}}" id="img_filter_cusco">
                            <span class="card-title">
                                <input type="checkbox" id="cusco" onchange="javascript:imgfilter('cusco')" class="yellow-text"/>
                                <label for="cusco">Cusco & Machupicchu</label>
                            </span>
                            <div id="check_i_cusco" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/ballestas.jpg')}}" id="img_filter_ballestas">
                            <span class="card-title">
                                <input type="checkbox" id="ballestas" onchange="javascript:imgfilter('ballestas')"/>
                                <label for="ballestas">Ballestas Island & Paracas</label>
                            </span>
                            <div id="check_i_ballestas" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/colca.jpg')}}" id="img_filter_arequipa">
                            <span class="card-title">
                                <input type="checkbox" id="arequipa" onchange="javascript:imgfilter('arequipa')"/>
                                <label for="arequipa">Arequipa & Colca Canyon</label>
                            </span>
                            <div id="check_i_arequipa" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/amazon.jpg')}}" id="img_filter_amazon">
                            <span class="card-title">
                                <input type="checkbox" id="amazon" onchange="javascript:imgfilter('amazon')"/>
                                <label for="amazon">Amazon</label>
                            </span>
                            <div id="check_i_amazon" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/lima.jpg')}}" id="img_filter_lima">
                            <span class="card-title">
                                <input type="checkbox" id="lima" onchange="javascript:imgfilter('lima')"/>
                                <label for="lima">Lima</label>
                            </span>
                            <div id="check_i_lima" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/nazca.jpg')}}" id="img_filter_nazca">
                            <span class="card-title">
                                <input type="checkbox" id="nazca" onchange="javascript:imgfilter('nazca')"/>
                                <label for="nazca">Nazca Lines</label>
                            </span>
                            <div id="check_i_nazca" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/puno.jpg')}}" id="img_filter_puno">
                            <span class="card-title">
                                <input type="checkbox" id="puno" onchange="javascript:imgfilter('puno')"/>
                                <label for="puno">Puno & Titicaca</label>
                            </span>
                            <div id="check_i_puno" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/trujillo.jpg')}}" id="img_filter_trujillo">
                            <span class="card-title">
                                <input type="checkbox" id="trujillo" onchange="javascript:imgfilter('trujillo')"/>
                                <label for="trujillo">Trujillo &amp; Chiclayo</label>
                            </span>
                            <div id="check_i_trujillo" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h6 class="font-moserrat text-18 red-text text-darken-4 center">MULTICOUNTRIES</h6>
                    <div class="divider"></div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/galapagos.jpg')}}" id="img_filter_galapagos">
                            <span class="card-title">
                                <input type="checkbox" id="galapagos" onchange="javascript:imgfilter('galapagos')"/>
                                <label for="galapagos">Galapagos (Ecuador)</label>
                            </span>
                            <div id="check_i_galapagos" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/rio.jpg')}}" id="img_filter_rio">
                            <span class="card-title">
                                <input type="checkbox" id="rio" onchange="javascript:imgfilter('rio')"/>
                                <label for="rio">Rio &amp; Iguazu (Brasil)</label>
                            </span>
                            <div id="check_i_rio" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/patagonia.jpg')}}" id="img_filter_buenos">
                            <span class="card-title">
                                <input type="checkbox" id="buenos" onchange="javascript:imgfilter('buenos')"/>
                                <label for="buenos">Buenos Aires (Argentina)</label>
                            </span>
                            <div id="check_i_buenos" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/uyuni.jpg')}}" id="img_filter_uyuni">
                            <span class="card-title">
                                <input type="checkbox" id="uyuni" onchange="javascript:imgfilter('uyuni')"/>
                                <label for="uyuni">Uyuni (Bolivia)</label>
                            </span>
                            <div id="check_i_uyuni" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">HOTEL <b>CATEGORY</b></h5>
                    <p class="font-moserrat">(<span class="red-text darken-4">Optional</span> you may choose more than one)</p>
                </div>
            </div>

            <div class="row form-optional-check">
                <div class="col s3">
                    <input type="checkbox" class="filled-in" id="luxury" />
                    <label for="luxury" class="hoverable">Luxury 5 Stars</label>
                </div>
                <div class="col s3">
                    <input type="checkbox" class="filled-in" id="superior" />
                    <label for="superior" class="hoverable">Superior 4 Stars</label>
                </div>
                <div class="col s3">
                    <input type="checkbox" class="filled-in" id="best" />
                    <label for="best" class="hoverable">Best Value 3 Stars</label>
                </div>
                <div class="col s3">
                    <input type="checkbox" class="filled-in" id="budget" />
                    <label for="budget" class="hoverable">Budget 2 Stars</label>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">Trip  <b>length</b></h5>
                    <p class="font-moserrat">Cuanto tiempo desea que sea su viaje</p>
                </div>
            </div>

            <div class="row form-optional-check">
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="3d" />
                    <label for="3d" class="hoverable">03 - 05 <span>DAYS</span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="6d" />
                    <label for="6d" class="hoverable">06 - 08 <span>DAYS</span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="9d" />
                    <label for="9d" class="hoverable">09 - 11 <span>DAYS</span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="12d" />
                    <label for="12d" class="hoverable">12 - 15 <span>DAYS</span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="16d" />
                    <label for="16d" class="hoverable">16+ <span>DAYS</span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="unknow" />
                    <label for="unknow" class="hoverable">UNKNOW</label>
                </div>
            </div>


            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">NUMBER OF <b>TRAVELERS</b></h5>
                    <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
                </div>
            </div>

            <div class="row form-check-travelers">
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="1p" />
                    <label for="1p" class="hoverable">1 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="2p" />
                    <label for="2p" class="hoverable">2 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="3p" />
                    <label for="3p" class="hoverable">3 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="4p" />
                    <label for="4p" class="hoverable">4 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="5p" />
                    <label for="5p" class="hoverable">5+ <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s2">
                    <input type="checkbox" class="filled-in" id="undecided" />
                    <label for="undecided" class="hoverable text-14">UNDECIDED</label>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">PERSONAL <b>INFORMATION</b></h5>
                    <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
                </div>
            </div>


            <div class="row form-design">
                <div class="col s6">
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Name</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">mail</i>
                        <input id="email" type="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">phone</i>
                        <input id="icon_telephone" type="tel" class="validate">
                        <label for="icon_telephone">Telephone</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">date_range</i>
                        <input id="last_name" type="date" class="datepicker">
                        <label for="last_name">Travel Date</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Comentarios</label>
                    </div>
                </div>

                <div class="col s6">
                    <img src="{{asset('img/why/team-travel.jpg')}}" alt="" class="responsive-img">
                    <div class="col s4">
                        <img src="{{asset('img/logos/prom-peru.png')}}" alt="" class="responsive-img">
                    </div>
                    <div class="col s8">
                        <p>Our Local representatives will receive and send you the first travel plan "A" in less than 24 hours.</p>
                        <p>And based on your important feedback we will customize a new plan B, C ... until we design together a dream vacations!</p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col s12 center">
                    <a href="" class="waves-effect waves-light btn-large"><i class="material-icons right">send</i> Submit</a>
                </div>
            </div>

        </div>
        {{--<div class="container">--}}
        {{----}}
        {{--</div>--}}
    </div>

    <div class="row">


                        <div id="sync1" class="owl-carousel">
                            <div class="item"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>

                        </div>

                        <div id="sync2" class="owl-carousel">
                            <div class="item"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
                            <div class="item"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>
                        </div>


    </div>

    <div class="container margin-top-40 margin-bottom-40">
        <div class="section">
            <div class="row center">
                <h4>THERE'S AN AMAZING <b>"LOST CITY"</b> OUT THERE</h4>
                <p>Closer than you think: 8 hours from New York or Los Angeles!</p>
            </div>
            <div class="row">
                <div class="col s5">
                    <h5 class="margin-top-40">WE ARE ONE PERU´S LEADING GROUP TRAVEL PROVIDERS : GOTOPERU</h5>
                    <p>A local company with local knowledge, expertise and resources, specializing in the design of unforgettable vacations. Our unique activities, Peru tours & excursions, Peru hotel deals, transportation and program logistics make us Peru leading travel experts. GOTOPERU offer you every kind of travel services you need; ranging from all inclusive Peru travel packages, accommodations, and entertainment and leisure activities. In addition offering different types of travel products like "Online-Booking" and personal "Custom-made Trips"</p>
                </div>
                <div class="col s7">
                    <div class="content-video-1">
                        <img src="{{asset('img/prom-peru.jpg')}}" alt="video" class="responsive-img">

                        <div class="content-video-btn-1">
                            <a href="https://player.vimeo.com/video/102732914?title=0&amp;byline=0&amp;portrait=0&amp;color=11b1c2&amp;wmode=opaque"  class="html5lightbox content-vbtn-color-blue" data-width="570" data-height="320" title="title here "><i class="material-icons">play_circle_filled</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="section">
            <div class="row center">
                <h4>WHY <b>GOTOPERU</b></h4>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
    {{--<div class="section">--}}
    {{--<div class="row">--}}
    {{--<div class="col s6">--}}
    {{--<h5 class="center">CONTACT OUR TRAVEL ADVISOR</h5>--}}
    {{--<div class="divider margin-bottom-10"></div>--}}
    {{--<img src="{{asset('img/team-travel.jpg')}}" alt="" class="responsive-img hoverable">--}}
    {{--<h6><b>LETS CREATE TOGETHER A DREAM JOURNEY!</b></h6>--}}
    {{--<p>Will custom design your dream Peru trip exactly how you have always envisioned it.</p>--}}
    {{--<p>Our trip planner gives you the freedom to describe your Peru dream trip while giving us all the info we need to make that dream a reality. You're dealing with travel advisors who have yeasrs of experience creating south america adventures - so sit down with a Pisco Sour, imagine yourself in Peru and let us know what you see</p>--}}
    {{--<p class="right">... ALREADY HAVE YOUR PERFECT TRIP IN MIND?</p>--}}
    {{--</div>--}}
    {{--<div class="col s6 ">--}}
    {{--<h5 class="center">BOOK ONLINE</h5>--}}
    {{--<div class="divider margin-bottom-10"></div>--}}
    {{--<img src="{{asset('img/travel-book.jpg')}}" alt="" class="responsive-img hoverable">--}}
    {{--<h6><b>YOU'RE IN COMPLETE CONTROL</b></h6>--}}
    {{--<p>It's never been easier to plan the Peru adventure of your dreams! Book and receive an instant confirmation. MachuPicchu unforgettble vacations are only 5 minutes away! Daily Departures! Find the best Peru travel tours, today!</p>--}}
    {{--<div class="col s3">--}}
    {{--<img src="{{asset('img/logos/continental.jpg')}}" alt="" class="responsive-img">--}}
    {{--</div>--}}
    {{--<div class="col s3">--}}
    {{--<img src="{{asset('img/logos/avianca.jpg')}}" alt="" class="responsive-img">--}}
    {{--</div>--}}
    {{--<div class="col s3">--}}
    {{--<img src="{{asset('img/logos/lan.jpg')}}" alt="" class="responsive-img">--}}
    {{--</div>--}}
    {{--<div class="col s3">--}}
    {{--<img src="{{asset('img/logos/american.jpg')}}" alt="" class="responsive-img">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="container">
        <div class="section">
            <div class="row" id="demo2">
                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/service.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#1 PERSONALIZE SERVICE</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>Small Groups and Private tours</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>Our groups range from 4 to 14 travelers with an average of 7-9, and always with the option to upgrade to Vip services with a private guide and private driver.</p>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/local-travel.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#2 LOCAL OPERATOR</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>We live here, trully a 24/7 Assistance</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>Always you will have a direct local number where to call, from a last minute itinerary change or to request a doctor to come to your hotel.</p>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/team-travel.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#3 BEST QUOTES</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>Cutting the middlemen, headquarters at Peru</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>You are free to compare we will be able to beat any publish price, we live and work here, you dont have to pay high overhead cost from other overseas agencies.</p>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/testimonials.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#4 BEST TESTIMONIALS</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>We take pride of our tripadvisor reviews!</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>The most important rewards are the authentic hundreds reviews we receive in different travel boards, from single travelers to university trips.</p>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/daily.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#5 DAILY DEPARTURES</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>We can adapt to any arrival and departure</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>We know that international airfares are a factor for that reason we can adapt any of our programs to any arrival flight to Lima or Cusco.</p>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/why/convenient.jpg')}}" class="circle responsive-img">
                            <span class="card-title text-14"><b>#6 CONVENIENT</b></span>
                        </div>
                        <div class="card-content">
                            <p><b>Book Now option or Customize a dream trip!</b></p>
                            <div class="divider spacer-margin-10"></div>
                            <p>You can now book a lifetime trip in 5 minutes and be ready to Vacation to the Land of the Incas, or you can also leave our travel local peruvian advisors the design of a lifetime trip!.</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    {{--<div class="container">--}}
        {{--<div class="section">--}}

            {{--<div class="row">--}}
                {{--<div class="col s12 center">--}}
                    {{--<h3><i class="mdi-content-send brown-text"></i></h3>--}}
                    {{--<h4>Contact Us</h4>--}}
                    {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="parallax-container valign-wrapper">--}}
        {{--<div class="section no-pad-bot">--}}
            {{--<div class="container">--}}
                {{--<div class="row center">--}}
                    {{--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="parallax"><img src="{{asset('img/background3.jpg')}}" alt="Unsplashed background img 3"></div>--}}
    {{--</div>--}}


    @stop