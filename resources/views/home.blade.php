@extends('layouts.default')

@section('content')

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/bg/mapi-3.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3 class="grey-text text-darken-2 text-50">A <b>BETTER</b> WAY TO TRAVEL TO PERU</h3>
                    <h5 class="light grey-text text-darken-3">$150 average saving | 24/7 local authentic assitance |
                        100s of testimonials</h5>

                    <div class="row margin-top-60 font-moserrat">
                        <div class="col s12 m8 offset-m2 l3 offset-l6">
                            <a href="" class="waves-effect">
                                {{--<p class="yellow-text text-darken-3 grey darken-4">ALL INCLUDED</p>--}}
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/transfers.png')}}" alt=""
                                         class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/entrances.png')}}" alt=""
                                         class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/breakfast.png')}}" alt=""
                                         class="responsive-img">
                                </div>
                                <div class="col s3">
                                    <img src="{{asset('img/icons//include/assistances.png')}}" alt=""
                                         class="responsive-img">
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
        <div class="section scrollspy" id="vacations">
            <div class="row center">
                <h4 class="yellow-text text-darken-4"><b>VACATION PACKAGES</b> WHIT INTERNATIONAL FLIGHTS</h4>
                <div class="col s12 m9 l12 include-services margin-bottom-10">
                    <ul class="list-services no-margin">
                        <li><img src="{{asset('img/icons//include/hotels.png')}}" alt="" class="responsive-img"><span>Hotels</span>
                        </li>
                        <li><img src="{{asset('img/icons//include/transfers.png')}}" alt=""
                                 class="responsive-img"><span>Transfers</span></li>
                        <li><img src="{{asset('img/icons//include/entrances.png')}}" alt=""
                                 class="responsive-img"><span>Entrances</span></li>
                        <li><img src="{{asset('img/icons//include/trains.png')}}" alt="" class="responsive-img"><span>Trains</span>
                        </li>
                        <li><img src="{{asset('img/icons//include/tours.png')}}" alt="" class="responsive-img"><span>Tours</span>
                        </li>
                        <li><img src="{{asset('img/icons//include/breakfast.png')}}" alt=""
                                 class="responsive-img"><span>Breakfast</span></li>
                        <li><img src="{{asset('img/icons//include/assistances.png')}}" alt=""
                                 class="responsive-img"><span>Assistances</span></li>
                        <li><img src="{{asset('img/icons//include/flight.png')}}" alt="" class="responsive-img"><span>Flights</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section no-padding">
            <div class="row">
                <div class="row margin-bottom-30">
                    <div class="col s5">
                        <div class="valign-wrapper">
                            <img src="{{asset('img/icons/all-included.png')}}" alt="" width="100" class="left">
                            <h3 class="lime-text text-darken-4 no-margin padding-left-20">7 DAYS</h3>
                        </div>
                        <ul class="text-18">

                            <li><b>Day 1:</b> Flight From US to Peru</li>
                            <li><b>Day 2:</b> Lima City Tour</li>
                            <li><b>Day 3:</b> Flight to Cusco - Transfer to the Sacred Valley of the Incas</li>
                            <li><b>Day 4:</b> Authentic Sacred Valley Tour</li>
                            <li><b>Day 5:</b> MachuPicchu tour</li>
                            <li><b>Day 6:</b> Cusco Free Day</li>
                            <li><b>Day 7:</b> Cusco Departure &amp; Return to US</li>
                            {{--<li><a href="{{route('home_show_date_path', array('titulo'=>'new-york', 'dias'=>'7-days-tours'))}}" class="font-moserrat valign-wrapper left margin-top-10">Detailed Program <i class="material-icons">input</i></a></li>--}}
                            <li>
                                <form action="{{route('home_show_date_path', array('titulo'=>'new-york', 'dias'=>'7-days-tours'))}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="1" name="txt_iddate">
                                    <input type="hidden" value="2017-03-18" name="txt_date">
                                    <input type="hidden" value="NEW YORK" name="txt_country">
                                    <input type="hidden" value="1799 " name="txt_price">
                                    <input type="submit" class="btn valign-wrapper left margin-top-10" value="Detailed Program">
                                </form>
                            </li>
                        </ul>

                    </div>
                    <div class="col s7">
                        <p class="yellow-text text-darken-3 font-moserrat text-20 no-margin center">LIMA, CUSCO, SACRED
                            VALLEY, MACHU PICCHU</p>
                        <img src="{{asset('img/all.jpg')}}" alt="" class="responsive-img">
                    </div>
                </div>
                <div class="row">
                    @foreach($disponibilidad as $paquetes)
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30"><a href="#modal-{{$paquetes->codigo}}" class="left modal-trigger waves-effect"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> {{$paquetes->titulo}}</p>
                            @foreach($paquetes->disponibilidad->sortBy('precio')->take(1) as $disponibilidad)
                                <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span>${{$disponibilidad->precio}}</p>
                            @endforeach
                            <p class="no-margin">Small group</p>
                            <p class="no-margin">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                @foreach($paquetes->disponibilidad as $disponibilidad)

                                    <li class="text-14 margin-bottom-10">
                                        <form action="{{route('home_show_date_path', array('titulo'=>str_replace(' ','-', strtolower($paquetes->titulo)), 'dias'=>$paquetes->duracion.'-days-tours'))}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" value="1" name="txt_iddate">
                                            <input type="hidden" value="{{$disponibilidad->fecha_disponibilidad}}" name="txt_date">
                                            <input type="hidden" value="{{$paquetes->titulo}}" name="txt_country">
                                            <input type="hidden" value="{{$disponibilidad->precio}}" name="txt_price">
                                            {{$disponibilidad->fecha_disponibilidad}} <span class="blue-text">${{$disponibilidad->precio}}</span>
                                            <input type="submit" class="btn" value="BOOK">
                                        </form>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Modal Structure -->
                            <div id="modal-{{$paquetes->codigo}}" class="modal">
                                <div class="modal-content font-moserrat">
                                    <div class="row">
                                        <div class="col s6">

                                        </div>
                                        <div class="col s6">
                                            <h5 class="center">{{$paquetes->titulo}}</h5>
                                            <form action="{{route('view_vacations_pdf_path', $paquetes->id)}}" method="post">
                                                {{csrf_field()}}
                                                <div class="row left-align">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">account_circle</i>
                                                        <input id="icon_prefix" type="text" class="validate" required>
                                                        <label for="icon_prefix">Full Name</label>
                                                    </div>

                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">mail</i>
                                                        <input id="icon_telephone" type="email" class="validate" required>
                                                        <label for="icon_telephone">Email</label>
                                                    </div>

                                                    <div class="col s12 center">
                                                        <button class="btn waves-effect waves-light yellow darken-4" type="submit" name="action">Download
                                                            <i class="material-icons right">file_download</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

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
                            <img src="{{asset('img/logos/expedia.png')}}" alt="" class="responsive-img">
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
                    <p>Although we are a young company, we have already welcomed thousands of travelers and proudly gain
                        a history of raving testimonials for the quaility of our peru tours and services.</p>
                    <h5>We enjoy what we do</h5>
                    <p>Service, expertise, community and fun are our core GOTOPERU values! We enjoy designing,
                        organizing and operating unforgettable Peru Vacations: we are very proud to show daily the best
                        of our country!</p>
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
                            <a href="#!"><img src="http://gotoperu.travel/img/maps/GTP600.jpg"
                                              class="responsive-img"></a>
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
                                        <a href=""
                                           class="waves-effect waves-light yellow darken-3 white-text padding-5">
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
                            <span class="card-title grey-text text-darken-4">DISCOVER LIMA AND MACHU PICCHU<i
                                        class="material-icons right">close</i></span>
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
                            <li><img src="{{asset('img/icons//include/hotels.png')}}" alt=""
                                     class="responsive-img"><span>Hotels</span></li>
                            <li><img src="{{asset('img/icons//include/transfers.png')}}" alt=""
                                     class="responsive-img"><span>Transfers</span></li>
                            <li><img src="{{asset('img/icons//include/entrances.png')}}" alt=""
                                     class="responsive-img"><span>Entrances</span></li>
                            <li><img src="{{asset('img/icons//include/trains.png')}}" alt=""
                                     class="responsive-img"><span>Trains</span></li>
                            <li><img src="{{asset('img/icons//include/tours.png')}}" alt=""
                                     class="responsive-img"><span>Tours</span></li>
                            <li><img src="{{asset('img/icons//include/breakfast.png')}}" alt=""
                                     class="responsive-img"><span>Breakfast</span></li>
                            <li><img src="{{asset('img/icons//include/assistances.png')}}" alt=""
                                     class="responsive-img"><span>Assistances</span></li>

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
                                            <a href="{{route('home_show_travel_path', array('titulo'=>str_replace(' ','-', strtolower($paquetes->titulo)), 'dias'=>$paquetes->duracion.'-days-tours'))}}"><img src="http://gotoperu.travel/img/maps/GTP600.jpg"
                                                            class="responsive-img"></a>
                                            <span class="card-title activator"><i
                                                        class="material-icons right">more_vert</i></span>
                                        </div>

                                        <div class="card-content">
                                            <div class="">
                                                <h2 class="text-16 no-margin"><b>{{$paquetes->codigo}}
                                                        : {{$paquetes->titulo}}</b></h2>
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
                                                        <h4 class="text-18 no-margin valign-wrapper"><b
                                                                    class="lime-text text-darken-4">{{$paquetes->duracion}}
                                                                days</b> <i class="material-icons valign tiny">arrow_forward</i>
                                                            <b class="grey-text spacer-m-5 text-12">from</b> <span
                                                                    class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span>
                                                        </h4>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row no-margin valign-wrapper">
                                                <div class="col s2">
                                                    <a href="" class="red-text tooltipped" data-position="top"
                                                       data-delay="50" data-tooltip="Add my wishlist"><i
                                                                class="material-icons valign small">favorite</i></a>
                                                </div>
                                                <div class="col s10">
                                                    <a href="{{route('home_show_travel_path', array('titulo'=>str_replace(' ','-', strtolower($paquetes->titulo)), 'dias'=>$paquetes->duracion.'-days-tours'))}}" class="waves-effect waves-light btn yellow darken-3"><i
                                                                class="material-icons right">send</i>View Trip</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="card-reveal">--}}
                                            {{--<span class="card-title grey-text text-darken-4">Card Title<i--}}
                                                        {{--class="material-icons right">close</i></span>--}}
                                            {{--<p>Here is some more information about this product that is only revealed--}}
                                                {{--once clicked on.</p>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <a href="{{route('home_show_packages_path')}}" class="font-moserrat valign-wrapper right">View All Programs <i class="material-icons">input</i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="">
        </div>
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
                            <li><img src="{{asset('img/icons//include/hotels.png')}}" alt=""
                                     class="responsive-img"><span>Hotels</span></li>
                            <li><img src="{{asset('img/icons//include/transfers.png')}}" alt=""
                                     class="responsive-img"><span>Transfers</span></li>
                            <li><img src="{{asset('img/icons//include/entrances.png')}}" alt=""
                                     class="responsive-img"><span>Entrances</span></li>
                            <li><img src="{{asset('img/icons//include/trains.png')}}" alt=""
                                     class="responsive-img"><span>Trains</span></li>
                            <li><img src="{{asset('img/icons//include/tours.png')}}" alt=""
                                     class="responsive-img"><span>Tours</span></li>
                            <li><img src="{{asset('img/icons//include/breakfast.png')}}" alt=""
                                     class="responsive-img"><span>Breakfast</span></li>
                            <li><img src="{{asset('img/icons//include/assistances.png')}}" alt=""
                                     class="responsive-img"><span>Assistances</span></li>
                            <li class="center"><i class="material-icons">add</i></li>
                            <li><img src="{{asset('img/icons//include/flight.png')}}" alt=""
                                     class="responsive-img"><span>Flights</span></li>

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
                                            <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg"
                                                            class="responsive-img"></a>
                                            <span class="card-title activator"><i
                                                        class="material-icons right">more_vert</i></span>
                                        </div>

                                        <div class="card-content">
                                            <div class="">
                                                <h2 class="text-16 no-margin"><b>{{$paquetef->codigo}}
                                                        : {{$paquetef->titulo}}</b></h2>
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
                                                        <h4 class="text-18 no-margin valign-wrapper"><b
                                                                    class="lime-text text-darken-4">{{$paquetef->duracion}}
                                                                days</b> <i class="material-icons valign tiny">arrow_forward</i>
                                                            <b class="grey-text spacer-m-5 text-12">from</b> <span
                                                                    class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span>
                                                        </h4>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row no-margin valign-wrapper">
                                                <div class="col s2">
                                                    <a href="" class="red-text tooltipped" data-position="top"
                                                       data-delay="50" data-tooltip="Add my wishlist"><i
                                                                class="material-icons valign small">favorite</i></a>
                                                </div>
                                                <div class="col s10">
                                                    <a class="waves-effect waves-light btn yellow darken-3"><i
                                                                class="material-icons right">send</i>View Trip</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Card Title<i
                                                        class="material-icons right">close</i></span>
                                            <p>Here is some more information about this product that is only revealed
                                                once clicked on.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <a href="" class="font-moserrat valign-wrapper right">View All Programs <i
                                    class="material-icons">input</i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="Unsplashed background img 3">
        </div>
    </div>


    <div class="container">
        <div class="section font-moserrat">
            <div class="row">
                <p class="yellow-text text-darken-4 text-20">BY CATEGORY</p>
            </div>
            <div class="row">
                <div class="col s3 valign-wrapper">
                    <a href="{{route('home_show_category_path', 'adventure')}}" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/trekking.png')}}" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                ADVENTURE
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="{{route('home_show_category_path', 'family')}}" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/family.png')}}" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                FAMILY
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="{{route('home_show_category_path', 'classic')}}" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/classic.png')}}" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                CLASSIC
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col s3 valign-wrapper">
                    <a href="{{route('home_show_category_path', 'luxury')}}" class="card hoverable waves-effect">
                        <div class="col s3">
                            <img src="{{asset('img/icons/human.png')}}" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
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
                    <a href="{{route('home_show_packages_path')}}" class="font-moserrat valign-wrapper right">View All Category <i class="material-icons">input</i></a>
                </div>
            </div>


            <div class="row">
                <p class="yellow-text text-darken-4 text-20">BY DAYS</p>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="pagination">
                    @foreach($duracion->sortBy('duracion') as $duraciones)
                            <li class="waves-effect"><a href="{{route('home_show_days_path', $duraciones->duracion)}}">{{$duraciones->duracion}}</a></li>
                    @endforeach
                        {{--<li class="waves-effect active"><a href="#!">16+</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a href="{{route('home_show_packages_path')}}" class="font-moserrat valign-wrapper right">View All Durations<i class="material-icons">input</i></a>
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


@stop