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
                    {{--<p class="yellow-text text-darken-3 font-moserrat text-25 no-margin">LIMA, CUSCO, SACRED VALLEY, MACHU PICCHU</p>--}}
                </div>

                <div class="row">

                    @foreach($disponibilidad as $paquete)
                        <div class="col s4 right-align">
                            <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                                <p class="no-margin text-30"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> {{$paquete->titulo}}</p>
                                @foreach($paquete->disponibilidad->sortBy('precio')->take(1) as $disponibilidad)
                                    <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span>${{$disponibilidad->precio}}</p>
                                @endforeach
                                <p class="no-margin">Small group</p>
                                <p class="no-margin">Tourist to Superior</p>
                                <ul class="font-moserrat">
                                    @foreach($paquete->disponibilidad as $disponibilidad)

                                        <li class="text-14 margin-bottom-10">
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
        <div class="section">
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

            <div class="row margin-top-40">
                <div class="col s12">
                    <div>
                        <h4 class="no-margin font-moserrat row">What's Included</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa expedita, labore magni pariatur rem totam voluptates. Assumenda, facere, similique. Autem doloremque, ea harum odio reiciendis saepe tempora veritatis voluptas?</p>
                    </div>
                </div>
                <div class="col s12">
                    <div>
                        <h4 class="no-margin font-moserrat row">What's Not Included</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa expedita, labore magni pariatur rem totam voluptates. Assumenda, facere, similique. Autem doloremque, ea harum odio reiciendis saepe tempora veritatis voluptas?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop