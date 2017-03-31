@extends('layouts.dashboard')

@section('content')

    @foreach($cotizaciones as $cotizacion)
        @foreach($cotizacion->cliente_cotizaciones as $cot)
            @if($cot)
                @foreach($cotizacion->paquete_cotizaciones as $paquete2)
                    @php
                        $array[] = $paquete2->id
                    @endphp
                @endforeach
            @endif
        @endforeach
    @endforeach

    @foreach($paquetes as $paquete)
        @if(in_array($paquete->id,$array))
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <div class="col s3 no-padding">
                            <div class="tab-qoutes center">
                                <a href="{{route('quotes_path')}}">Todas las cotizaciones</a>
                            </div>
                        </div>
                        @php $i = 1; @endphp
                        @foreach($paquete_post as $paquete_pos)
                            @if($paquete_pos->id == $paquete->id)
                                @php $active = 'active'; @endphp
                            @else
                                @php $active = ''; @endphp
                            @endif
                            <div class="col s2 no-padding">
                                <div class="tab-qoutes center {{$active}}">
                                    <a href="{{route('quotes_show_path',$paquete_pos->id)}}">Propuesta {{$i++}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col s12 center">
                        <div class="divider margin-top-10"></div>
                        {{--@if(Session::get('success'))--}}
                            {{--<div class="card-panel light-blue darken-1 center-align">--}}
                                {{--<h5 class="white-text">El paquete se confirmo satisfactoriamente.</h5>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--@if($paquete->estado == 3)--}}
                            {{--<div class="">--}}
                                {{--<a href="#" class="waves-effect waves-light btn green accent-4 accent-4 modal-trigger">Proceder a Pagar Ahora</a>--}}
                            {{--</div>--}}
                        @if($paquete->estado == 1 OR $paquete->estado == 2)
                            <p class=" margin-top-20">
                                {{--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>--}}
                                <a href="#confirm" class="waves-effect waves-light btn red modal-trigger">Confirmar Ahora</a>
                                <a href="#upgrade" class="waves-effect waves-light btn blue modal-trigger">Request Changes</a>
                            </p>
                        @endif
                    </div>
                    <div class="col s12 center-align">
                        <h5 class="lime-text text-darken-3"><b>Package Travel: {{$paquete->titulo}}</b></h5>
                        <p><b>Package Code:</b> {{$paquete->codigo}} | <b>Package Duration:</b> {{$paquete->duracion}} | <a href="{{route('quotes_pdf_path', $paquete->id)}}" class="waves-effect waves-light red-text"> view version PDF</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 include-services margin-bottom-10 center">
                        <ul class="list-services no-margin text-11-ip">
                            @foreach($paquete->incluye_paquete_cotizaciones as $incluye)
                                <li><img src="{{asset('img/icons/include/'.$incluye->incluye->imagen)}}" alt="" class="responsive-img"><span>{{ucwords(strtolower($incluye->incluye->titulo))}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p class="yellow-text text-darken-3"><b>Outline</b></p>
                        @foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)
                            <p><b class="grey-text text-darken-2">Day {{$itinerario->dias}} - {{ucwords(strtolower($itinerario->titulo))}}</b></p>
                            {{--<p>@php echo $itinerario->descripcion; @endphp</p>--}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">

                        <p class="yellow-text text-darken-3"><b>Incluye</b></p>
                        @php echo $paquete->incluye; @endphp
                        <p class="yellow-text text-darken-3"><b>No Incluye</b></p>
                        @php echo $paquete->noincluye; @endphp
                        {{--<p class="yellow-text text-darken-3"><b>Opcional</b></p>--}}
                        {{--@php echo $paquete->opcional; @endphp--}}

                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p class="yellow-text text-darken-3"><b>Itinerary</b></p>
                        @foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)
                            <p><b class="grey-text text-darken-2">Day {{$itinerario->dias}} - {{ucwords(strtolower($itinerario->titulo))}}</b></p>
                            <p>@php echo $itinerario->descripcion; @endphp</p>
                            <img src="{{asset('img/itinerary/'.str_replace(' ','-',$itinerario->titulo).'')}}.jpg" class="responsive-img materialboxed" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p class="yellow-text text-darken-3"><b>Destinos incluidos:</b></p>

                        @foreach($paquete->paquetes_destinos as $destino)
                                <div class="col s4 margin-bottom-20">
                                    <img src="{{asset('img/destinations/'.$destino->imagen.'')}}" alt="" class="responsive-img materialboxed">
                                    {{--<p class="center">{{$destino->destino}}</p>--}}
                                </div>
                        @endforeach
                        {{--<div id="sync2" class="owl-carousel hide-ipad-large">--}}
                            {{--<div class="item item-2"><img src="{{asset('img/destinations/'.$destino->imagen.'')}}" alt="" class="responsive-img"></div>--}}
                        {{--</div>--}}
                    </div>

                    {{--<div class="owl-carousel">--}}
                        {{--<div class="item">--}}
                            {{--<a class="popup-youtube" href="https://www.youtube.com/watch?v=5SJml0MBhW4?autoplay=1&rel=0&controls=0&showinfo=0&wmode=transparent"><img src="http://res.cloudinary.com/milairagny/image/upload/v1487938016/pexels-photo-4_tfmpvk.jpg"></a>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--<div class="row">--}}
                    {{--<div class="col s12 tabs-detail margin-bottom-20">--}}
                        {{--<ul class="tabs">--}}
                            {{--<li class="tab col s3"><a href="#days" class="active">Itinerary for days</a></li>--}}
                            {{--<li class="tab col s3"><a href="#hours">Itinerary for hours</a></li>--}}
                            {{--<li class="tab col s3"><a href="#services">Services</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div id="days" class="col s12">--}}
                        {{--@foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)--}}
                            {{--<h6><b>Day {{$itinerario->dias}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</b></h6>--}}
                            {{--@php echo $itinerario->descripcion; @endphp--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<div id="hours" class="col s12">--}}
                        {{--@foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)--}}

                            {{--<div class="row">--}}
                                {{--<div class="col s4">--}}
                                    {{--<p><b>Day {{$itinerario->dias}} - {{$itinerario->titulo}}</b></p>--}}
                                    {{--<p>({{$itinerario->fecha}})</p>--}}
                                {{--</div>--}}
                                {{--<div class="col s8">--}}
                                    {{--@foreach($itinerario->horas_cotizaciones->sortBy('hora') as $horas)--}}
                                        {{--<p><b>{{$horas->hora}}</b> - @php echo $horas->descripcion; @endphp</p>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<div id="services" class="col s12">--}}
                        {{--@foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)--}}
                            {{--<div class="row">--}}
                                {{--<div class="col s12">--}}
                                    {{--<h6><b>Day {{$itinerario->dias}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</b></h6>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col s12 m9 offset-m1">--}}
                                    {{--<table class="bordered striped highlight responsive-table">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th data-field="id">Concepto</th>--}}
                                            {{--<th data-field="name">Observaciones</th>--}}
                                            {{--<th data-field="price">Precio</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}

                                        {{--<tbody>--}}
                                        {{--@foreach($itinerario->servicios_cotizaciones as $servicios)--}}
                                            {{--<tr>--}}
                                                {{--<td>{{$servicios->tiposervicio}}</td>--}}
                                                {{--<td>@php echo $servicios->observaciones; @endphp</td>--}}
                                                {{--<td>${{$servicios->precio}}</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}

                    {{--</div>--}}
                {{--</div>--}}
                    </div>
                <div class="row">
                    <div class="col s12">
                        <p class="yellow-text text-darken-3"><b>Price</b></p>
                        @php $servicio = 0; @endphp
                        @foreach($paquete->itinerario_cotizaciones as $paquete_itinerario)
                            @foreach($paquete_itinerario->orden_cotizaciones as $orden_cotizaciones)
                                @php
                                    $total = $orden_cotizaciones->precio + $servicio;
                                    $servicio = $total;
                                @endphp
                            @endforeach
                        @endforeach


                        @foreach($paquete->precio_paquetes as $precio_paquete2)
                            @if($precio_paquete2->estado == 1)

                                <div>
                                    <p class="no-margin"><b>Categoria: {{$precio_paquete2->estrellas}} estrellas</b></p>
                                    <table class="table-price-accommodation margin-bottom-20">
                                        <thead>
                                        <tr>
                                            <th>Acomodacion</th>
                                            <th class="text-right">Total ($)</th>
                                        </tr>
                                        @if($precio_paquete2->personas_s > 0)
                                            <tr>
                                                <td class="text-left"><b>Simple</b></td>
                                                <td class="text-right">
                                                    @php
                                                        $precio_s = (($precio_paquete2->precio_s)* 1) * ($paquete->duracion - 1);
                                                        $total_costo = $precio_s + $total;
                                                        $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                    @endphp
                                                    {{number_format($total_utilidad, 2, '.', '')}}
                                                </td>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                            {{--<i class="text-11">- {{$precio_paquete2->personas_s}} habitaciones con acomodacion simple, total de pasajeros {{$precio_paquete2->personas_s * 1}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_s * 1)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>--}}
                                            {{--</td>--}}
                                            {{--</tr>--}}
                                        @else
                                            @php
                                                $precio_s = 0;
                                            @endphp
                                        @endif
                                        @if($precio_paquete2->personas_d > 0)
                                            <tr>
                                                <td class="text-left"><b>Doble</b></td>
                                                <td class="text-right">
                                                    @php
                                                        $precio_d = (($precio_paquete2->precio_d)* 1) * ($paquete->duracion - 1);
                                                        $total_costo = $precio_d + $total;
                                                        $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                    @endphp
                                                    {{number_format($total_utilidad, 2, '.', '')}}
                                                </td>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                            {{--<i class="text-11">- {{$precio_paquete2->personas_d}} habitaciones con acomodacion doble, total de pasajeros {{$precio_paquete2->personas_d * 2}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_d * 2)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>--}}
                                            {{--</td>--}}
                                            {{--</tr>--}}
                                        @else
                                            @php
                                                $precio_d = 0;
                                            @endphp
                                        @endif
                                        @if($precio_paquete2->personas_m > 0)
                                            <tr>
                                                <td class="text-left"><b>Matrimonial</b></td>
                                                <td class="text-right">
                                                    @php
                                                        $precio_m = (($precio_paquete2->precio_m)* 1) * ($paquete->duracion - 1);
                                                        $total_costo = $precio_m + $total;
                                                        $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                    @endphp
                                                    {{number_format($total_utilidad, 2, '.', '')}}
                                                </td>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                            {{--<i class="text-11">- {{$precio_paquete2->personas_m}} habitaciones con acomodacion matrimonial, total de pasajeros {{$precio_paquete2->personas_m * 2}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_m * 2)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>--}}
                                            {{--</td>--}}
                                            {{--</tr>--}}
                                        @else
                                            @php
                                                $precio_m = 0;
                                            @endphp
                                        @endif
                                        @if($precio_paquete2->personas_t > 0)
                                            <tr>
                                                <td class="text-left"><b>Triple</b></td>
                                                <td class="text-right">
                                                    @php
                                                        $precio_t = (($precio_paquete2->precio_t)* 1) * ($paquete->duracion - 1);
                                                        $total_costo = $precio_t + $total;
                                                        $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                                    @endphp
                                                    {{number_format($total_utilidad, 2, '.', '')}}
                                                </td>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                            {{--<i class="text-11">- {{$precio_paquete2->personas_t}} habitaciones con acomodacion matrimonial, total de pasajeros {{$precio_paquete2->personas_t * 3}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_t * 3)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>--}}
                                            {{--</td>--}}
                                            {{--</tr>--}}
                                        @else
                                            @php
                                                $precio_t = 0;
                                            @endphp
                                        @endif
                                        </thead>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Modal Structure -->
            <div id="confirm" class="modal">
                <form action="{{route('quotes_patch_path', $paquete->id)}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="patch">
                    <div class="modal-content">
                        <h5>Estas seguro de confirmar?</h5>
                        <p class="margin-top-40">El paquete personalizado se confirmara para su viaje de ensueño</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Now
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modal Structure -->
            <div id="upgrade" class="modal bottom-sheet">
                <div class="container">
                    <div class="modal-content">
                        <h5>Request changes / upgrades</h5>
                        <p>Ingrese los posibles cambio y sugerencias para personalizar adecuadamente su paquete</p>
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Textarea</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons right">send</i> Agree</a>
                    </div>
                </div>
            </div>

        @else
            @php
                header('Location: '.route('503_path').'');
            @endphp

        @endif

    @endforeach

    @stop