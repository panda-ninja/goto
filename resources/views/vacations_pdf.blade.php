@extends('layouts.quotes_pdf')

@section('content')
    <div class="firstpage">
        <img src="{{asset('img/portada/quotes-pdf.jpg')}}" class="responsive-img position-absolute" alt="">
    </div>

    @foreach($paquete as $paquetes)
        <div class="text-center">
            <h2><b>Package Travel: {{$paquetes->titulo}}</b></h2>
            <p><b>Package Code:</b> {{$paquetes->codigo}} | <b>Package Duration:</b> {{$paquetes->duracion}}</p>
        </div>

        <div>
            <h3><b>Destinos incluidos:</b></h3>

            @foreach($paquetes->paquetes_destinos as $destino)
                <div>- {{ucwords(strtolower($destino->destinos->destino))}}</div>
            @endforeach
        </div>

        <div>
            <h3>Incluye</h3>
            {{$paquetes->incluye}}
            <h3>No Incluye</h3>
            {{$paquetes->noincluye}}
        </div>

        <div>
            <h3>Itinerary</h3>
            @foreach($paquetes->itinerario->sortBy('dia') as $itinerario)
                <h4>Day {{$itinerario->dia}} - {{$itinerario->titulo}} ({{$itinerario->fecha}})</h4>
                {{$paquetes->incluye }}
            @endforeach
        </div>

    @endforeach

@stop