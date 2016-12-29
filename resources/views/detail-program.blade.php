@extends('layouts.default')
@section('content')
    <div class="parallax-container parallax-container-4">
        <div class="parallax valign-wrapper">
            <img src="{{asset('img/banners/machupicchu-5.jpg')}}" alt="" class="responsive-img">
            <div class="container">
                <h5 class="position-relative white-text font-moserrat">OUR EXCURSIONS AND PACKAGES DEPART 365 DAYS A YEAR</h5>
            </div>
        </div>
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
    
    <div class="container">
        <div class="section">
            <div class="row center">
                @foreach($paquetes as $paquete)
                    <h1 class="yellow-text text-darken-4 no-margin text-50"><b>{{$paquete->titulo}}</b></h1>
                    @foreach($paquete->precio_paquetes->sortBy('precio_d') as $precio)
                        @if($precio->estrellas == 2)
                            <p class="font-moserrat center text-20 no-margin grey-text ">{{$paquete->duracion}} DAYS | from ${{$precio->precio_d}}</p>
                        @endif
                    @endforeach
                    <a href="" class="waves-effect waves-light btn lime darken-4">CHECK AVAILABILITY</a>
                    <a href="" class="waves-effect waves-light btn blue">BOOK NOW</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 font-moserrat">
                    <a href="#itinerary">Itinerary</a> | <a href="#included">Included</a> | <a href="#not-included">Not Included</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section scrollspy" id="itinerary">
            <div class="row main-wrapper">

                <div class="col s12 m9 l7">
                    <div>
                        <h4 class="no-margin font-moserrat row">ITINERARY</h4>
                    </div>
                    @foreach($paquetes as $paquete)
                        @foreach($paquete->itinerario as $itinerario)

                            <div id="days-{{$itinerario->iditinerario}}" class="scrollspy clearfix">
                                <p class="text-18 font-moserrat"><b class="blue-text">DAY {{$itinerario->dia}}:</b> {{$itinerario->titulo}}</p>

                                <div class="col s12 no-padding">
                                    <p class="no-margin">@php echo $itinerario->descripcion @endphp</p>
                                </div>
                                {{--<div class="col s5">--}}
                                {{--<img src="{{asset('img/maps/GTP600.jpg')}}" alt="" class="responsive-img">--}}

                                {{--</div>--}}
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="col hide-on-small-only m3 l5">
                    <div class="detail-maps" id="pinned">
                        <img src="{{asset('img/maps/GTP600.jpg')}}" alt="" class="materialboxed responsive-img">
                        <h5 class="font-moserrat">OUTLINE</h5>
                        <div class="overview">
                            <ul class="section table-of-contents margin-top-0 padding-top-0">
                                @foreach($paquetes as $paquete)
                                    @foreach($paquete->itinerario as $itinerario)
                                        <li><a href="#days-{{$itinerario->iditinerario}}"><span class="circle-days">{{$itinerario->dia}}</span> {{$itinerario->titulo}}</a></li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <div class="margin-top-20 center">
                            {{--<p class="font-moserrat blue-text">@php echo $_POST['txt_country'].' | '.$_POST['txt_date'].' | $'.$_POST['txt_price'].'' @endphp</p>--}}
                            {{--<form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" value="{{$_POST['txt_iddate']}}" name="txt_iddate">--}}
                                {{--<input type="hidden" value="{{$_POST['txt_date']}}" name="txt_date">--}}
                                {{--<input type="hidden" value="{{$_POST['txt_country']}}" name="txt_country">--}}
                                {{--<input type="hidden" value="{{$_POST['txt_price']}}" name="txt_price">--}}
                                {{--<input type="submit" class="waves-effect waves-light btn" value="BOOK NOW">--}}
                            {{--</form>--}}
                            <a href="" class="waves-effect waves-light btn lime darken-4">CHECK AVAILABILITY</a>
                            <a href="" class="waves-effect waves-light btn blue">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row spacer-margin-50">
                <div class="col s6 scrollspy" id="included">
                    <div>
                        <h4 class="no-margin font-moserrat row">What's Included</h4>
                        @php echo $paquete->incluye @endphp
                    </div>
                </div>
                <div class="col s6 scrollspy" id="not-included">
                    <div>
                        <h4 class="no-margin font-moserrat row">What's Not Included</h4>
                        @php echo $paquete->noincluye @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop