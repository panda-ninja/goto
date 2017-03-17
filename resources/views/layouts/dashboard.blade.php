<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</title>

    <!-- CSS  -->
    <link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Oleo+Script' rel='stylesheet' type='text/css'>
</head>
<body>
<header class="grey darken-4">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col m5 l6 hide-on-small-only hide-on-small-and-down hide-on-med-and-down">
                <a href="{{route('quotes_path')}}" class="brand-logo valign"><img src="{{asset('img/logos/logo-ave-5.png')}}" alt="" class="responsive-img"></a>
            </div>
            <div class="col s12 m8 l6">
                <ul class="header-nav white-text right-align valign">
                    <li>(813) 600-3042</li>
                    @if(auth()->guard('cliente')->check())
                            <li><a href="" class="green-text text-darken-3">{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</a></li>
                            <li><a href="{{route('client_auth_destroy_path')}}" class="yellow-text text-darken-3">Logout</a></li>
                        @else
                            <li><a href="{{route('client_auth_index_path')}}" class="white-text">sign in</a></li>
                            <li><a href="" class="yellow-text text-darken-3">new account</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a href="{{route('quotes_path')}}" class="brand-logo"><img src="{{asset('img/logos/logo5.png')}}" alt=""></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">Only Tours</a></li>
            <li><a href="badges.html">Ground Packages</a></li>
            <li><a href="collapsible.html">With Flight</a></li>
            <li><a href="mobile.html">Design My Trip</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Only Tours</a></li>
            <li><a href="badges.html">Ground Packages</a></li>
            <li><a href="collapsible.html">With Flight</a></li>
            <li><a href="mobile.html">Design My Trip</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="section">
        <!-- Page Layout here -->
        <div class="row">

            <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
                <!-- Grey navigation panel

                      This content will be:
                  3-columns-wide on large screens,
                  4-columns-wide on medium screens,
                  12-columns-wide on small screens  -->
                <div class="center box-client-right">
                    {{--<i class="material-icons grey-text">person</i>--}}
                    {{--<img src="{{asset('img/icons/user2.png')}}" alt="" class="responsive-img">--}}
                    {{--<img src="{{ Gravatar::src($clienteCotizaciones->cliente->nombres, 200) }}" alt="">--}}
                    <img src="{{ Gravatar::src(auth()->guard('cliente')->user()->email, 100) }}" class="circle">
                    <p><b>PROFILE</b></p>
                    <p><b class="yellow-text text-darken-3">{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</b></p>

                    <a href="{{route('proposals_path')}}" class="grey-text hide">
                        <blockquote class="grey lighten-4 spacer-10">
                        @foreach($cotizaciones->take(1) as $cotizacion)
                            <p><i class="material-icons red-text">notifications</i></p>
                            <p>Ultima Cotizacion</p>

                            <p>{{$cotizacion->nropersonas}} Travelers</p>
                            <p>{{$cotizacion->fecha}}</p>
                            <?php $i=1; ?>
                            <p class="text-16 blue-text text-lighten-2"><b>TRAVEL PROPOSALS
                                ({{$cotizacion->paquete_cotizaciones->count()}})</b>
                            </p>

                        @endforeach
                        </blockquote>
                    </a>


                </div>


                <div class="collection">
                    @php $k = 0; @endphp
                    @foreach($paquetes_num as $paquetes_n)
                        @foreach($paquetes_n->cotizaciones->cliente_cotizaciones as $paquetes_n2)
                            @if($paquetes_n2 AND $paquetes_n->estado == 1)

                                @php $k++; @endphp

                            @endif
                        @endforeach
                    @endforeach

                    @if($k > 0)
                        @php $num = ''; @endphp
                    @else
                        @php $num = 'hide'; @endphp
                    @endif

                    <a href="{{route('quotes_path')}}" class="collection-item">Quotes <span class="new badge red {{$num}}">{{$k}}</span></a>

                    <a href="{{route('history_path')}}" class="collection-item">Billing history</a>
                    {{--<a href="#!" class="collection-item">Reports</a>--}}
                    {{--<a href="#!" class="collection-item">Wish list</a>--}}
                    <a href="{{route('client_edit_path', auth()->guard('cliente')->user()->id)}}" class="collection-item">Profile</a>
                </div>

            </div>

            <div class="col s12 m8 l9 position-relative"> <!-- Note that "m8 l9" was added -->
                @yield('content')
            </div>

        </div>
    </div>
</div>

<footer class="no-padding">
    <div>
        <img src="{{asset('img/banners/footer-1.jpg')}}" alt="" class="responsive-img">
    </div>
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">ABOUT US</h5>
                <p class="grey-text text-lighten-4">Is built on one very simple principle. Do the right thing all the time, every time. For our team, for our travelers, for the people and places we visit ...
                    <a href="">read more</a></p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">GOTOPERU GROUP</h5>
                <ul>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">English:</b> www.gotoperu.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">Portuguese:</b> www.andesviagens.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">French:</b> www.andesperou.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">Luxury:</b> www.incaluxury.com</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">COMPANY INFO</h5>
                <ul>
                    <li></li>
                    <li class="light white-text text-darken-3"><b>USA:</b> 1(800) 610-8406</a></li>
                    <li class="light white-text text-darken-3"><b>CHILE:</b> 1(230) 020-9019</li>
                    <li class="light white-text text-darken-3"><b>BRAZIL:</b>(11) 3230-1121</li>
                    <li class="light white-text text-darken-3"><b>PERU:</b> (51) 84 262-555</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container orange-text">
            Made by <a class="brown-text text-lighten-3" href="">PandaNinja</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>
<script src="{{asset('js/jquery.printPage.js')}}"></script>

@yield('scripts')

<script>
    $('.collapsible').collapsible({
        accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        onOpen: function(el) { alert('Open'); }, // Callback for Collapsible open
        onClose: function(el) { alert('Closed'); } // Callback for Collapsible close
    });
</script>
<script>
    $(document).ready(function () {
        $(".btnPrint").printPage();
    })
</script>
</body>
</html>
