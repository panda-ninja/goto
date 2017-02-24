@extends('layouts.default')

@section('title', 'Travel Packages to Peru | Peru Vacations | Machu Picchu Travel')

@section('content')

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/bg/mapi-3.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3 class="grey-text text-darken-2 text-50">A <b>BETTER</b> WAY TO TRAVEL TO PERU</h3>
                    <h5 class="light grey-text text-darken-3 hide-on-small-only">$150 average saving | 24/7 local authentic assistance |
                        100s of testimonials</h5>

                    <div class="row margin-top-40">
                        <div class="col s12 m8 offset-m2 l3 offset-l6">
                            <a href="{{route('home_show_date_path', 5)}}" class="waves-effect">
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

                                <div class="col s12 white-text">
                                    <p class="no-margin text-22 text-15-ip text-20-ips">ALL INCLUDED FROM MIAMI</p>
                                    <p class="no-margin text-35 text-20-ip text-30-ips"><b class="">5 DAYS</b> <span class="btn black-text">$1299</span></p>
                                </div>
                            </a>
                        </div>
                        {{--<a class="waves-effect waves-light btn lime darken-4">Travel Packages</a>--}}
                        {{--<a class="waves-effect waves-light btn grey darken-4">Design Your Trip</a>--}}
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <section class="spacer-10 hide-on-small-only">
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
        <div class="parallax valign-wrapper">
            <img src="{{asset('img/bg/meetup4.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col s12 m5 l4 position-relative right">
                        <div class="padding-10 bg-rgba-white-9 card-panel">
                            <h5 class="font-moserrat">EXPERIENCE</h5>
                            <p>Established in 2009, we are a company founded by a team of travel professionals with decades of experience operating tours in Peru</p>
                            <h5 class="font-moserrat">Local &amp; International</h5>
                            <p>Our headquarters are local in Cusco with operational offices at MachuPicchu, Lima, Arequipa and Puno. And satellite offices at Washington DC and Tampa, FL.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="section scrollspy" id="vacations">
            <div class="row center">
                <h4 class="yellow-text text-darken-4"><b>VACATION PACKAGES</b> WHIT INTERNATIONAL FLIGHTS</h4>
                <div class="col s12 m12 l12 include-services margin-bottom-10">
                    <ul class="list-services no-margin text-11-ip">
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

    @foreach($paquetes2->unique('duracion') as $paquete2)
        @if($paquete2->duracion == 5)
            @php $precio_c = '1299'; @endphp
        @else
            @php $precio_c = '1599'; @endphp
        @endif
        <div class="container margin-bottom-40">
            <div class="section no-padding">
                <div class="row center">
                    @foreach($paquete2->disponibilidad->sortBy('precio')->take(1) as $precio)
                        <h5 class="grey-text text-darken-1  font-moserrat text-22"><b><span class="lime-text text-darken-3 padding-right-25">{{$paquete2->duracion}} DAYS</span></b> CUSCO, SACRED VALLEY, MACHU PICCHU <b class="grey-text text-darken-4 padding-left-25">from ${{$precio_c}}</b></h5>
                    @endforeach
                </div>

                <div class="row">

                    <div class="row grey card lighten-4 card no-margin z-depth-1">
                        @foreach($paquetes2->where('duracion', $paquete2->duracion) as $paquetes)
                            <div class="col s6 m4 l3">

                                <div class="text-18 text-16-ip grey-text text-darken-4 margin-top-10"><b><span class="text-12 display-block grey-text text-darken-5">from</span> {{$paquetes->titulo}}</b></div>

                                {{--<p class="no-margin">Small group</p>--}}
                                {{--<p class="no-margin">Tourist to Superior</p>--}}
                                <ul class="font-moserrat right-align">
                                    @foreach($paquetes->disponibilidad->take(3)->sortBy('fecha_disponibilidad')->where('estrellas', 3) as $disponibilidad)

                                        <li class="text-15 text-15-ip margin-bottom-10">
                                            <form action="{{route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($paquetes->titulo)), 'dias'=>$paquetes->duracion.'-days-tours'))}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" value="1" name="txt_iddate">
                                                <input type="hidden" value="{{$disponibilidad->fecha_disponibilidad}}" name="txt_date">
                                                <input type="hidden" value="{{$paquetes->titulo}}" name="txt_country">
                                                <input type="hidden" value="{{$disponibilidad->precio_d}}" name="txt_price">
                                                <input type="hidden" value="{{$paquetes->duracion}}" name="dias">
                                                {{strftime("%B, %d", strtotime(str_replace('-','/', $disponibilidad->fecha_disponibilidad)))}} <span class="blue-text">${{$disponibilidad->precio_d}}</span>
                                                <input type="submit" class="btn btn-date" value="BOOK">
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        @endforeach
                    </div>

                    {{--<div class="col s12 divider"></div>--}}


                    <div class="col s12 margin-bottom-30 card no-margin">
                        <a href="{{route('home_show_date_path', $paquetes->duracion)}}" class="font-moserrat valign-wrapper right margin-top-10 deep-orange-text text-accent-3">View All Dates <i class="material-icons">input</i></a>
                        <div class="col s12 m6 l6">
                            {{--<div class="valign-wrapper">--}}
                            {{--<img src="{{asset('img/icons/all-included.png')}}" alt="" width="100" class="left">--}}
                            {{--</div>--}}
                            <h5 class="font-moserrat">Travel Outline</h5>
                            <ul class="text-17">
                                @foreach($paquetes->itinerario as $itinerario)
                                    <li><b>Day {{$itinerario->dia}}:</b> {{ucwords(strtolower($itinerario->titulo))}}</li>
                                @endforeach
                                <li>
                                    <a href="{{route('home_show_date_path', $paquetes->duracion)}}" class="btn valign-wrapper waves-effect left margin-top-10 margin-bottom-10 deep-orange accent-3">Detailed Program</a>
                                </li>
                            </ul>

                        </div>
                        <div class="col s12 m6 l6">
                            <img src="{{asset('img/maps/'.$paquetes->imagen.'')}}" alt="" class="responsive-img margin-top-15">
                        </div>
                    </div>

                </div>


            </div>
        </div>

    @endforeach





    <div class="parallax-container parallax-container-2 hide-ipad-large">
        <div class="section">
            <div class="container">
                <div class="row center">
                    <h4 class="yellow-text text-darken-4"><b>GROUND</b> PACKAGES</h4>
                    <div class="col s12 m12 l12 include-services margin-bottom-10">
                        <ul class="list-services no-margin text-11-ip">
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

                        </ul>
                    </div>
                </div>
                <div class="row margin-bottom-20">

                    <div class="customNavigation center">
                        <a class="btn preva"><i class="material-icons left">arrow_back</i> Previous</a>
                        <a class="btn nexta"><i class="material-icons right">arrow_forward</i>Next</a>
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
                                                        <h4 class="text-18 text-30-ip no-margin valign-wrapper"><b
                                                                    class="lime-text text-darken-4">{{$paquetes->duracion}}
                                                                days</b> <i class="material-icons valign tiny">arrow_forward</i>
                                                            <b class="grey-text spacer-m-5 text-12 text-20-ip">from</b> <span
                                                                    class="yellow-text text-darken-3 text-25 text-40-ip"><b>${{$precio->precio_d}}</b></span>
                                                        </h4>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row no-margin valign-wrapper">
                                                <div class="col s2">
                                                    @if($paquetes->estado == 1)

                                                        <a href="" onclick="addwishlist()" id="w_send" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Add my wishlist"><i class="material-icons valign small grey-text">favorite_border</i></a>

                                                    @elseif($paquetes->estado == 2)
                                                        <a href="" class="red-text tooltipped" data-position="top"
                                                           data-delay="50" data-tooltip="Add my wishlist"><i
                                                                    class="material-icons valign small">favorite</i></a>
                                                    @endif
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



    <div class="container">
        <div class="section font-moserrat">
            <div class="row">
                <p class="yellow-text text-darken-4 text-20">BY CATEGORY</p>
            </div>
            <div class="row">
                <div class="col s6 m3 l3">
                    <a href="{{route('home_show_category_path', 'adventure')}}" class="card hoverable waves-effect grey lighten-4">
                        <div class="col s3">
                            <img src="{{asset('img/icons/trekking.png')}}" alt="" class="circle responsive-img margin-top-10">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9 black-text">
                               <p>ADVENTURE</p>
                        </div>
                    </a>
                </div>
                <div class="col s6 m3 l3">
                    <a href="{{route('home_show_category_path', 'family')}}" class="card hoverable waves-effect grey lighten-4">
                        <div class="col s3">
                            <img src="{{asset('img/icons/family.png')}}" alt="" class="circle responsive-img margin-top-10">
                            <!-- notice the "circle" class -->
                        </div>

                        <div class="col s9 black-text">
                            <p>FAMILY</p>
                        </div>

                    </a>
                </div>
                <div class="col s6 m3 l3">
                    <a href="{{route('home_show_category_path', 'classic')}}" class="card hoverable waves-effect grey lighten-4">
                        <div class="col s3">
                            <img src="{{asset('img/icons/classic.png')}}" alt="" class="circle responsive-img margin-top-10">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9 black-text">
                            <p>CLASSIC</p>
                        </div>
                    </a>
                </div>
                <div class="col s6 m3 l3">
                    <a href="{{route('home_show_category_path', 'luxury')}}" class="card hoverable waves-effect grey lighten-4">
                        <div class="col s3">
                            <img src="{{asset('img/icons/human.png')}}" alt="" class="circle responsive-img margin-top-10">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s9 black-text">
                            <p>LUXURY</p>
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
                            <li class="waves-effect hoverable grey lighten-4 card"><a href="{{route('home_show_days_path', $duraciones->duracion)}}">{{$duraciones->duracion}}</a></li>
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



@stop
