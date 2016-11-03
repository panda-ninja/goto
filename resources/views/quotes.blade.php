@extends('layouts.dashboard')

@section('content')

    @foreach($cotizaciones as $cotizacion)
        @if($cotizacion->estado == '1')


            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="row">
                    <div class="collapsible-header"><i class="material-icons green-text">check_circle</i><b>Cotizacion:</b> {{$cotizacion->fecha}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
                    <div class="collapsible-body">
                        <?php $i=1; ?>
                        @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                            <div class="col s12">
                                <div class="section card-panel grey lighten-4 z-depth-1 hoverable">
                                    <div class="valign-wrapper qoutes-box">
                                        <div class="col s2">
                                            <p class="no-padding yellow-text text-darken-3 center-align"><b>Proposal {{$i++}}</b></p>
                                            <p class="no-padding yellow-text text-darken-3 center-align"><span class="text-30 quotes-duration">{{$paquete_cotizaciones->duracion}}</span> Days</p>
                                        </div>
                                        <div class="col s3">
                                            @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                                <p class="no-padding green-text"><b>{{$precio->estrellas}} stars:</b>  ${{$precio->precio_d}}</p>
                                            @endforeach
                                            {{--<p class="no-padding green-text"><b>2 stars:</b> </p>--}}
                                            {{--<p class="no-padding grey-text line-through"><b>3 stars:</b> $2299</p>--}}
                                        </div>
                                        <div class="col s3">
                                            <ul>
                                                @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                                    <li class="no-padding">- {{ucwords(strtolower($destino->destinos->destino))}}</li>
                                                @endforeach
                                            </ul>

                                            {{--<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lima - Ica - Machu Picchu">...</a>--}}
                                        </div>

                                        <div class="col s4 quotes-btn">
                                            <a href="{{route('quotes_show_path', $paquete_cotizaciones->id)}}">View detailed program</a>
                                            <a href="">Request changes / upgrades</a>
                                            <a href="">Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </li>

            </ul>

        @endif

        @if($cotizacion->estado == '0')


            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="row">
                    <div class="collapsible-header"><i class="material-icons red-text">remove</i><b>Cotizacion:</b> {{$cotizacion->fecha}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
                    <div class="collapsible-body">
                        <?php $i=1; ?>
                        @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                            <div class="col s12">
                                <div class="section card-panel grey lighten-4 z-depth-1 hoverable">
                                    <div class="valign-wrapper qoutes-box">
                                        <div class="col s2">
                                            <p class="no-padding yellow-text text-darken-3 center-align"><b>Proposal {{$i++}}</b></p>
                                            <p class="no-padding yellow-text text-darken-3 center-align"><span class="text-30 quotes-duration">{{$paquete_cotizaciones->duracion}}</span> Days</p>
                                        </div>
                                        <div class="col s3">
                                            @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                                <p class="no-padding grey-text"><b>{{$precio->estrellas}} stars:</b>  ${{$precio->precio_d}}</p>
                                            @endforeach
                                            {{--<p class="no-padding green-text"><b>2 stars:</b> </p>--}}
                                            {{--<p class="no-padding grey-text line-through"><b>3 stars:</b> $2299</p>--}}
                                        </div>
                                        <div class="col s3">
                                            <ul>
                                                @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                                    <li class="no-padding">- {{ucwords(strtolower($destino->destinos->destino))}}</li>
                                                @endforeach
                                            </ul>

                                            {{--<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lima - Ica - Machu Picchu">...</a>--}}
                                        </div>

                                        <div class="col s4 quotes-btn">
                                            <a href="{{route('quotes_show_path', $paquete_cotizaciones->id)}}">View detailed program</a>
                                            <a href="">Request changes / upgrades</a>
                                            <a href="">Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </li>

            </ul>

        @endif
    @endforeach

    @stop