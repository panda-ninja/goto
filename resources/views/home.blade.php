@extends('layouts.default')

@section('content')


    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/bg/mapi-1.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3>A <b>BETTER</b> WAY TO TRAVEL TO PERU</h3>
                    <h5 class="light yellow-text text-darken-3">$150 average saving per person | 24/7 local authentic assitance | 100s of + tripadvisor testimonials</h5>
                </div>
            </li>
            <li>
                <img src="{{asset('img/bg/cusco-1.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3>Left Aligned Caption</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
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
        <div class="row">
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

    <div class="container">
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
                    <p>Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>
                    <h5>We enjoy what we do</h5>
                    <p>Service, expertise, community and fun are our core GOTOPERU values! We enjoy designing, organizing and operating unforgettable Peru Vacations: we are very proud to show daily the best of our country!</p>
                </div>

            </div>

        </div>
    </div>


    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>DISCOVER LIMA AND <b>MACHU PICCHU</b></h4>
                    {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                </div>
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


    <div class="parallax-container">
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

                        <div class="item">
                            <div class="col s12">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                        <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>GTP600: Discover Machu Picchu and Nazca Lines</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">Sacred Valley, Machu Picchu, Cusco, Inca Trail, Ballestas Island</p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">4 days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>$2999</b></span></h4>
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
                        <div class="item">
                            <div class="col s12">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                        <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>GTP600: Discover Machu Picchu and Nazca Lines</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">Sacred Valley, Machu Picchu, Cusco, Inca Trail, Ballestas Island</p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">4 days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>$2999</b></span></h4>
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
                        <div class="item">
                            <div class="col s12">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                        <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>GTP600: Discover Machu Picchu and Nazca Lines</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">Sacred Valley, Machu Picchu, Cusco, Inca Trail, Ballestas Island</p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">4 days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>$2999</b></span></h4>
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
                        <div class="item">
                            <div class="col s12">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img"></a>
                                        <span class="card-title activator"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>GTP600: Discover Machu Picchu and Nazca Lines</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">Sacred Valley, Machu Picchu, Cusco, Inca Trail, Ballestas Island</p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            <h4 class="text-18 no-margin valign-wrapper"><b class="lime-text text-darken-4">4 days</b> <i class="material-icons valign tiny">arrow_forward</i> <b class="grey-text spacer-m-5 text-12">from</b> <span class="yellow-text text-darken-3 text-25"><b>$2999</b></span></h4>
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

                    </div>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img/bg/pharalax-package4.jpg')}}" alt="Unsplashed background img 3"></div>
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