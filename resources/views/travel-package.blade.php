@extends('layouts.default')

@section('content')

    {{--<div class="parallax-container parallax-container-1">--}}
        {{--<div class="parallax">--}}
            {{--<img src="{{asset('img/bg/meetup3.jpg')}}" alt="">--}}
        {{--</div>--}}
    {{--</div>--}}

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
            <div class="row main-wrapper">

                    <div class="col s12 m9 l7">
                        <div>
                            <h4 class="no-margin font-moserrat row">ITINERARY</h4>
                        </div>
                        @foreach($paquetes as $paquete)
                            @foreach($paquete->itinerario as $itinerario)

                                <div id="days-{{$itinerario->iditinerario}}" class="scrollspy clearfix">
                                    <p class="text-18 font-moserrat"><b class="blue-text">DAY {{$itinerario->dia}}:</b> {{$itinerario->titulo}}</p>

                                    <div class="col s7 no-padding">
                                        <p class="no-margin">@php echo $itinerario->descripcion @endphp</p>
                                    </div>
                                    <div class="col s5">
                                        <img src="{{asset('img/maps/GTP600.jpg')}}" alt="" class="responsive-img">

                                    </div>
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
                        </div>
                    </div>
            </div>
            <div class="row">
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

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center margin-bottom-30">
                    <h3 class="grey-text text-darken-2 no-margin">7 DAYS</h3>
                    {{--<p class="yellow-text text-darken-3 font-moserrat text-25 no-margin">LIMA, CUSCO, SACRED VALLEY, MACHU PICCHU</p>--}}
                </div>

                <div class="row">
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> NEW YORK</p>
                            <p class="no-margin text-50 teal-text text-lighten-2 font-moserrat"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin">Small group</p>
                            <p class="no-margin">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10">January 21, 2017 <span class="blue-text">$1499</span> <a href="{{route('home_show_path', array('titulo'=>'discover-lima-and-machu-picchu-from-miami', 'dias'=>'6-days-tours'))}}" class="btn"> BOOK</a></li>
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

@stop