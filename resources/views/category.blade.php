@extends('layouts.default')

@section('content')


    <div class="container">
        <div class="section">
            <div class="row main-wrapper">
                <div class="col s2">
                    <div id="pinned">
                        <div class="row">
                            <div class="col s12">
                                <p class="yellow-text text-darken-4 text-20">BY DURATION</p>
                            </div>
                        </div>
                        <ul class="no-margin">
                            @foreach($duracion->sortBy('duracion') as $duraciones)
                                <li class="valign-wrapper"><i class="material-icons">keyboard_arrow_right</i> <a href="{{route('home_show_days_path', $duraciones->duracion)}}" class="font-moserrat lime-text text-darken-4">{{$duraciones->duracion}} days</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col s10">
                    <div class="row">
                        <div class="col s12">
                            <p class="yellow-text text-darken-4 text-20 right-align">BY CATEGORY</p>
                        </div>
                        <div class="col s3 valign-wrapper">
                            <a href="{{route('home_show_category_path', 'adventure')}}" class="card hoverable waves-effect">
                                <div class="col s3">
                                    <img src="{{asset('img/icons/trekking.png')}}" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s9">
                            <span class="black-text">
                                ADVENTURE
                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="col s3 valign-wrapper">
                            <a href="{{route('home_show_category_path', 'family')}}" class="card hoverable waves-effect">
                                <div class="col s3">
                                    <img src="{{asset('img/icons/family.png')}}" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s9">
                            <span class="black-text">
                                FAMILY
                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="col s3 valign-wrapper">
                            <a href="{{route('home_show_category_path', 'classic')}}" class="card hoverable waves-effect">
                                <div class="col s3">
                                    <img src="{{asset('img/icons/classic.png')}}" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s9">
                            <span class="black-text">
                                CLASSIC
                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="col s3 valign-wrapper">
                            <a href="{{route('home_show_category_path', 'luxury')}}" class="card hoverable waves-effect">
                                <div class="col s3">
                                    <img src="{{asset('img/icons/human.png')}}" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s9">
                            <span class="black-text">
                                LUXURY
                            </span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row grid">

                        @foreach($categoria as $categorias)

                            @if(isset($categorias->categoria))
                                <div class="col s4 grid-item">

                                    <div class="card card-packages">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <a href=""><img src="{{asset('img/maps/'.$categorias->paquetes->imagen.'')}}"
                                                            class="responsive-img"></a>
                                            <span class="card-title activator"><i
                                                        class="material-icons right">more_vert</i></span>
                                        </div>

                                        <div class="card-content">
                                            <div class="">
                                                <h2 class="text-16 no-margin"><b>{{$categorias->paquetes->codigo}}
                                                        : {{$categorias->paquetes->titulo}}</b></h2>
                                            </div>
                                            <div class="spacer-20">
                                                <p class="lime-text text-darken-4">
                                                    @foreach($categorias->paquetes->paquetes_destinos as $destino)
                                                        {{ucwords(strtolower($destino->destinos->nombre))}}
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="margin-bottom-10">
                                                @foreach($categorias->paquetes->precio_paquetes as $precio)
                                                    @if($precio->estrellas == 2)

                                                        @php
                                                            if($precio->precio_d == 0)
                                                                $precio2 = 'Inquire';
                                                            else
                                                                $precio2 = '$'.$precio->precio_d;
                                                        @endphp

                                                        <h4 class="text-18 no-margin valign-wrapper"><b
                                                                    class="lime-text text-darken-4">{{$categorias->paquetes->duracion}}
                                                                days</b> <i class="material-icons valign tiny">arrow_forward</i>
                                                            <b class="grey-text spacer-m-5 text-12">from</b> <span
                                                                    class="yellow-text text-darken-3 text-25"><b>${{$precio2}}</b></span>
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

                                                    <a href="{{route('home_show_travel_path', array('titulo'=>str_replace(' ','-', strtolower($categorias->paquetes->titulo)), 'dias'=>$categorias->paquetes->duracion.'-days-tours'))}}" class="waves-effect waves-light btn yellow darken-3"><i
                                                                class="material-icons right">send</i>View Trip</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="card-reveal">--}}
                                                {{--<span class="card-title grey-text text-darken-4">Card Title<i--}}
                                                            {{--class="material-icons right">close</i></span>--}}
                                            {{--<p>Here is some more information about this product that is only revealed--}}
                                                {{--once clicked on.</p>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop