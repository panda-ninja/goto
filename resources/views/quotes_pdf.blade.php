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
            <table class="table-price-accommodation">
                <thead>
                <tr>
                    <th></th>

                    <th colspan="3">Accommodation</th>
                    <th></th>
                </tr>
                <tr>
                    <th data-field="name">Hotel Category </th>
                    <th data-field="price">Simple</th>
                    <th data-field="price">Double</th>
                    <th data-field="price">Triple</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($paquete->precio_paquetes as $precio)
                    @if($precio->estado == 1)
                        <?php $active = 'green lighten-5 active'; $icon = 'check_circle'; ?>
                    @else
                        <?php $active = 'disabled'; $icon = ''; ?>
                    @endif
                    <tr>
                        <td class="{{$active}}"><b>{{$precio->estrellas}} stars</b></td>
                        <td class="{{$active}}">${{$precio->precio_s}} <br> <span>{{$precio->personas_s}} Travellers</span></td>
                        <td class="{{$active}}">${{$precio->precio_d}} <br> <span>{{$precio->personas_d}} Travellers</span></td>
                        <td class="{{$active}}">${{$precio->precio_t}} <br> <span>{{$precio->personas_t}} Travellers</span></td>
                        <td class="{{$active}}"><i class="material-icons green-text">{{$icon}}</i></td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div>
            <h3><b>Destinos incluidos:</b></h3>

            @foreach($paquete->paquetes_destinos as $destino)
                <div>- {{ucwords(strtolower($destino->destinos->destino))}}</div>

            @endforeach
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
            @endforeach
        </div>

        <div>
            <h3>Itinerary for hours</h3>
            <table class="border: 1px solid #333;">
                <tbody>
                @foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)
                    <tr>
                        <td>Day {{$itinerario->dias}} - {{$itinerario->titulo}} <br> (({{$itinerario->fecha}}))</td>
                        <td>
                            <ul>
                            @foreach($itinerario->horas_cotizaciones->sortBy('hora') as $horas)
                                <li>
                                    {{$horas->hora}} - {{$horas->descripcion}})
                                </li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h3>Services</h3>
            @foreach($paquete->itinerario_cotizaciones->sortBy('dias') as $itinerario)
                <h3>Day {{$itinerario->dias}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</h3>

                        <table class="table-price-accommodation">
                            <thead>
                            <tr>
                                <th data-field="id">Concepto</th>
                                <th data-field="name">Observaciones</th>
                                {{--<th data-field="price">Precio</th>--}}
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($itinerario->servicios_cotizaciones as $servicios)
                                <tr>
                                    <td>{{$servicios->tiposervicio}}</td>
                                    <td>{{$servicios->observaciones}}</td>
                                    {{--<td>${{$servicios->precio}}</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

            @endforeach
        </div>

    @endforeach

@stop