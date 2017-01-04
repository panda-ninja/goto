<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('css/carousel.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('css/style-freddy.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <style>

    </style>


</head>
<body>
<header class="grey darken-4">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col m4 l4 hide-on-small-only hide-on-small-and-down hide-on-med-and-down">
                <a href="/" class="brand-logo valign"><img src="{{asset('img/logos/logo-ave.png')}}" alt="" class="responsive-img"></a>
            </div>
            <div class="col s12 m8 l8">
                <ul class="header-nav white-text right-align no-margin">
                    <li>(813) 454-9707</li>
                    <li>Mon to Sun: 9am - 8pm (EST)</li>
                    @if(auth()->guard('cliente')->check())
                        <li><a href="" class="green-text text-darken-3">{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</a></li>
                        <li><a href="{{route('client_auth_destroy_path')}}" class="yellow-text text-darken-3">Logout</a></li>
                    @else
                        <li><a href="#inquire" class="modal-trigger waves-effect waves-light btn">Inquire Now</a></li>
                        <li><a href="#" class="dropdown-button waves-effect" data-activates='dropdown1' data-beloworigin="true"><img src="{{asset('img/icons/user.png')}}" alt="" class="responsive-img valign-wrapper" width="30"></a></li>
                    @endif
                </ul>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content header-nav-drop'>
                    <li><a href="{{route('client_auth_index_path')}}"><i class="material-icons right">input</i> Sign in</a></li>
                    <li><a href="#!">New acoount</a></li>
                </ul>

            </div>
        </div>
    </div>
</header>
<nav class="white font-moserrat" role="navigation">
    <div class="nav-wrapper container">
        <a href="/" class="brand-logo"><img src="{{asset('img/logos/logo5.png')}}" alt=""></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{route('home_show_packages_path')}}">Programs</a></li>
            <li><a href="{{route('home_path')}}#vacations">Vacation Packages</a></li>
            <li><a href="#design">Design</a></li>
            <li></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">All Included</a></li>
            <li><a href="badges.html">Ground Package</a></li>
            <li><a href="collapsible.html">Offers</a></li>
            <li><a href="mobile.html">Design</a></li>
        </ul>
    </div>
</nav>


<!-- Modal Structure -->
<div id="inquire" class="modal modal-inquire">
    <div class="modal-content font-moserrat">
        <div class="row">
            <div class="col s12">
                <p>EMAIL US AT INFO@GOTOPERU.COM OR PLEASE FILL THE FOLLOWING FORM:</p>
            </div>
        </div>
        <form action="" method="post">
            {{csrf_field()}}
            <div class="row left-align">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Full Name</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input id="icon_telephone" type="email" class="validate">
                    <label for="icon_telephone">Email</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" type="email" class="validate">
                    <label for="icon_telephone">Phone</label>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Comment</label>
                    </div>
                </div>

                <div class="col s12 center">
                    <button class="btn waves-effect waves-light yellow darken-4" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

@yield('content')

<div class="row testimonials-box">
    <img src="{{asset('img/banners/banner_1.jpg')}}" alt="" class="responsive-img">
    <div class="col s5 testimonials-box-text margin-top-40">
        <i class="material-icons right white-text">format_quote</i>
        <h5 class="white-text margin-top-80">Everything about this trip was wonderful and it was because of the
            service and attention of the great staff at GOTOPERU</h5>
        <p class="white-text right-align">ennifer Powers & Family New York - USA</p>
        <a href="" class="btn waves-effect right">View all testimonials</a>
    </div>
</div>

<div class="container">
    <div class="section scrollspy" id="design">
        <div class="row center">
            <h4>Design Your <b>TRIP</b></h4>
        </div>
    </div>
</div>

<div class="margin-bottom-50">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <h5 class="yellow-text text-darken-3">SELECT <b>DESTINATIONS</b></h5>
                <h6 class="font-moserrat text-18 red-text text-darken-4 center">PERU</h6>
                <div class="divider"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/machupicchu-2.jpg')}}" id="img_filter_cusco">
                        <span class="card-title">
                                <input type="checkbox" id="cusco" onchange="javascript:imgfilter('cusco')"
                                       class="yellow-text"/>
                                <label for="cusco">Cusco & Machupicchu</label>
                            </span>
                        <div id="check_i_cusco" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/ballestas.jpg')}}" id="img_filter_ballestas">
                        <span class="card-title">
                                <input type="checkbox" id="ballestas" onchange="javascript:imgfilter('ballestas')"/>
                                <label for="ballestas">Ballestas Island & Paracas</label>
                            </span>
                        <div id="check_i_ballestas" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/colca.jpg')}}" id="img_filter_arequipa">
                        <span class="card-title">
                                <input type="checkbox" id="arequipa" onchange="javascript:imgfilter('arequipa')"/>
                                <label for="arequipa">Arequipa & Colca Canyon</label>
                            </span>
                        <div id="check_i_arequipa" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/amazon.jpg')}}" id="img_filter_amazon">
                        <span class="card-title">
                                <input type="checkbox" id="amazon" onchange="javascript:imgfilter('amazon')"/>
                                <label for="amazon">Amazon</label>
                            </span>
                        <div id="check_i_amazon" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/lima.jpg')}}" id="img_filter_lima">
                        <span class="card-title">
                                <input type="checkbox" id="lima" onchange="javascript:imgfilter('lima')"/>
                                <label for="lima">Lima</label>
                            </span>
                        <div id="check_i_lima" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/nazca.jpg')}}" id="img_filter_nazca">
                        <span class="card-title">
                                <input type="checkbox" id="nazca" onchange="javascript:imgfilter('nazca')"/>
                                <label for="nazca">Nazca Lines</label>
                            </span>
                        <div id="check_i_nazca" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/puno.jpg')}}" id="img_filter_puno">
                        <span class="card-title">
                                <input type="checkbox" id="puno" onchange="javascript:imgfilter('puno')"/>
                                <label for="puno">Puno & Titicaca</label>
                            </span>
                        <div id="check_i_puno" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/trujillo.jpg')}}" id="img_filter_trujillo">
                        <span class="card-title">
                                <input type="checkbox" id="trujillo" onchange="javascript:imgfilter('trujillo')"/>
                                <label for="trujillo">Trujillo &amp; Chiclayo</label>
                            </span>
                        <div id="check_i_trujillo" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h6 class="font-moserrat text-18 red-text text-darken-4 center">MULTICOUNTRIES</h6>
                <div class="divider"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/galapagos.jpg')}}" id="img_filter_galapagos">
                        <span class="card-title">
                                <input type="checkbox" id="galapagos" onchange="javascript:imgfilter('galapagos')"/>
                                <label for="galapagos">Galapagos (Ecuador)</label>
                            </span>
                        <div id="check_i_galapagos" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/rio.jpg')}}" id="img_filter_rio">
                        <span class="card-title">
                                <input type="checkbox" id="rio" onchange="javascript:imgfilter('rio')"/>
                                <label for="rio">Rio &amp; Iguazu (Brasil)</label>
                            </span>
                        <div id="check_i_rio" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/patagonia.jpg')}}" id="img_filter_buenos">
                        <span class="card-title">
                                <input type="checkbox" id="buenos" onchange="javascript:imgfilter('buenos')"/>
                                <label for="buenos">Buenos Aires (Argentina)</label>
                            </span>
                        <div id="check_i_buenos" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col s3">
                <div class="card hoverable card-customize">
                    <div class="card-image">
                        <img src="{{asset('img/form/uyuni.jpg')}}" id="img_filter_uyuni">
                        <span class="card-title">
                                <input type="checkbox" id="uyuni" onchange="javascript:imgfilter('uyuni')"/>
                                <label for="uyuni">Uyuni (Bolivia)</label>
                            </span>
                        <div id="check_i_uyuni" class="hide">
                            <i class="material-icons blue-text text-lighten-1">check_circle</i>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row margin-top-20">
            <div class="col s12">
                <h5 class="yellow-text text-darken-3">HOTEL <b>CATEGORY</b></h5>
                <p class="font-moserrat">(<span class="red-text darken-4">Optional</span> you may choose more than
                    one)</p>
            </div>
        </div>

        <div class="row form-optional-check">
            <div class="col s3">
                <input type="checkbox" class="filled-in" id="luxury"/>
                <label for="luxury" class="hoverable">Luxury 5 Stars</label>
            </div>
            <div class="col s3">
                <input type="checkbox" class="filled-in" id="superior"/>
                <label for="superior" class="hoverable">Superior 4 Stars</label>
            </div>
            <div class="col s3">
                <input type="checkbox" class="filled-in" id="best"/>
                <label for="best" class="hoverable">Best Value 3 Stars</label>
            </div>
            <div class="col s3">
                <input type="checkbox" class="filled-in" id="budget"/>
                <label for="budget" class="hoverable">Budget 2 Stars</label>
            </div>
        </div>

        <div class="row margin-top-20">
            <div class="col s12">
                <h5 class="yellow-text text-darken-3">Trip <b>length</b></h5>
                <p class="font-moserrat">Cuanto tiempo desea que sea su viaje</p>
            </div>
        </div>

        <div class="row form-optional-check">
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="3d"/>
                <label for="3d" class="hoverable">03 - 05 <span>DAYS</span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="6d"/>
                <label for="6d" class="hoverable">06 - 08 <span>DAYS</span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="9d"/>
                <label for="9d" class="hoverable">09 - 11 <span>DAYS</span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="12d"/>
                <label for="12d" class="hoverable">12 - 15 <span>DAYS</span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="16d"/>
                <label for="16d" class="hoverable">16+ <span>DAYS</span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="unknow"/>
                <label for="unknow" class="hoverable">UNKNOW</label>
            </div>
        </div>


        <div class="row margin-top-20">
            <div class="col s12">
                <h5 class="yellow-text text-darken-3">NUMBER OF <b>TRAVELERS</b></h5>
                <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
            </div>
        </div>

        <div class="row form-check-travelers">
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="1p"/>
                <label for="1p" class="hoverable">1 <span><i class="material-icons">person</i></span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="2p"/>
                <label for="2p" class="hoverable">2 <span><i class="material-icons">person</i></span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="3p"/>
                <label for="3p" class="hoverable">3 <span><i class="material-icons">person</i></span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="4p"/>
                <label for="4p" class="hoverable">4 <span><i class="material-icons">person</i></span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="5p"/>
                <label for="5p" class="hoverable">5+ <span><i class="material-icons">person</i></span></label>
            </div>
            <div class="col s2">
                <input type="checkbox" class="filled-in" id="undecided"/>
                <label for="undecided" class="hoverable text-14">UNDECIDED</label>
            </div>
        </div>

        <div class="row margin-top-20">
            <div class="col s12">
                <h5 class="yellow-text text-darken-3">PERSONAL <b>INFORMATION</b></h5>
                <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
            </div>
        </div>


        <div class="row form-design">
            <div class="col s6">
                <div class="input-field col s12">
                    <i class="material-icons prefix grey-text text-darken-1">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Name</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix grey-text text-darken-1">mail</i>
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix grey-text text-darken-1">phone</i>
                    <input id="icon_telephone" type="tel" class="validate">
                    <label for="icon_telephone">Telephone</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix grey-text text-darken-1">date_range</i>
                    <input id="last_name" type="date" class="datepicker">
                    <label for="last_name">Travel Date</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix grey-text text-darken-1">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Comentarios</label>
                </div>
            </div>

            <div class="col s6">
                <img src="{{asset('img/why/team-travel.jpg')}}" alt="" class="responsive-img">
                <div class="col s4">
                    <img src="{{asset('img/logos/prom-peru.png')}}" alt="" class="responsive-img">
                </div>
                <div class="col s8">
                    <p>Our Local representatives will receive and send you the first travel plan "A" in less than 24
                        hours.</p>
                    <p>And based on your important feedback we will customize a new plan B, C ... until we design
                        together a dream vacations!</p>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col s12 center">
                <a href="" class="waves-effect waves-light btn-large"><i class="material-icons right">send</i>
                    Submit</a>
            </div>
        </div>

    </div>
    {{--<div class="container">--}}
    {{----}}
    {{--</div>--}}
</div>

<div class="row">


    <div id="sync1" class="owl-carousel">
        <div class="item"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>

    </div>

    <div id="sync2" class="owl-carousel">
        <div class="item"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>
    </div>


</div>

<div class="container margin-top-40 margin-bottom-40">
    <div class="section">
        <div class="row center">
            <h4>THERE'S AN AMAZING <b>"LOST CITY"</b> OUT THERE</h4>
            <p>Closer than you think: 8 hours from New York or Los Angeles!</p>
        </div>
        <div class="row">
            <div class="col s5">
                <h5 class="margin-top-40">WE ARE ONE PERU´S LEADING GROUP TRAVEL PROVIDERS : GOTOPERU</h5>
                <p>A local company with local knowledge, expertise and resources, specializing in the design of
                    unforgettable vacations. Our unique activities, Peru tours & excursions, Peru hotel deals,
                    transportation and program logistics make us Peru leading travel experts. GOTOPERU offer you
                    every kind of travel services you need; ranging from all inclusive Peru travel packages,
                    accommodations, and entertainment and leisure activities. In addition offering different types
                    of travel products like "Online-Booking" and personal "Custom-made Trips"</p>
            </div>
            <div class="col s7">
                <div class="content-video-1">
                    <img src="{{asset('img/prom-peru.jpg')}}" alt="video" class="responsive-img">

                    <div class="content-video-btn-1">
                        <a href="https://player.vimeo.com/video/102732914?title=0&amp;byline=0&amp;portrait=0&amp;color=11b1c2&amp;wmode=opaque"
                           class="html5lightbox content-vbtn-color-blue" data-width="570" data-height="320"
                           title="title here "><i class="material-icons">play_circle_filled</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">
        <div class="row center">
            <h4>WHY <b>GOTOPERU</b></h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="section">
        <div class="row" id="demo2">
            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/service.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#1 PERSONALIZE SERVICE</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>Small Groups and Private tours</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>Our groups range from 4 to 14 travelers with an average of 7-9, and always with the
                            option to upgrade to Vip services with a private guide and private driver.</p>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/local-travel.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#2 LOCAL OPERATOR</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>We live here, trully a 24/7 Assistance</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>Always you will have a direct local number where to call, from a last minute itinerary
                            change or to request a doctor to come to your hotel.</p>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/team-travel.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#3 BEST QUOTES</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>Cutting the middlemen, headquarters at Peru</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>You are free to compare we will be able to beat any publish price, we live and work here,
                            you dont have to pay high overhead cost from other overseas agencies.</p>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/testimonials.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#4 BEST TESTIMONIALS</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>We take pride of our tripadvisor reviews!</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>The most important rewards are the authentic hundreds reviews we receive in different
                            travel boards, from single travelers to university trips.</p>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/daily.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#5 DAILY DEPARTURES</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>We can adapt to any arrival and departure</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>We know that international airfares are a factor for that reason we can adapt any of our
                            programs to any arrival flight to Lima or Cusco.</p>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('img/why/convenient.jpg')}}" class="circle responsive-img">
                        <span class="card-title text-14"><b>#6 CONVENIENT</b></span>
                    </div>
                    <div class="card-content">
                        <p><b>Book Now option or Customize a dream trip!</b></p>
                        <div class="divider spacer-margin-10"></div>
                        <p>You can now book a lifetime trip in 5 minutes and be ready to Vacation to the Land of the
                            Incas, or you can also leave our travel local peruvian advisors the design of a lifetime
                            trip!.</p>
                    </div>
                </div>
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

<script src="{{asset('js/readmore.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>--}}
<script src="{{asset('js/init.js')}}"></script>

<script>
    $('#demo').readmore({
        speed: 500,
        collapsedHeight: 470
    });
    $('#demo2').readmore({
        speed: 500,
        collapsedHeight: 440
    });

</script>

<script type="text/javascript">
    function imgfilter(id) {
        var nombre= document.getElementById(id);
        if (nombre.checked) {
            $('#check_i_'+id).addClass('check-form');
            $('#img_filter_'+id).addClass('desaturada');
        }
        else {
            $('#check_i_'+id).removeClass('check-form');
            $('#img_filter_'+id).removeClass('desaturada');
        }
    }
</script>

<script>
    $(document).ready(function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            singleItem : true,
            slideSpeed : 1000,
            navigation: false,
            pagination:false,
            afterAction : syncPosition,
            responsiveRefreshRate : 200,
        });

        sync2.owlCarousel({
            items : 4,
            itemsDesktop      : [1199,10],
            itemsDesktopSmall     : [979,10],
            itemsTablet       : [768,8],
            itemsMobile       : [479,4],
            pagination:false,
            responsiveRefreshRate : 100,
            afterInit : function(el){
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el){
            var current = this.currentItem;
            $("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced")
            if($("#sync2").data("owlCarousel") !== undefined){
                center(current)
            }

        }

        $("#sync2").on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
        });

        function center(number){
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

            var num = number;
            var found = false;
            for(var i in sync2visible){
                if(num === sync2visible[i]){
                    var found = true;
                }
            }

            if(found===false){
                if(num>sync2visible[sync2visible.length-1]){
                    sync2.trigger("owl.goTo", num - sync2visible.length+2)
                }else{
                    if(num - 1 === -1){
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if(num === sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if(num === sync2visible[0]){
                sync2.trigger("owl.goTo", num-1)
            }
        }

    });
</script>
<script>
    // JQUERY STICKY KIT
    // http://leafo.net/sticky-kit/

    $('#pinned')
        .stick_in_parent({
            parent: '.main-wrapper',
            offset_top: 25
        })
        .on('sticky_kit:bottom', function(e) {
            $(this).parent().css('position', 'static');
        })
        .on('sticky_kit:unbottom', function(e) {
            $(this).parent().css('position', 'relative');
        })
</script>

<script>
    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
        columnWidth: '.grid-item'
    });
</script>


</body>
</html>
