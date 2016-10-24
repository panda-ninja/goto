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
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
            <div class="col s1">
                <img src="http://gotoperu.travel/img/logos/asta.png" alt="" class="responsive-img">
            </div>
        </div>
    </section>

    <div class="container">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <h5 class="center">HEY, WE'RE GOTOPERU</h5>
                    <p class="light center-align">Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>
                </div>

                <div class="col s12 m4">
                    <img src="http://gotoperu.travel/img/logos/trip-choice.png" alt="" class="responsive-img">
                </div>

                <div class="col s12 m4">
                    <h5 class="center">HEY, WE'RE GOTOPERU</h5>
                    <p class="light center-align">Although we are a young company, we have already welcomed thousands of travelers and proudly gain a history of raving testimonials for the quaility of our peru tours and services.</p>
                </div>

            </div>

        </div>
    </div>


    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>DISCOVER LIMA AND MACHU PICCHU</h4>
                    {{--<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>--}}
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container ">

        <div class="section no-pad-bot">
            <div class="container">
                <div class="row valign-wrapper">
                    <div class="col s7 valign">
                        <h2 class="header col s12 left-align"><strong>6 DAYS</strong></h2>
                        <p class="yellow-text text-darken-3 text-20">Destinations: Lima, Cusco, Sacred Valley, Machu Picchu</p>
                    </div>
                    <div class="col s5">
                        {{--<div class="card-panel hoverable">--}}
                        {{--<img src="http://gotoperu.travel/img/maps/GTP600.jpg" class="responsive-img">--}}
                        {{--</div>--}}


                        <div class="card card-packages">
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

        <div class="parallax"><img src="{{asset('img/banners/banner-1.jpg')}}" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>Contact Us</h4>
                    <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img/background3.jpg')}}" alt="Unsplashed background img 3"></div>
    </div>


    @stop