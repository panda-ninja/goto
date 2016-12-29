@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="section">
            <div class="row center">
                <h4 class="yellow-text text-darken-4">TRAVEL <b>PACKAGES</b></h4>
                <p class="lime-text text-darken-4 font-moserrat text-20 no-margin">MACHUPICCHU TOURS WITH AIR FROM US</p>
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