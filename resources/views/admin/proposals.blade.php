@extends('layouts.admin')

@section('content')

    <div id="profile-page" class="row">
        <div class="col s12">
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{asset("images/user-profile-bg.jpg")}}" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="{{ Gravatar::src($cliente->email), 100}}" alt="{{$cliente->nombres}} {{$cliente->apellidos}}" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s3 offset-s2">
                            <h4 class="card-title grey-text text-darken-4">{{$cliente->nombres}}</h4>
                            <p class="medium-small grey-text">Cliente</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">10+</h4>
                            <p class="medium-small grey-text">Total Propuetas</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">6</h4>
                            <p class="medium-small grey-text">Confirmadas</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                            <p class="medium-small grey-text">Total</p>
                        </div>
                        <div class="col s1 right-align">
                            <a class="btn-floating activator waves-effect waves-light darken-2 right">
                                <i class="mdi-action-perm-identity"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                    <p>
                        <span class="card-title grey-text text-darken-4">{{$cliente->nombres}} <i class="mdi-navigation-close right"></i></span>
                        <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Cliente</span>
                    </p>

                    {{--<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>--}}

                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{$cliente->telefono}}</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> {{$cliente->email}}</p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> {{$cliente->fechanacimiento}}</p>
                    <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> {{$cliente->nacionalidad}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center">
            <h5>Cotizaciones y Propuestas</h5>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>N°Pasajero</th>
                    <th>Fecha de Viaje</th>
                    <th></th>
                    <th>Posibilidad</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cotizaciones as $cotizacion)
                    @php $i = 1; @endphp
                    @foreach($cotizacion->cliente_cotizaciones as $cliente_cotizacion)
                        @if($cliente_cotizacion)
                            {{--@if($cliente_cotizacion->posibilidad <= 25)--}}
                                {{--@php $bg_color =  "red lighten-5"; @endphp--}}
                            {{--@endif--}}
                            {{--@if($cliente_cotizacion->posibilidad > 25 and )--}}
                                {{--@php $bg_color =  "red lighten-5"; @endphp--}}
                            {{--@endif--}}
                            @php
                                if($cotizacion->posibilidad <= 25){
                                    $bgcolor = "red lighten-5";
                                    $color_txt = "red-text";
                                }
                                if($cotizacion->posibilidad > 25 and $cotizacion->posibilidad <= 50){
                                    $bgcolor = "orange lighten-5";
                                    $color_txt = "orange-text";
                                }
                                if($cotizacion->posibilidad > 50 and $cotizacion->posibilidad <= 75){
                                    $bgcolor = "blue lighten-5";
                                    $color_txt = "blue-text";
                                }
                                if($cotizacion->posibilidad > 75 and $cotizacion->posibilidad <= 100){
                                    $bgcolor = "green lighten-5";
                                    $color_txt = "green-text";
                                }
                            @endphp
                            <tr class="{{$bgcolor}}">
                                <td>{{$i++}}</td>
                                <td class="center">{{$cotizacion->nropersonas}}</td>
                                <td class="center">{{$cotizacion->fecha}}</td>
                                <td>
                                    <table class="bordered">
                                        <thead>
                                        <tr>
                                            <th>Propuestas</th>
                                            {{--<th class="right-align">Costo ($)</th>--}}
                                            {{--<th class="right-align">Venta ($)</th>--}}
                                            <th></th>
                                        </tr>
                                        </thead>
                                        @php $s = "A"; @endphp
                                        @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizacion)
                                            <tr>
                                                <td><b>Propuesta {{$s++ . PHP_EOL}}:</b> <a href="#paquete_resumen_{{$paquete_cotizacion->id}}" class="modal-trigger blue-text">{{ucwords(strtolower($paquete_cotizacion->titulo))}}</a></td>
                                                <td class="right-align"><a href="{{route('view_proposal_pdf_path', $paquete_cotizacion->id)}}"><i>pdf</i></a></td>

                                                <!-- Modal Structure itinerario-->
                                                <div id="paquete_resumen_{{$paquete_cotizacion->id}}" class="modal">
                                                    <div class="modal-content">
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="center"><b>{{$paquete_cotizacion->codigo}}: {{$paquete_cotizacion->titulo}}</b></h5>
                                                                <h5 class="center grey-text">{{$paquete_cotizacion->duracion}} DIAS</h5>
                                                                <div class="divider margin-bottom-20"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="text-18"><b>Descripcion</b></h5>
                                                                <div class="divider margin-bottom-10"></div>
                                                                <p>{{$paquete_cotizacion->descripcion}}</p>
                                                            </div>
                                                            <div class="col s12">
                                                                <h5 class="text-18"><b>Incluye</b></h5>
                                                                <div class="divider margin-bottom-10"></div>
                                                                <p>{{$paquete_cotizacion->incluye}}</p>
                                                            </div>
                                                            <div class="col s12">
                                                                <h5 class="text-18"><b>No Incluye</b></h5>
                                                                <div class="divider margin-bottom-10"></div>
                                                                <p>{{$paquete_cotizacion->noincluye}}</p>
                                                            </div>
                                                            <div class="col s12">
                                                                <h5 class="text-18"><b>Opcional</b></h5>
                                                                <div class="divider margin-bottom-10"></div>
                                                                <p>{{$paquete_cotizacion->opcional}}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="center"><b>ITINERARIO</b></h5>
                                                                <div class="divider margin-bottom-20"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @foreach($paquete_cotizacion->itinerario_cotizaciones as $paquete_itinerario)
                                                                <div class="col s12 margin-bottom-20">
                                                                    <h5 class="text-18"><b>Dia {{$paquete_itinerario->dias}}: {{$paquete_itinerario->titulo}} </b></h5>
                                                                    <div class="divider margin-bottom-10"></div>
                                                                    <p>{{$paquete_itinerario->descripcion}}</p>
                                                                    <div class="col s12 grey darken-3">
                                                                        <h6 class="white-text"><b>SERVICIOS</b></h6>
                                                                    </div>
                                                                    @foreach($paquete_itinerario->orden_cotizaciones as $orden_cotizaciones)
                                                                        <div class="row services-box">
                                                                            <div class="col s5">
                                                                                {{$orden_cotizaciones->nombre}}
                                                                            </div>
                                                                            <div class="col s5">
                                                                                {{$orden_cotizaciones->observacion}}
                                                                            </div>
                                                                            <div class="col s2 right-align">
                                                                                {{$orden_cotizaciones->precio}}$
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="center"><b>CATEGORIA Y ACOMODACION</b></h5>
                                                                <div class="divider margin-bottom-20"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="row grey darken-3 white-text right-align">
                                                                    <div class="col s4 left-align">Categoria</div>
                                                                    <div class="col s2">Simple</div>
                                                                    <div class="col s2">Doble</div>
                                                                    <div class="col s2">Matrimonial</div>
                                                                    <div class="col s2">Triple</div>
                                                                </div>
                                                            </div>
                                                            <div class="col s12">
                                                                @foreach($paquete_cotizacion->precio_paquetes as $precio_paquete)
                                                                    @if($precio_paquete->estado == 1)
                                                                        <div class="row services-box right-align">
                                                                            <div class="col s4 left-align">{{$precio_paquete->estrellas}} estellas</div>
                                                                            <div class="col s2">@php if ($precio_paquete->personas_s == 0) { echo "---";} else {echo $precio_paquete->precio_s."$";} @endphp</div>
                                                                            <div class="col s2">@php if ($precio_paquete->personas_d == 0) { echo "---";} else {echo $precio_paquete->precio_d."$";} @endphp</div>
                                                                            <div class="col s2">@php if ($precio_paquete->personas_m == 0) { echo "---";} else {echo $precio_paquete->precio_m."$";} @endphp</div>
                                                                            <div class="col s2">@php if ($precio_paquete->personas_t == 0) { echo "---";} else {echo $precio_paquete->precio_t."$";} @endphp</div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="center"><b>DESTINOS</b></h5>
                                                                <div class="divider margin-bottom-20"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                @foreach($paquete_cotizacion->destinos as $paquete_destinos)
                                                                    <div class="col s4"><i class="mdi-navigation-check"></i> {{$paquete_destinos->destino}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col s12">
                                                                <h5 class="center"><b>PRECIOS</b></h5>
                                                                <div class="divider margin-bottom-20"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @php $servicio = 0; @endphp
                                                            @foreach($paquete_cotizacion->itinerario_cotizaciones as $paquete_itinerario)
                                                                @foreach($paquete_itinerario->orden_cotizaciones as $orden_cotizaciones)
                                                                    @php
                                                                        $total = $orden_cotizaciones->precio + $servicio;
                                                                        $servicio = $total;
                                                                    @endphp
                                                                @endforeach
                                                            @endforeach

                                                            @foreach($paquete_cotizacion->precio_paquetes as $precio_paquete2)
                                                                @if($precio_paquete2->estado == 1)

                                                                    <div class="col s12 margin-bottom-20">
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <h5 class="text-18"><b>CATEGORIA: {{$precio_paquete2->estrellas}} ESTRELLAS</b></h5>
                                                                                <div class="divider margin-bottom-20"></div>
                                                                            </div>
                                                                        </div>
                                                                        @if($precio_paquete2->personas_s > 0)
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(acomodacion simple):</i></b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    @php
                                                                                        $precio_s = (($precio_paquete2->precio_s)* 1) * ($paquete_cotizacion->duracion - 1);
                                                                                    @endphp
                                                                                    {{number_format($precio_s, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(servicios)</i>:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    {{number_format($total, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio Costo Total:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_costo = $precio_s + $total;
                                                                                        @endphp
                                                                                        {{number_format($total_costo, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row green lighten-4">
                                                                                <div class="col s9">
                                                                                    <b>Precio Venta ({{$precio_paquete2->utilidad}}%):</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                                                        @endphp
                                                                                        {{number_format($total_utilidad, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row grey lighten-4">
                                                                                <div class="col s12">
                                                                                    <p class="text-11 no-margin"><i>{{$precio_paquete2->personas_s}} habitaciones con acomodacion simple, total de pasajeros {{$precio_paquete2->personas_s * 1}}, precio por persona ${{$precio_paquete2->precio_s}}, numero de dias en hotel {{$paquete_cotizacion->duracion - 1}}</i></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="divider margin-bottom-20"></div>

                                                                        @else
                                                                            @php
                                                                                $precio_s = 0;
                                                                            @endphp
                                                                        @endif
                                                                        @if($precio_paquete2->personas_d > 0)
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(acomodacion doble):</i></b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    @php
                                                                                        $precio_d = (($precio_paquete2->precio_d)* 1) * ($paquete_cotizacion->duracion - 1);
                                                                                    @endphp
                                                                                    {{number_format($precio_d, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(servicios)</i>:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    {{number_format($total, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio Costo Total:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_costo = $precio_d + $total;
                                                                                        @endphp
                                                                                        {{number_format($total_costo, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row green lighten-4">
                                                                                <div class="col s9">
                                                                                    <b>Precio Venta ({{$precio_paquete2->utilidad}}%):</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                                                        @endphp
                                                                                        {{number_format($total_utilidad, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row grey lighten-4">
                                                                                <div class="col s12">
                                                                                    <p class="text-11 no-margin"><i>{{$precio_paquete2->personas_d}} habitaciones con acomodacion doble, total de pasajeros {{$precio_paquete2->personas_d * 2}}, precio por persona ${{$precio_paquete2->precio_d}}, numero de dias en hotel {{$paquete_cotizacion->duracion - 1}}</i></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="divider margin-bottom-20"></div>
                                                                        @else
                                                                            @php
                                                                                $precio_d = 0;
                                                                            @endphp
                                                                        @endif
                                                                        @if($precio_paquete2->personas_m > 0)
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(acomodacion matrimonial):</i></b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    @php
                                                                                        $precio_m = (($precio_paquete2->precio_m)* 1) * ($paquete_cotizacion->duracion - 1);
                                                                                    @endphp
                                                                                    {{number_format($precio_m, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(servicios)</i>:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    {{number_format($total, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio Costo Total:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_costo = $precio_m + $total;
                                                                                        @endphp
                                                                                        {{number_format($total_costo, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row green lighten-4 margin-bottom-20">
                                                                                <div class="col s9">
                                                                                    <b>Precio Venta ({{$precio_paquete2->utilidad}}%):</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                                                        @endphp
                                                                                        {{number_format($total_utilidad, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row grey lighten-4">
                                                                                <div class="col s12">
                                                                                    <p class="text-11 no-margin"><i>{{$precio_paquete2->personas_m}} habitaciones con acomodacion matrimonial, total de pasajeros {{$precio_paquete2->personas_m * 2}}, precio por persona ${{$precio_paquete2->precio_m}}, numero de dias en hotel {{$paquete_cotizacion->duracion - 1}}</i></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="divider margin-bottom-20"></div>
                                                                        @else
                                                                            @php
                                                                                $precio_m = 0;
                                                                            @endphp
                                                                        @endif
                                                                        @if($precio_paquete2->personas_t > 0)
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(acomodacion triple):</i></b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    @php
                                                                                        $precio_t = (($precio_paquete2->precio_t)* 1) * ($paquete_cotizacion->duracion - 1);
                                                                                    @endphp
                                                                                    {{number_format($precio_t, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio costo <i class="text-12">(servicios)</i>:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    {{number_format($total, 2, '.', '')}}$
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col s9">
                                                                                    <b>Precio Costo Total:</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_costo = $precio_t + $total;
                                                                                        @endphp
                                                                                        {{number_format($total_costo, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row green lighten-4">
                                                                                <div class="col s9">
                                                                                    <b>Precio Venta ({{$precio_paquete2->utilidad}}%):</b>
                                                                                </div>
                                                                                <div class="col s3 right-align">
                                                                                    <div class="divider"></div>
                                                                                    <b>
                                                                                        @php
                                                                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                                                        @endphp
                                                                                        {{number_format($total_utilidad, 2, '.', '')}}$
                                                                                    </b>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row grey lighten-4">
                                                                                <div class="col s12">
                                                                                    <p class="text-11 no-margin"><i>{{$precio_paquete2->personas_t}} habitaciones con acomodacion triple, total de pasajeros {{$precio_paquete2->personas_t * 3}}, precio por persona ${{$precio_paquete2->precio_t}}, numero de dias en hotel {{$paquete_cotizacion->duracion - 1}}</i></p>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @php
                                                                                $precio_t = 0;
                                                                            @endphp
                                                                        @endif




                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--<td class="right-align">{{$paquete_cotizacion->preciocosto}}</td>--}}
                                                {{--<td class="right-align">{{$paquete_cotizacion->precio_venta}}</td>--}}
                                                <td class="right-align">
                                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                                    <a id="send{{$paquete_cotizacion->id}}" href="#!" class="text-22" onclick="enviarPlan({{$paquete_cotizacion->id}})"><i class="mdi-content-send"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td class="center"><a href="#posibilidad" class="modal-trigger text-30 {{$color_txt}}"><b><u>{{$cotizacion->posibilidad}}%</u></b></a></td>

                                <!-- Modal Structure posibilidad-->
                                <div id="posibilidad" class="modal">
                                    <div class="modal-content">
                                        <form action="{{route("admin_posibilidad_path", $cotizacion->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="patch">
                                            <div class="row">
                                                <div class="col s12">
                                                    <h5 class="center">Agregar porcentaje de posibilidad de cierre</h5>
                                                    <div class="divider margin-bottom-20"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="ejem: 10" id="posibilidad_txt" name="posibilidad_txt" type="number" min="0" max="100" step="1" class="validate" value="{{$cotizacion->posibilidad}}">
                                                    <input placeholder="ejem: 10" id="idcliente_txt" name="idcliente_txt" type="hidden" value="{{$cliente->id}}">
                                                    <label for="idcliente_txt" class="active">Posibilidad de cierre (%)</label>
                                                </div>
                                            </div>
                                            <div class="row spacer-20 right">
                                                <div class="col s12">
                                                    <button class="btn waves-effect waves-light" type="submit" name="action">definir
                                                        <i class="mdi-content-send right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </tr>
                        @endif
                    @endforeach
                @endforeach


                </tbody>
            </table>
        </div>
    </div>

@stop