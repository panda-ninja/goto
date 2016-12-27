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
            <div class="row">
                <div class="col s12 center margin-bottom-30">
                    <h3 class="grey-text text-darken-2 no-margin">7 DAYS</h3>
                    {{--<p class="yellow-text text-darken-3 font-moserrat text-25 no-margin">LIMA, CUSCO, SACRED VALLEY, MACHU PICCHU</p>--}}
                </div>

                <div class="row">

                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30 @php if ($_POST['txt_country'] == 'NEW YORK') echo ' '; else echo 'grey-text' @endphp"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> NEW YORK</p>
                            <p class="no-margin text-50 font-moserrat @php if ($_POST['txt_country'] == 'NEW YORK') echo 'teal-text text-lighten-2'; else echo 'grey-text' @endphp"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'NEW YORK') echo ''; else echo 'grey-text' @endphp">Small group</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'NEW YORK') echo ''; else echo 'grey-text' @endphp">Tourist to Superior</p>

                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 1) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        <input type="hidden" value="1599" name="txt_price">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 1) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 1) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 2) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 2) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 2) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 3) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 3) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 3) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 4) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 4) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 4) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30 @php if ($_POST['txt_country'] == 'MIAMI') echo ' '; else echo 'grey-text' @endphp"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> MIAMI</p>
                            <p class="no-margin text-50 font-moserrat @php if ($_POST['txt_country'] == 'MIAMI') echo 'teal-text text-lighten-2'; else echo 'grey-text' @endphp"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'MIAMI') echo ''; else echo 'grey-text' @endphp">Small group</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'MIAMI') echo ''; else echo 'grey-text' @endphp">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 5) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 5) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 5) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 6) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 6) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 6) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 7) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 7) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 7) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 8) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 8) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 8) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s4 right-align">
                        <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                            <p class="no-margin text-30 @php if ($_POST['txt_country'] == 'LOS ANGELES') echo ' '; else echo 'grey-text' @endphp"><a href="" class="left"><img src="{{asset('img/icons/pdf.png')}}" alt="" width="50"></a> LOS ANGELES</p>
                            <p class="no-margin text-50 font-moserrat @php if ($_POST['txt_country'] == 'MIAMI') echo 'teal-text text-lighten-2'; else echo 'grey-text' @endphp"><span class="text-20">from</span> $1999</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'LOS ANGELES') echo ''; else echo 'grey-text' @endphp">Small group</p>
                            <p class="no-margin @php if ($_POST['txt_country'] == 'LOS ANGELES') echo ''; else echo 'grey-text' @endphp">Tourist to Superior</p>
                            <ul class="font-moserrat">
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 9) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 9) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 9) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 10) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 10) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] ==10) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>

                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 11) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 11) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 11) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                                <li class="text-14 margin-bottom-10 @php if ($_POST['txt_iddate'] == 12) echo ' '; else echo 'grey-text' @endphp">
                                    <form action="{{route('home_show_checkout_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'7-days-tours'))}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="txt_iddate">
                                        <input type="hidden" value="January 21, 2017" name="txt_date">
                                        <input type="hidden" value="NEW YORK" name="txt_country">
                                        January 21, 2017 <span class="@php if ($_POST['txt_iddate'] == 12) echo 'blue-text'; else echo 'grey-text' @endphp">$1499</span>
                                        <input type="submit" class="btn @php if ($_POST['txt_iddate'] == 12) echo ''; else echo 'grey' @endphp" value="BOOK">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row main-wrapper">

                    <div class="col s12 m9 l7">
                        <a href="" class></a>
                        <form action="{{route('checkout_package_path', array('titulo'=>'SPECIAL-PERU', 'dias'=>'6-days-tours'))}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="txt_code">
                            <input type="text" name="txt_date">
                            <button type="submit" class="btn"> CHECKOUT</button>
                        </form>
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