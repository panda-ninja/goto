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

                    <form action="{{route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($paquete->titulo)), 'dias'=>$paquete->duracion.'-days-tours'))}}"
                          method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="1" name="txt_iddate">
                        <input type="hidden" value="{{$paquete->codigo}}" name="txt_codigo">
                        <input type="hidden" value="{{$paquete->titulo}}" name="txt_country">
                        <a href="#availability" class="waves-effect waves-light btn lime darken-4 modal-trigger">CHECK AVAILABILITY</a>
                        <button class="btn waves-effect waves-light blue" type="submit" name="action">BOOK NOW</button>
                    </form>


                @endforeach
            </div>

            <!-- Modal Structure -->
            <div id="availability" class="modal modal-availability">
                <div class="modal-content font-moserrat">
                    <h4 class="center yellow-text text-darken-4">REQUEST INFORMATION</h4>
                    <p class="center lime-text text-darken-3"><b>Trip: {{$paquete->duracion}} DAYS : {{$paquete->titulo}}</b></p>
                    <div class="divider"></div>
                    <div class="row margin-top-20">
                        <form id="a_form">
                            <div class="col s6">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Your name (required)" id="a_name" type="text" class="validate">
                                        <label for="a_name" class="blue-text">First Name *</label>

                                        <input id="a_code" type="hidden" value="{{$paquete->codigo.': '.$paquete->titulo}}">

                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Last name (required)" id="a_last_name" type="text" class="validate">
                                        <label for="a_last_name" class="blue-text">Last Name *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mail</i>
                                        <input placeholder="mail@example.com (required)" id="a_email" type="email" class="validate">
                                        <label for="a_email" class="blue-text">Email *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="a_phone" type="tel" class="validate">
                                        <label for="a_phone">Telephone</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select id="a_group_size">
                                            <option value="0" disabled selected>Choose one</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5+</option>
                                        </select>
                                        <label>Group Size</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="row">
                                    <div class="col s12 red-text text-darken-3">
                                        Departure Date:
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix grey-text text-darken-1">date_range</i>
                                        <input id="a_date" type="date" class="datepicker">
                                        <label for="a_date">Travel date</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select id="a_departure_date">
                                            <option value="0" disabled selected>choose one</option>
                                            <option value="within 3 months">within 3 months</option>
                                            <option value="3 - 6 months">3 - 6 months</option>
                                            <option value="6 - 12 months">6 - 12 months</option>
                                            <option value="12+ months">12+ months</option>
                                        </select>
                                        <label>I have a travel range</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 margin-bottom-20">
                                        Preferred Accommodations
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="a_accommodations" type="radio" id="a_accommodations_2" value="2"/>
                                        <label for="a_accommodations_2">2 Star</label>

                                        <input name="a_accommodations" type="radio" id="a_accommodations_3" value="3"/>
                                        <label for="a_accommodations_3">3 Star</label>

                                        <input name="a_accommodations" type="radio" id="a_accommodations_4" value="4"/>
                                        <label for="a_accommodations_4">4 Star</label>

                                        <input name="a_accommodations" type="radio" id="a_accommodations_5" value="5"/>
                                        <label for="a_accommodations_5">5 Star</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="a_comments" class="materialize-textarea"></textarea>
                                        <label for="a_comments">Comments</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12">
                                <div class="row center margin-top-20 margin-bottom-10">

                                    <button class="btn-large waves-effect waves-light yellow darken-4" id="a_send" type="button" onclick="SendMailAvailability()">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>


                            <div class="col s12">
                                <div class="row center margin-top-10 margin-bottom-10">
                                    <div id="a_congratulation" class="hidden card green padding-10">
                                        <p class="white-text no-margin center"></p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
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
                            {{--formulario availability--}}
                            <form action="{{route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($paquete->titulo)), 'dias'=>$paquete->duracion.'-days-tours'))}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" value="1" name="txt_iddate">
                                <input type="hidden" value="{{$paquete->codigo}}" name="txt_codigo">
                                <input type="hidden" value="{{$paquete->titulo}}" name="txt_country">
                                <a href="#availability" class="waves-effect waves-light btn lime darken-4 modal-trigger">CHECK AVAILABILITY</a>
                                <button class="btn waves-effect waves-light blue" type="submit" name="action">BOOK NOW</button>
                            </form>
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