@extends('layouts.default')

@section('content')

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/bg/mapi-1.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3>A <b>BETTER</b> WAY TO TRAVEL TO PERU</h3>
                    <h5 class="light yellow-text text-darken-3">$150 average saving per person | 24/7 local authentic assitance | 100s of + tripadvisor testimonials</h5>
                    
                    <div class="margin-top-100">
                        <p>Book Online or customized your dream vacations</p>
                        <a class="waves-effect waves-light btn lime darken-4">Travel Packages</a>
                        <a class="waves-effect waves-light btn grey darken-4">Design Your Trip</a>
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
        <div class="parallax"><img src="{{asset('img/bg/we-care.jpg')}}"></div>
        <div class="container">
            <div class="row valign-wrapper margin-top-10">
                <div class="col s4">
                    <div class="card-panel hoverable lime darken-4">
                        <h5 class="white-text">Social <b>Responsability</b></h5>
                        <p>Giving back to our hometown communities!</p>
                    </div>
                </div>
                <div class="col s4 center">
                    <h4 class="white-text"><b>WE CARE</b></h4>
                </div>
                <div class="col s4">
                    <div class="card-panel hoverable white">
                        <h5>HEY, WE'RE <b>GOTOPERU</b></h5>
                        <p>Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>
                        <h5>We enjoy what we do</h5>
                        <p>Service, expertise, community and fun are our core GOTOPERU values! We enjoy designing, organizing and operating unforgettable Peru Vacations: we are very proud to show daily the best of our country!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="section">
            <div class="row center">
                <h4>Design Your <b>TRIP</b></h4>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Name</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">mail</i>
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" type="tel" class="validate">
                    <label for="icon_telephone">Telephone</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <input id="last_name" type="date" class="datepicker">
                    <label for="last_name">Date</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            
        </div>
    </div>

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



    <div class="container">
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
                            <h4>OUR BEST <b>SELLERS</b></h4>
                            {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                        </div>

                    <div class="customNavigation center">
                        <a class="btn prev"><i class="material-icons left">arrow_back</i> Previous</a>
                        <a class="btn next"><i class="material-icons right">arrow_forward</i>Next</a>
                    </div>
                    <div id="owl-demo" class="owl-carousel">

                        @foreach($paquete as $paquete)
                            <div class="item">
                            <div class="col s12">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                        <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>{{$paquete->codigo}}: {{$paquete->titulo}}</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">
                                                @foreach($paquete->paquetes_destinos as $destino)
                                                    {{ucwords(strtolower($destino->destinos->nombre))}}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            @foreach($paquete->precio_paquetes as $precio)
                                                @if($precio->estrellas == 2)
                                                    <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">{{$paquete->duracion}} days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span></h4>
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
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="Unsplashed background img 3"></div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row center">
                <h4>FEATURED <b>TOURS</b></h4>
            </div>

            <div class="row" id="demo">

                @foreach($featured as $featured)
                    <div class="col s6">
                        <div class="card horizontal">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('img/descarga.jpg')}}">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content center">
                                    <h5 class="card-title activator grey-text text-darken-4 center">{{$featured->titulo}}<i class="material-icons right-absolute-card">more_vert</i></h5>
                                    <div class="divider spacer-margin-20"></div>
                                    <p>{{$featured->descripcion}}</p>
                                    <div class="divider margin-top-20 margin-bottom-30"></div>
                                    <a href="" class="waves-effect waves-light btn yellow darken-3">Inquire Now</a>
                                </div>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><b class="yellow-text text-darken-3">{{$featured->titulo}}</b> <i class="material-icons right-absolute-card">close</i></span>
                                <p><b class="grey-text text-darken-2">Duration:</b> {{$featured->duracion}} DAYS / {{$featured->duracion-1}} NIGHTS</p>
                                <p><b class="grey-text text-darken-2">Price:</b> Precio basado en doble acomodacion</p>


                                @foreach($featured->precio_paquetes as $precio)
                                    <p class="valign-wrapper">
                                        <i class="material-icons yellow-text text-darken-3">play_arrow</i>
                                        <b class="grey-text text-darken-2"> {{$precio->estrellas}} estrellas: </b> <span class="spacer-m-10">${{$precio->precio_d}}</span>
                                    </p>
                                @endforeach

                                <p><b class="grey-text text-darken-2">Destinos:</b>
                                    @foreach($featured->paquetes_destinos as $destino)
                                        {{ucwords(strtolower($destino->destinos->nombre))}} /
                                    @endforeach
                                 </p>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <div class="parallax-container parallax-container-3 valign-wrapper hoverable">
        <div class="row center">
            <h4 class="white-text">HOW <b>GOTOPERU</b> WORKS</h4>
        </div>
        <div class="parallax"><img src="{{asset('img/bg/mapi-1.jpg')}}"></div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s6">
                    <h5 class="center">CONTACT OUR TRAVEL ADVISOR</h5>
                    <div class="divider margin-bottom-10"></div>
                    <img src="{{asset('img/team-travel.jpg')}}" alt="" class="responsive-img hoverable">
                    <h6><b>LETS CREATE TOGETHER A DREAM JOURNEY!</b></h6>
                    <p>Will custom design your dream Peru trip exactly how you have always envisioned it.</p>
                    <p>Our trip planner gives you the freedom to describe your Peru dream trip while giving us all the info we need to make that dream a reality. You're dealing with travel advisors who have yeasrs of experience creating south america adventures - so sit down with a Pisco Sour, imagine yourself in Peru and let us know what you see</p>
                    <p class="right">... ALREADY HAVE YOUR PERFECT TRIP IN MIND?</p>
                </div>
                <div class="col s6 ">
                    <h5 class="center">BOOK ONLINE</h5>
                    <div class="divider margin-bottom-10"></div>
                    <img src="{{asset('img/travel-book.jpg')}}" alt="" class="responsive-img hoverable">
                    <h6><b>YOU'RE IN COMPLETE CONTROL</b></h6>
                    <p>It's never been easier to plan the Peru adventure of your dreams! Book and receive an instant confirmation. MachuPicchu unforgettble vacations are only 5 minutes away! Daily Departures! Find the best Peru travel tours, today!</p>
                    <div class="col s3">
                        <img src="{{asset('img/logos/continental.jpg')}}" alt="" class="responsive-img">
                    </div>
                    <div class="col s3">
                        <img src="{{asset('img/logos/avianca.jpg')}}" alt="" class="responsive-img">
                    </div>
                    <div class="col s3">
                        <img src="{{asset('img/logos/lan.jpg')}}" alt="" class="responsive-img">
                    </div>
                    <div class="col s3">
                        <img src="{{asset('img/logos/american.jpg')}}" alt="" class="responsive-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row" id="demo2">
                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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
                            <img src="{{asset('img/team-travel.jpg')}}" class="circle responsive-img">
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