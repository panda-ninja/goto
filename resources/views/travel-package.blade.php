@extends('layouts.default')

@section('content')

    <div class="parallax-container parallax-container-4">
        <div class="parallax valign-wrapper">
            <img src="{{asset('img/banners/group.jpg')}}" alt="" class="responsive-img">
            <div class="container">
                <h5 class="position-relative white-text font-moserrat">VACATION PACKAGES WHIT INTERNATIONAL FLIGHTS</h5>
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
        <div class="">
            <div class="row center">
                @foreach($paquetes as $paquete)
                    <h1 class="yellow-text text-darken-4 no-margin text-50">ALL <b>INCLUDED</b></h1>
                    <p class="grey-text text-darken-1 font-moserrat text-20 no-margin">MACHUPICCHU TOURS WITH AIR FROM US | DOOR TO DOOR, Including a $50 <img src="{{asset('img/icons/uber.png')}}" width="30" alt=""> Credit</p>
                    <h3 class="lime-text text-darken-4 margin-top-20 margin-bottom-0"><b>{{$paquete->duracion}} DAYS</b></h3>
                @endforeach

            </div>
        </div>
    </div>

    <div class="container">

            <div class="row">
                <div class="col s12 font-moserrat">
                    <a href="#itinerary">Itinerary</a> | <a href="#included">Included</a> | <a href="#not-included">Not Included</a>
                </div>
            </div>

    </div>

    <div class="container">
        <div class="section">
            <div class="col s12">

                <div class="row">

                    @foreach($disponibilidad as $paquete)
                        <div class="col s3 right-align">
                            <div class="card-panel grey lighten-5 z-depth-1 hoverable padding-10">
                                <p class="no-margin text-25"><a href="#modal-{{$paquete->codigo}}" class="left modal-trigger waves-effect"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="30"></a> {{$paquete->titulo}}</p>
                                @foreach($paquete->disponibilidad->sortBy('precio')->take(1) as $disponibilidad)
                                    <p class="no-margin text-40 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span>${{$disponibilidad->precio}}</p>
                                @endforeach
                                <p class="no-margin">Small group</p>
                                <p class="no-margin">Tourist to Superior</p>
                                <ul class="font-moserrat">
                                    @foreach($paquete->disponibilidad as $disponibilidad)

                                        <li class="text-11 margin-bottom-10">
                                            <form action="{{route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($paquete->titulo)), 'dias'=>$paquete->duracion.'-days-tours'))}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" value="1" name="txt_iddate">
                                                <input type="hidden" value="{{$disponibilidad->fecha_disponibilidad}}" name="txt_date">
                                                <input type="hidden" value="{{$paquete->titulo}}" name="txt_country">
                                                <input type="hidden" value="{{$disponibilidad->precio}}" name="txt_price">
                                                {{$disponibilidad->fecha_disponibilidad}} <span class="blue-text ">${{$disponibilidad->precio}}</span>
                                                <input type="submit" class="btn" value="BOOK">
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Modal Structure -->
                                <div id="modal-{{$paquete->codigo}}" class="modal">
                                    <div class="modal-content font-moserrat">
                                        <div class="row">
                                            <div class="col s6">

                                            </div>
                                            <div class="col s6">
                                                <h5 class="center">{{$paquete->titulo}}</h5>
                                                <form action="{{route('view_vacations_pdf_path', $paquete->id)}}" method="post">
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

                    {{--<div class="col s4 right-align">--}}
                        {{--<div class="card-panel grey lighten-5 z-depth-1 hoverable">--}}
                            {{--<p class="no-margin text-30 @php if ($_POST['txt_country'] == 'NEW YORK') echo ' '; else echo 'grey-text' @endphp"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> NEW YORK</p>--}}
                            {{--<p class="no-margin text-50 font-moserrat @php if ($_POST['txt_country'] == 'NEW YORK') echo 'teal-text text-lighten-2'; else echo 'grey-text' @endphp"><span class="text-20">from</span> $1999</p>--}}
                            {{--<p class="no-margin @php if ($_POST['txt_country'] == 'NEW YORK') echo ''; else echo 'grey-text' @endphp">Small group</p>--}}
                            {{--<p class="no-margin @php if ($_POST['txt_country'] == 'NEW YORK') echo ''; else echo 'grey-text' @endphp">Tourist to Superior</p>--}}

                            {{--<ul class="font-moserrat">--}}
                                {{--<li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 1) echo ' '; else echo 'grey-text' @endphp">--}}
                                    {{--<form ACTION="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" value="1" name="txt_iddate">--}}
                                        {{--<input type="hidden" value="january 21, 2017" name="txt_date">--}}
                                        {{--<input type="hidden" value="NEW YORK" name="txt_country">--}}
                                        {{--<input type="hidden" value="1599" name="txt_price">--}}
                                        {{--January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 1) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>--}}
                                        {{--<input type="submit" class="btn @php if ($_POST['txt_iddate'] == 1) echo ''; else echo 'grey' @endphp" value="BOOK">--}}
                                    {{--</form>--}}
                                {{--</li>--}}

                                {{--<li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 2) echo ' '; else echo 'grey-text' @endphp">--}}
                                    {{--<form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" value="1" name="txt_iddate">--}}
                                        {{--<input type="hidden" value="January 21, 2017" name="txt_date">--}}
                                        {{--<input type="hidden" value="NEW YORK" name="txt_country">--}}
                                        {{--January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 2) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>--}}
                                        {{--<input type="submit" class="btn @php if ($_POST['txt_iddate'] == 2) echo ''; else echo 'grey' @endphp" value="BOOK">--}}
                                    {{--</form>--}}
                                {{--</li>--}}

                                {{--<li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 3) echo ' '; else echo 'grey-text' @endphp">--}}
                                    {{--<form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" value="1" name="txt_iddate">--}}
                                        {{--<input type="hidden" value="January 21, 2017" name="txt_date">--}}
                                        {{--<input type="hidden" value="NEW YORK" name="txt_country">--}}
                                        {{--January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 3) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>--}}
                                        {{--<input type="submit" class="btn @php if ($_POST['txt_iddate'] == 3) echo ''; else echo 'grey' @endphp" value="BOOK">--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                                {{--<li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 4) echo ' '; else echo 'grey-text' @endphp">--}}
                                    {{--<form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" value="1" name="txt_iddate">--}}
                                        {{--<input type="hidden" value="January 21, 2017" name="txt_date">--}}
                                        {{--<input type="hidden" value="NEW YORK" name="txt_country">--}}
                                        {{--January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 4) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>--}}
                                        {{--<input type="submit" class="btn @php if ($_POST['txt_iddate'] == 4) echo ''; else echo 'grey' @endphp" value="BOOK">--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

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
                                <p class="font-moserrat blue-text">@php echo $_POST['txt_country'].' | '.$_POST['txt_date'].' | $'.$_POST['txt_price'].'' @endphp</p>
                                <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$_POST['txt_iddate']}}" name="txt_iddate">
                                    <input type="hidden" value="{{$_POST['txt_date']}}" name="txt_date">
                                    <input type="hidden" value="{{$_POST['txt_country']}}" name="txt_country">
                                    <input type="hidden" value="{{$_POST['txt_price']}}" name="txt_price">
                                    <input type="submit" class="waves-effect waves-light btn" value="BOOK NOW">
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