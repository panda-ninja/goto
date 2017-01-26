<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="author" content="info@gotoperu.com | hidalgochpnce@gmail.com" />
    {!! SEOMeta::generate() !!}

    <!-- CSS  -->
    <link href="{{elixir('css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{elixir('css/carousel.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('css/style-freddy.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="{{asset('img/icons/favicon/favicon.ico')}}" rel="icon" type="image/x-icon">


</head>
<body>
<header class="grey darken-4 hide-on-small-only">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col m5 l5 hide-on-small-only hide-on-small-and-down hide-on-large-and-down">
                <a href="/" class="brand-logo valign"><img src="{{asset('img/logos/logo-ave.png')}}" alt="" class="responsive-img"></a>
            </div>
            <div class="col s12 m8 l7">
                <ul class="header-nav white-text right-align no-margin valign-wrapper right">
                    <li class="header-phone">(813) 454-9707</li>
                    @if(auth()->guard('cliente')->check())
                        <li><a href="" class="green-text text-darken-3">{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</a></li>
                        <li><a href="{{route('client_auth_destroy_path')}}" class="yellow-text text-darken-3">Logout</a></li>
                    @else
                        <li class="hide-on-med-only hide-on-small-only"><a href="#" class="waves-effect waves-light btn lime darken-4 btn-header" onclick="startOlark()"><i class="material-icons left">chat</i> Chat</a></li>
                        <li><a href="#inquire" class="modal-trigger waves-effect waves-light btn btn-header">Inquire Now</a></li>
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
        <a href="/" class="brand-logo"><img src="{{asset('img/logos/logo5.png')}}" alt="" class="responsive-img"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{route('home_show_packages_path')}}">Tours Packages</a></li>
            <li><a href="https://gotoperu.com/destinations/">Destinations</a></li>
            <li class="hide-ipad-large"><a href="https://gotoperu.com/getting-to-peru/">Getting to Peru</a></li>
            <li><a href="https://gotoperu.com/about-us/">About Us</a></li>
            <li><a href="https://gotoperu.com/faq/">FAQ</a></li>
            <li><a href="#design" class="yellow-text text-darken-4 header-top-menu">DESIGN</a></li>
            <li></li>
        </ul>

        <ul class="side-nav" id="mobile-demo">
            <li><div class="userView">
                    <div class="background">
                        <img src="{{asset('img/why/local-travel.jpg')}}" class="responsive-img">
                    </div>
                    <a href="#!user"><img class="circle" src="{{asset('img/logos/logo-ave-gotoperu.png')}}"></a>
                    <a href="#!name"><span class="white-text name">Once in your lifetime!</span></a>
                    <a href="#!email"><span class="white-text email">(813) 454-9707</span></a>
                </div>
            </li>
            <li><a href="#!" class="waves-effect"><i class="material-icons">input</i>Sign in</a></li>
            <li><a href="#!" class="waves-effect"><i class="material-icons">account_circle</i> New acoount</a></li>
            <li><div class="divider"></div></li>
            <li><a href="#inquire" class="modal-trigger waves-effect yellow-text text-darken-4"><i class="material-icons yellow-text text-darken-4">message</i>Inquire now</a></li>
            <li><a href="#design" class="waves-effect"><i class="material-icons">brush</i>Design my trip</a></li>
            <li><div class="divider"></div></li>
            {{--<li><a class="subheader">Subheader</a></li>--}}
            <li><a href="{{route('home_show_packages_path')}}" class="waves-effect">Tours Packages</a></li>
            <li><a href="https://gotoperu.com/destinations/" class="waves-effect">Destinations</a></li>
            <li><a href="https://gotoperu.com/getting-to-peru/" class="waves-effect">Getting to Peru</a></li>
            <li><a href="https://gotoperu.com/about-us/" class="waves-effect">About Us</a></li>
            <li><a href="https://gotoperu.com/faq/" class="waves-effect">FAQ</a></li>

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
        <form id="i_form">
            {{csrf_field()}}
            <div class="row left-align">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="i_name" name="txt_name" type="text" class="validate">
                    <label for="txt_name">Full Name</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input id="i_email" type="email" class="validate">
                    <label for="i_email">Email</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input id="i_telephone" type="text" class="validate">
                    <label for="i_telephone">Phone</label>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="i_comment" class="materialize-textarea"></textarea>
                        <label for="i_comment">Comment</label>
                    </div>
                </div>

                <div class="col s12 center">
                    <button class="btn waves-effect waves-light yellow darken-4" id="i_send" type="button" onclick="sendInquire()">Submit
                        <i class="material-icons right">send</i>
                    </button>
                    {{--<input class="btn waves-effect waves-light yellow darken-4" id="f_send" value="Send"  type="button" onclick="sendInquire()">--}}

                </div>
                <div class="col s12">
                    <div class="row center margin-top-10 margin-bottom-10">
                        <div id="i_congratulation" class="hidden card green padding-10">
                            <p class="white-text no-margin center"></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@yield('content')

<div class="row testimonials-box hide-on-small-only">
    <img src="{{asset('img/banners/banner_1.jpg')}}" alt="" class="responsive-img">
    <div class="col s5 testimonials-box-text margin-top-40">
        <i class="material-icons right white-text">format_quote</i>
        <h5 class="white-text margin-top-80 margin-top-ip-0">Everything about this trip was wonderful and it was because of the
            service and attention of the great staff at GOTOPERU</h5>
        <p class="white-text right-align hide-on-med-only">ennifer Powers & Family New York - USA</p>
        <a href="" class="btn waves-effect right hide-on-med-only">View all testimonials</a>
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
        <form id="d_form">
            {{csrf_field()}}
            <div class="row">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">SELECT <b>DESTINATIONS</b></h5>
                    <h6 class="font-moserrat text-18 red-text text-darken-4 center">PERU</h6>
                    <div class="divider"></div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/machupicchu-2.jpg')}}" id="img_filter_d_cusco">
                            <span class="card-title">
                                    <input type="checkbox" id="d_cusco" value="Cusco y Machupicchu" name="peru[]" onchange="javascript:imgfilter('d_cusco')"
                                           class="yellow-text"/>
                                    <label for="d_cusco">Cusco & Machupicchu</label>
                                </span>
                            <div id="check_i_d_cusco" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/ballestas.jpg')}}" id="img_filter_d_ballestas">
                            <span class="card-title">
                                    <input type="checkbox" id="d_ballestas" value="Islas Ballestas y Paracas" name="peru[]" onchange="javascript:imgfilter('d_ballestas')"/>
                                    <label for="d_ballestas">Ballestas Island & Paracas</label>
                                </span>
                            <div id="check_i_d_ballestas" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/colca.jpg')}}" id="img_filter_d_arequipa">
                            <span class="card-title">
                                    <input type="checkbox" id="d_arequipa" value="Arequipa y Caño del Colca" name="peru[]" onchange="javascript:imgfilter('d_arequipa')"/>
                                    <label for="d_arequipa">Arequipa & Colca Canyon</label>
                                </span>
                            <div id="check_i_d_arequipa" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/amazon.jpg')}}" id="img_filter_d_amazon">
                            <span class="card-title">
                                    <input type="checkbox" id="d_amazon" value="Amazonas" name="peru[]" onchange="javascript:imgfilter('d_amazon')"/>
                                    <label for="d_amazon">Amazon</label>
                                </span>
                            <div id="check_i_d_amazon" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/lima.jpg')}}" id="img_filter_d_lima">
                            <span class="card-title">
                                    <input type="checkbox" id="d_lima" value="Lima" name="peru[]" onchange="javascript:imgfilter('d_lima')"/>
                                    <label for="d_lima">Lima</label>
                                </span>
                            <div id="check_i_d_lima" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/nazca.jpg')}}" id="img_filter_d_nazca">
                            <span class="card-title">
                                    <input type="checkbox" id="d_nazca" value="Lineas de Nazca" name="peru[]" onchange="javascript:imgfilter('d_nazca')"/>
                                    <label for="d_nazca">Nazca Lines</label>
                                </span>
                            <div id="check_i_d_nazca" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/puno.jpg')}}" id="img_filter_d_puno">
                            <span class="card-title">
                                    <input type="checkbox" id="d_puno" value="Puno y Titicaca" name="peru[]" onchange="javascript:imgfilter('d_puno')"/>
                                    <label for="d_puno">Puno & Titicaca</label>
                                </span>
                            <div id="check_i_d_puno" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/trujillo.jpg')}}" id="img_filter_d_trujillo">
                            <span class="card-title">
                                    <input type="checkbox" id="d_trujillo" value="Trujillo y Chiclayo" name="peru[]" onchange="javascript:imgfilter('d_trujillo')"/>
                                    <label for="d_trujillo">Trujillo &amp; Chiclayo</label>
                                </span>
                            <div id="check_i_d_trujillo" class="hide">
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
                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/galapagos.jpg')}}" id="img_filter_d_galapagos">
                            <span class="card-title">
                                    <input type="checkbox" id="d_galapagos" value="Galapagos" name="multicountries[]" onchange="javascript:imgfilter('d_galapagos')"/>
                                    <label for="d_galapagos">Galapagos (Ecuador)</label>
                                </span>
                            <div id="check_i_d_galapagos" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/rio.jpg')}}" id="img_filter_d_rio">
                            <span class="card-title">
                                    <input type="checkbox" id="d_rio" value="Rio" name="multicountries[]" onchange="javascript:imgfilter('d_rio')"/>
                                    <label for="d_rio">Rio &amp; Iguazu (Brasil)</label>
                                </span>
                            <div id="check_i_d_rio" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/patagonia.jpg')}}" id="img_filter_d_buenos">
                            <span class="card-title">
                                    <input type="checkbox" id="d_buenos" value="Buenos Aires" name="multicountries[]" onchange="javascript:imgfilter('d_buenos')"/>
                                    <label for="d_buenos">Buenos Aires (Argentina)</label>
                                </span>
                            <div id="check_i_d_buenos" class="hide">
                                <i class="material-icons blue-text text-lighten-1">check_circle</i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col s12 m3 l3">
                    <div class="card hoverable card-customize">
                        <div class="card-image">
                            <img src="{{asset('img/form/uyuni.jpg')}}" id="img_filter_d_uyuni">
                            <span class="card-title">
                                    <input type="checkbox" id="d_uyuni" value="Uyuni" name="multicountries[]" onchange="javascript:imgfilter('d_uyuni')"/>
                                    <label for="d_uyuni">Uyuni (Bolivia)</label>
                                </span>
                            <div id="check_i_d_uyuni" class="hide">
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
                <div class="col s6 m3 l3 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_budget" name="hotel[]" value="Budget 2 Stars"/>
                    <label for="d_budget" class="hoverable">Budget 2 Stars</label>
                </div>
                <div class="col s6 m3 l3 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_best" name="hotel[]" value="Best Value 3 Stars"/>
                    <label for="d_best" class="hoverable">Best Value 3 Stars</label>
                </div>
                <div class="col s6 m3 l3 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_superior" name="hotel[]" value="Superior 4 Stars"/>
                    <label for="d_superior" class="hoverable">Superior 4 Stars</label>
                </div>
                <div class="col s6 m3 l3 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_luxury" name="hotel[]" value="Luxury 5 Stars"/>
                    <label for="d_luxury" class="hoverable">Luxury 5 Stars</label>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">Trip <b>length</b></h5>
                    <p class="font-moserrat">Cuanto tiempo desea que sea su viaje</p>
                </div>
            </div>

            <div class="row form-optional-check">
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_3d" name="trip[]" value="03 - 05 Dias"/>
                    <label for="d_3d" class="hoverable">03 - 05 <span>DAYS</span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_6d" name="trip[]" value="06 - 08 Dias"/>
                    <label for="d_6d" class="hoverable">06 - 08 <span>DAYS</span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_9d" name="trip[]" value="09 - 11 Dias"/>
                    <label for="d_9d" class="hoverable">09 - 11 <span>DAYS</span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_12d" name="trip[]" value="12 - 15 Dias"/>
                    <label for="d_12d" class="hoverable">12 - 15 <span>DAYS</span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_16d" name="trip[]" value="16+ Dias"/>
                    <label for="d_16d" class="hoverable">16+ <span>DAYS</span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_unknow" name="trip[]" value="UNKNOW"/>
                    <label for="d_unknow" class="hoverable">UNKNOW</label>
                </div>
            </div>


            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">NUMBER OF <b>TRAVELERS</b></h5>
                    <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
                </div>
            </div>

            <div class="row form-check-travelers">
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_1p" name="travelers[]" value="1 Persona"/>
                    <label for="d_1p" class="hoverable">1 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_2p" name="travelers[]" value="2 Personas"/>
                    <label for="d_2p" class="hoverable">2 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_3p" name="travelers[]" value="3 Personas"/>
                    <label for="d_3p" class="hoverable">3 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_4p" name="travelers[]" value="4 Personas"/>
                    <label for="d_4p" class="hoverable">4 <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_5p" name="travelers[]" value="5 Personas"/>
                    <label for="d_5p" class="hoverable">5+ <span><i class="material-icons">person</i></span></label>
                </div>
                <div class="col s6 m2 l2 margin-bottom-10">
                    <input type="checkbox" class="filled-in" id="d_undecided" name="travelers[]" value="UNDECIDED"/>
                    <label for="d_undecided" class="hoverable text-14">UNDECIDED</label>
                </div>
            </div>

            <div class="row margin-top-20">
                <div class="col s12">
                    <h5 class="yellow-text text-darken-3">PERSONAL <b>INFORMATION</b></h5>
                    <p class="font-moserrat">Numero de personas que viajaran con ud.</p>
                </div>
            </div>


            <div class="row form-design">
                <div class="col s12 m6 l6">
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">account_circle</i>
                        <input id="d_name" type="text" class="validate">
                        <label for="d_name">Name</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">mail</i>
                        <input id="d_email" type="email" class="validate">
                        <label for="d_email" data-error="wrong" data-success="right">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">phone</i>
                        <input id="d_telephone" type="tel" class="validate">
                        <label for="d_telephone">Telephone</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">date_range</i>
                        <input id="d_travel_date" type="date" class="datepicker">
                        <label for="d_travel_date">Travel Date</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text text-darken-1">mode_edit</i>
                        <textarea id="d_comment" class="materialize-textarea"></textarea>
                        <label for="d_comment">Comentarios</label>
                    </div>
                </div>

                <div class="col s12 m6 l6 hide-on-small-only">
                    <div class="col s12 position-relative">
                        <img src="{{asset('img/why/team-travel.jpg')}}" alt="" class="responsive-img">
                        <img src="{{asset('img/icons/24-hours.png')}}" alt="" width="150" class="margin-top-20 img-absolute-top-left">
                    </div>
                    <div class="col s4">
                        <img src="{{asset('img/icons/abc.png')}}" alt="" class="responsive-img margin-top-20">
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
                    <button class="btn waves-effect waves-light yellow darken-4" id="d_send" type="button" onclick="sendDesign()">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>

                <div class="col s12">
                    <div class="row center margin-top-10 margin-bottom-10">
                        <div id="d_congratulation" class="hidden card green padding-10">
                            <p class="white-text no-margin center"></p>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    {{--<div class="container">--}}
    {{----}}
    {{--</div>--}}
</div>

<div class="row hide-on-small-only">


    <div id="sync1" class="owl-carousel">
        <div class="item"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>

    </div>

    <div id="sync2" class="owl-carousel hide-ipad-large">
        <div class="item item-2"><img src="{{asset('img/banners/care2.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item item-2"><img src="{{asset('img/banners/care1.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item item-2"><img src="{{asset('img/banners/care3.jpg')}}" alt="" class="responsive-img"></div>
        <div class="item item-2"><img src="{{asset('img/banners/care4.jpg')}}" alt="" class="responsive-img"></div>
    </div>


</div>

<div class="container margin-top-40 margin-bottom-40">
    <div class="section">
        <div class="row center">
            <h4>THERE'S AN AMAZING <b>"LOST CITY"</b> OUT THERE</h4>
            <p>Closer than you think: 8 hours from New York or Los Angeles!</p>
        </div>
        <div class="row">
            <div class="col s12 m5 s5">
                <h5 class="margin-top-40">WE ARE ONE PERU´S LEADING GROUP TRAVEL PROVIDERS : GOTOPERU</h5>
                <p>A local company with local knowledge, expertise and resources, specializing in the design of
                    unforgettable vacations. Our unique activities, Peru tours & excursions, Peru hotel deals,
                    transportation and program logistics make us Peru leading travel experts. GOTOPERU offer you
                    every kind of travel services you need; ranging from all inclusive Peru travel packages,
                    accommodations, and entertainment and leisure activities. In addition offering different types
                    of travel products like "Online-Booking" and personal "Custom-made Trips"</p>
            </div>
            <div class="col s12 m7 s7">
                <div class="content-video-1">
                    <img src="{{asset('img/prom-peru.jpg')}}" alt="video" class="responsive-img">

                    <div class="content-video-btn-1">
                        <a href="https://www.youtube.com/embed/gGq_U1DYUCs" class="html5lightbox content-vbtn-color-blue" data-width="570" data-height="320"><i class="material-icons">play_circle_filled</i></a>
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
            <div class="col s12 m4 l4">
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

            <div class="col s12 m4 l4">
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

            <div class="col s12 m4 l4">
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

            <div class="col s12 m4 l4">
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

            <div class="col s12 m4 l4">
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

            <div class="col s12 m4 l4">
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
        <div class="row margin-bottom-20">
            <div class="col s6 m3 l3">
                <img src="{{asset('img/logos/logo-gotoperu.png')}}" alt="">
            </div>
            <div class="col s6 m3 l3">
                <img src="{{asset('img/logos/logo-latinamerica-2.png')}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Peru</h5>
                <ul class="white-text">
                    <li>Conca Canyon</li>
                    <li>Inca Trail</li>
                    <li>Lake Tititcaca</li>
                    <li>Machu Picchu</li>
                    <li>Nazca Lines</li>
                    <li>Peruvian Amazon</li>
                </ul>
            </div>
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Brasil</h5>
                <ul class="white-text">
                    <li>Rio</li>
                </ul>
            </div>
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Argentina</h5>
                <ul class="white-text">
                    <li>Buenos Aires</li>
                    <li>Iguazu</li>
                    <li>Patagonia</li>
                </ul>
            </div>
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Chile</h5>
                <ul class="white-text">
                    <li>Atacama</li>
                    <li>Easter Island</li>
                    <li>Lake District</li>
                    <li>Santago</li>
                    <li>Valparaiso</li>
                </ul>
            </div>
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Ecuador</h5>
                <ul class="white-text">
                    <li>Amazon Ecuador</li>
                    <li>Cuenca</li>
                    <li>Galapagos</li>
                    <li>Quito</li>
                </ul>
            </div>
            <div class="col s6 m2 l2">
                <h5 class="yellow-text text-darken-3 text-18 font-moserrat">Bolivia</h5>
                <ul class="white-text">
                    <li>La Paz</li>
                    <li>Uyuni</li>
                </ul>
            </div>
        </div>
        <div class="row white-text">
            <div class="col s12 m3 l3">
                <p><b>Peru:</b> (051) (84)-262-555</p>
            </div>
            <div class="col s12 m3 l3">
                <p><b>USA:</b> (001) (813)-454-9707</p>
            </div>
            <div class="col s6 m3 l3">
                <p><a href="">info@gotoperu.com</a></p>
            </div>
            <div class="col s6 m3 l3">
                <p><a href="">www.gotoperu.com</a></p>
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


@yield('scripts')
<script>
    /*=========================================================================================OLARK*/
    /*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
        f[z]=function(){
            (a.s=a.s||[]).push(arguments)};var a=f[z]._={
        },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
            f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
            0:+new Date};a.P=function(u){
            a.p[u]=new Date-a.p[0]};function s(){
            a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
            hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
            return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
            b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
            b.contentWindow[g].open()}catch(w){
            c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
            var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
            b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
        loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.identify('8407-174-10-8084');/*]]>*/
    //jQuery for page scrolling feature - requires jQuery Easing plugin
    function startOlark() {
        olark('api.box.expand');
    }
</script>

<script>
    //FORMULARIO INQUIRE
    function sendInquire(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });

        $("#i_send").attr("disabled", true);

        $(".u_error-contact").remove();

        var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;

        var s_name = $('#i_name').val();
        var s_email = $('#i_email').val();
        var s_telephone = $('#i_telephone').val();
        var s_comment = $('#i_comment').val();

        if (filter.test(s_email)){
            sendMail = "true";
        } else{
            $('#i_email').css("border-bottom", "2px solid #FF0000");
            sendMail = "false";
        }
        if (s_name.length == 0 ){
            $('#i_name').css("border-bottom", "2px solid #FF0000");
            var sendMail = "false";
        }

        if(sendMail == "true"){
            var datos = {

                "name_txt" : s_name,
                "email_txt" : s_email,
                "phone_txt" : s_telephone,
                "comment_txt" : s_comment
            };
            $.ajax({
                data:  datos,
                url:   '{{route('home_inquire_path')}}',
                type:  'get',

                beforeSend: function () {
                    $("#i_send").html('<div class="preloader-wrapper small active">'+
                        '<div class="spinner-layer spinner-green-only">'+
                        '<div class="circle-clipper left">'+
                        '<div class="circle"></div>'+
                        '</div><div class="gap-patch">'+
                        '<div class="circle"></div>'+
                        '</div><div class="circle-clipper right">'+
                        '<div class="circle"></div>'+
                        '</div>'+
                        '</div>'+
                        '</div>');;
                },
                success:  function (response) {
                    $('#i_form')[0].reset();
                    $("#i_send").html("Send");
                    $("#i_congratulation p").html(response);
                    $("#i_congratulation").fadeIn('slow');
                    $("#i_send").removeAttr("disabled");
                }
            });
        } else{
            $("#i_send").removeAttr("disabled");
        }
    }

    //FORMULARIO AVAILABILITY
    function SendMailAvailability(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });

        $("#a_send").attr("disabled", true);

        $(".u_error-contact").remove();

        var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;

        var s_code = $('#a_code').val();
        var s_name = $('#a_name').val();
        var s_last_name = $('#a_last_name').val();
        var s_email = $('#a_email').val();
        var s_phone = $('#a_phone').val();
        var s_date = $('#a_date').val();

        var s_group_size = $('#a_group_size :selected').val();

        var s_accommodations = $('input:checked').val();

        var s_departure_date = $('#a_departure_date :selected').val();

        var s_comments = $('#a_comments').val();


        if (filter.test(s_email)){
            sendMail = "true";
        } else{
            $('#a_email').css("border-bottom", "2px solid #FF0000");
            sendMail = "false";
        }
        if (s_name.length == 0 ){
            $('#a_name').css("border-bottom", "2px solid #FF0000");
            var sendMail = "false";
        }

        if(sendMail == "true"){
            var datos = {

                "code_txt" : s_code,
                "name_txt" : s_name,
                "last_name_txt" : s_last_name,
                "email_txt" : s_email,
                "phone_txt" : s_phone,
                "date_txt" : s_date,

                "group_size_slc" : s_group_size,

                "accommodations_opt" : s_accommodations,

                "departure_date_slc" : s_departure_date,

                "comments_txt" : s_comments
            };
            $.ajax({
                data:  datos,
                url:   '{{route('home_availability_path')}}',
                type:  'get',

                beforeSend: function () {
                    $("#a_send").html('<div class="preloader-wrapper small active">'+
                        '<div class="spinner-layer spinner-green-only">'+
                        '<div class="circle-clipper left">'+
                        '<div class="circle"></div>'+
                        '</div><div class="gap-patch">'+
                        '<div class="circle"></div>'+
                        '</div><div class="circle-clipper right">'+
                        '<div class="circle"></div>'+
                        '</div>'+
                        '</div>'+
                        '</div>');;
                },
                success:  function (response) {
                    $('#a_form')[0].reset();
                    $("#a_send").html("Send");
                    $("#a_congratulation p").html(response);
                    $("#a_congratulation").fadeIn('slow');
                    $("#a_send").removeAttr("disabled");
                }
            });
        } else{
            $("#a_send").removeAttr("disabled");
        }
    }

    //FORMULARIO DESIGN
    function sendDesign(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });

        $("#d_send").attr("disabled", true);

        var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;

        var s_peru = document.getElementsByName('peru[]');
        var $peru = "";
        for (var i = 0, l = s_peru.length; i < l; i++) {
            if (s_peru[i].checked) {
                $peru += s_peru[i].value+' , ';
            }
        }
        s_peru = $peru.substring(0,$peru.length-3);

        var s_multicountries = document.getElementsByName('multicountries[]');
        var $multicountries = "";
        for (var i = 0, l = s_multicountries.length; i < l; i++) {
            if (s_multicountries[i].checked) {
                $multicountries += s_multicountries[i].value+' , ';
            }
        }

        s_multicountries = $multicountries.substring(0,$multicountries.length-3);

        var s_hotel = document.getElementsByName('hotel[]');
        var $hotel = "";
        for (var i = 0, l = s_hotel.length; i < l; i++) {
            if (s_hotel[i].checked) {
                $hotel += s_hotel[i].value+' , ';
            }
        }

        s_hotel = $hotel.substring(0,$hotel.length-3);

        var s_trip = document.getElementsByName('trip[]');
        var $trip = "";
        for (var i = 0, l = s_trip.length; i < l; i++) {
            if (s_trip[i].checked) {
                $trip += s_trip[i].value+' , ';
            }
        }

        s_trip = $trip.substring(0,$trip.length-3);

        var s_travelers = document.getElementsByName('travelers[]');
        var $travelers = "";
        for (var i = 0, l = s_travelers.length; i < l; i++) {
            if (s_travelers[i].checked) {
                $travelers += s_travelers[i].value+' , ';
            }
        }

        s_travelers = $travelers.substring(0,$travelers.length-3);


//        var s_peru = document.getElementsByName('peru[]');
//        var s_multicountries = document.getElementsByName('multicountries[]');
//        var s_hotel = document.getElementsByName('hotel[]');
//        var s_trip = document.getElementsByName('trip[]');
//        var s_travelers = document.getElementsByName('travelers[]');

        var s_name = $('#d_name').val();
        var s_email = $('#d_email').val();
        var s_telephone = $('#d_telephone').val();
        var s_travel_date = $('#d_travel_date').val();
        var s_comment = $('#d_comment').val();


        if (filter.test(s_email)){
            sendMail = "true";
        } else{
            $('#d_email').css("border-bottom", "2px solid #FF0000");
            sendMail = "false";
        }
        if (s_name.length == 0 ){
            $('#d_name').css("border-bottom", "2px solid #FF0000");
            var sendMail = "false";
        }

        if(sendMail == "true"){
            var datos = {

                "txt_peru" : s_peru,
                "txt_multicountries" : s_multicountries,
                "txt_hotel" : s_hotel,
                "txt_trip" : s_trip,
                "txt_travelers" : s_travelers,

                "txt_name" : s_name,
                "txt_email" : s_email,
                "txt_telephone" : s_telephone,
                "txt_travel_date" : s_travel_date,
                "txt_comment" : s_comment

            };
            $.ajax({
                data:  datos,
                url:   '{{route('home_design_path')}}',
                type:  'get',

                beforeSend: function () {
                    $("#d_send").html('<div class="preloader-wrapper small active">'+
                        '<div class="spinner-layer spinner-green-only">'+
                        '<div class="circle-clipper left">'+
                        '<div class="circle"></div>'+
                        '</div><div class="gap-patch">'+
                        '<div class="circle"></div>'+
                        '</div><div class="circle-clipper right">'+
                        '<div class="circle"></div>'+
                        '</div>'+
                        '</div>'+
                        '</div>');;
                },
                success:  function (response) {
                    $('#d_form')[0].reset();
                    $("#d_send").html("Send");
                    $("#d_congratulation p").html(response);
                    $("#d_congratulation").fadeIn('slow');
                    $("#d_send").removeAttr("disabled");
                }
            });
        } else{
            $("#d_send").removeAttr("disabled");
        }
    }
</script>


</body>
</html>
