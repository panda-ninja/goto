@extends('layouts.default')

@section('content')


    <div class="container">
        <div class="section">
            <div class="row main-wrapper">
                <div class="col s2">
                    <div id="pinned">
                        <div class="row">
                            <div class="col s12">
                                <p class="yellow-text text-darken-4 text-20">BY CATEGORY</p>
                            </div>
                        </div>
                        <ul class="no-margin">
                            @foreach($categoria->sortBy('nombre') as $categorias)
                                <li class="valign-wrapper"><i class="material-icons">keyboard_arrow_right</i> <a href="#introduction" class="lime-text text-darken-4">{{$categorias->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col s10">
                    <div class="row">
                        <div class="col s12">

                            <p class="yellow-text text-darken-4 text-20 right-align">BY DAYS</p>

                            <ul class="pagination right-align">
                                <li class="waves-effect"><a href="#!">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect"><a href="#!">3</a></li>
                                <li class="waves-effect"><a href="#!">4</a></li>
                                <li class="waves-effect"><a href="#!">5</a></li>
                                <li class="waves-effect"><a href="#!">6</a></li>
                                <li class="waves-effect"><a href="#!">7</a></li>
                                <li class="waves-effect"><a href="#!">8</a></li>
                                <li class="waves-effect"><a href="#!">9</a></li>
                                <li class="waves-effect"><a href="#!">10</a></li>
                                <li class="waves-effect"><a href="#!">11</a></li>
                                <li class="waves-effect"><a href="#!">12</a></li>
                                <li class="waves-effect"><a href="#!">13</a></li>
                                <li class="waves-effect"><a href="#!">14</a></li>
                                <li class="waves-effect"><a href="#!">15</a></li>
                                <li class="waves-effect active"><a href="#!">16+</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row grid">

                    @foreach($paquete->sortBy('duracion') as $paquetes)

                        <div class="col s4 grid-item">

                                <div class="card card-packages">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href=""><img src="http://gotoperu.travel/img/maps/GTP600.jpg"
                                                        class="responsive-img"></a>
                                        <span class="card-title activator"><i
                                                    class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="card-content">
                                        <div class="">
                                            <h2 class="text-16 no-margin"><b>{{$paquetes->codigo}}
                                                    : {{$paquetes->titulo}}</b></h2>
                                        </div>
                                        <div class="spacer-20">
                                            <p class="lime-text text-darken-4">
                                                @foreach($paquetes->paquetes_destinos as $destino)
                                                    {{ucwords(strtolower($destino->destinos->nombre))}}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="margin-bottom-10">
                                            @foreach($paquetes->precio_paquetes as $precio)
                                                @if($precio->estrellas == 2)
                                                    <h4 class="text-18 no-margin valign-wrapper"><b
                                                                class="lime-text text-darken-4">{{$paquetes->duracion}}
                                                            days</b> <i class="material-icons valign tiny">arrow_forward</i>
                                                        <b class="grey-text spacer-m-5 text-12">from</b> <span
                                                                class="yellow-text text-darken-3 text-25"><b>${{$precio->precio_d}}</b></span>
                                                    </h4>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="row no-margin valign-wrapper">
                                            <div class="col s2">
                                                <a href="" class="red-text tooltipped" data-position="top"
                                                   data-delay="50" data-tooltip="Add my wishlist"><i
                                                            class="material-icons valign small">favorite</i></a>
                                            </div>
                                            <div class="col s10">
                                                <a class="waves-effect waves-light btn yellow darken-3"><i
                                                            class="material-icons right">send</i>View Trip</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-reveal">
                                                <span class="card-title grey-text text-darken-4">Card Title<i
                                                            class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed
                                            once clicked on.</p>
                                    </div>
                                </div>
                            </div>

                    @endforeach

                </div>
                    </div>
            </div>
        </div>
    </div>


@stop