@extends('layouts.quotes_pdf')

@section('content')
    <div class="firstpage">
        <img src="{{asset('img/portada/quotes-pdf.jpg')}}" class="responsive-img position-absolute" alt="">
    </div>

    @foreach($paquete as $paquete)

        <div class="text-center">
            <h2><b>Package Travel: {{$paquete->titulo}}</b></h2>
            <p><b>Package Code:</b> {{$paquete->codigo}} | <b>Package Duration:</b> {{$paquete->duracion}}</p>
        </div>
        <div>
            <p>{{$paquete->descripcion}}</p>
        </div>
        <div>
            <h3>Incluye</h3>
            <p>{{$paquete->incluye}}</p>
            <h3>No Incluye</h3>
            <p>{{$paquete->noincluye}}</p>
            <h3>Opcional</h3>
            <p>{{$paquete->opcional}}</p>
        </div>

        <div>
            <h3>Itinerary for days</h3>
            @foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)
                <h4>Day {{$itinerario->dias}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</h4>
                <p>{{$itinerario->descripcion}}</p>
                <h4>Servicios:</h4>
                <table class="table-price-accommodation margin-bottom-20">
                    <thead>
                    <tr>
                        <th data-field="id">Concepto</th>
                        <th data-field="name">Observaciones</th>
                        {{--<th data-field="price">Precio</th>--}}
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($itinerario->orden_cotizaciones as $servicios)
                        <tr>
                            <td>{{$servicios->nombre}}</td>
                            <td>{{$servicios->observacion}}</td>
                            {{--<td>${{$servicios->precio}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endforeach
        </div>

        <div>
            <h3><b>Destinos incluidos:</b></h3>

            @foreach($paquete->destinos as $destino)
                <div>- {{ucwords(strtolower($destino->destino))}}</div>
            @endforeach
        </div>

        <div>
            <h3><b>Precios:</b></h3>
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
                        <h5><b>CATEGORIA: {{$precio_paquete2->estrellas}} ESTRELLAS</b></h5>

                        @if($precio_paquete2->personas_s > 0)
                            <table class="table-price-accommodation margin-bottom-20">
                                <thead>
                                <tr>
                                    <th>Acomodacion</th>
                                    <th class="text-right">Total ($)</th>
                                    {{--<th data-field="price">Precio</th>--}}
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td><b>Simple</b></td>
                                    <td class="text-right">
                                        @php
                                            $precio_s = (($precio_paquete2->precio_s * $precio_paquete2->personas_s)* 1) * ($paquete->duracion - 1);
                                            $total_costo = $precio_s + $total;
                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                        @endphp
                                        {{number_format($total_utilidad, 2, '.', '')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <i class="text-11">- {{$precio_paquete2->personas_s}} habitaciones con acomodacion simple, total de pasajeros {{$precio_paquete2->personas_s * 1}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_s * 1)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            @php
                                $precio_s = 0;
                            @endphp
                        @endif
                        @if($precio_paquete2->personas_d > 0)

                            <table class="table-price-accommodation margin-bottom-20">
                                <thead>
                                <tr>
                                    <th>Acomodacion</th>
                                    <th class="text-right">Total ($)</th>
                                    {{--<th data-field="price">Precio</th>--}}
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td><b>Doble</b></td>
                                    <td class="text-right">
                                        @php
                                            $precio_d = (($precio_paquete2->precio_d * $precio_paquete2->personas_d)* 2) * ($paquete->duracion - 1);
                                            $total_costo = $precio_d + $total;
                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                        @endphp
                                        {{number_format($total_utilidad, 2, '.', '')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <i class="text-11">- {{$precio_paquete2->personas_d}} habitaciones con acomodacion doble, total de pasajeros {{$precio_paquete2->personas_d * 2}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_d * 2)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            @php
                                $precio_d = 0;
                            @endphp
                        @endif

                        @if($precio_paquete2->personas_m > 0)

                            <table class="table-price-accommodation margin-bottom-20">
                                <thead>
                                <tr>
                                    <th>Acomodacion</th>
                                    <th class="text-right">Total ($)</th>
                                    {{--<th data-field="price">Precio</th>--}}
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td><b>Matrimonial</b></td>
                                    <td class="text-right">
                                        @php
                                            $precio_m = (($precio_paquete2->precio_m * $precio_paquete2->personas_m)* 2) * ($paquete->duracion - 1);
                                            $total_costo = $precio_m + $total;
                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                        @endphp
                                        {{number_format($total_utilidad, 2, '.', '')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <i class="text-11">- {{$precio_paquete2->personas_m}} habitaciones con acomodacion matrimonial, total de pasajeros {{$precio_paquete2->personas_m * 2}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_m * 2)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        @else
                            @php
                                $precio_m = 0;
                            @endphp
                        @endif
                        @if($precio_paquete2->personas_t > 0)

                            <table class="table-price-accommodation margin-bottom-20">
                                <thead>
                                <tr>
                                    <th>Acomodacion</th>
                                    <th class="text-right">Total ($)</th>
                                    {{--<th data-field="price">Precio</th>--}}
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td><b>Triple</b></td>
                                    <td class="text-right">
                                        @php
                                            $precio_t = (($precio_paquete2->precio_t * $precio_paquete2->personas_t)* 3) * ($paquete->duracion - 1);
                                            $total_costo = $precio_t + $total;
                                            $total_utilidad = $total_costo + ($total_costo * (($precio_paquete2->utilidad)/100));
                                        @endphp
                                        {{number_format($total_utilidad, 2, '.', '')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <i class="text-11">- {{$precio_paquete2->personas_t}} habitaciones con acomodacion matrimonial, total de pasajeros {{$precio_paquete2->personas_t * 3}}, precio por persona ${{$total_utilidad / ($precio_paquete2->personas_t * 3)}}, numero de dias en hotel {{$paquete->duracion - 1}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        @else
                            @php
                                $precio_t = 0;
                            @endphp
                        @endif
                    </div>

                @endif
            @endforeach
        </div>

        {{--<div>--}}
            {{--<h3>Itinerary for hours</h3>--}}
            {{--<table class="table-price-accommodation text-left">--}}
                {{--<tbody>--}}
                {{--@foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)--}}
                    {{--<tr>--}}
                        {{--<td><b>Day {{$itinerario->dias}} - {{$itinerario->titulo}}</b> <br> <span class="hour-text">({{$itinerario->fecha}})</span></td>--}}
                        {{--<td>--}}
                            {{--<ul>--}}
                                {{--@foreach($itinerario->horas_cotizaciones->sortBy('hora') as $horas)--}}
                                    {{--<li>--}}
                                        {{--<b>{{$horas->hora}}</b> - {{$horas->descripcion}})--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}

        {{--<div>--}}
            {{--<h3 class="margin-top-40">Services</h3>--}}
            {{--@foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)--}}
                {{--<h4>Day {{$itinerario->dias}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</h4>--}}

                {{--<table class="table-price-accommodation margin-bottom-20">--}}
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
                            {{--<td>{{$servicios->observaciones}}</td>--}}
                            {{--<td>${{$servicios->precio}}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}

            {{--@endforeach--}}
        {{--</div>--}}

    @endforeach

@stop