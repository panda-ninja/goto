@extends('layouts.dashboard')

@section('content')


    {{--<h4 class="center margin-bottom-40">Quote history</h4>--}}

    {{--<ul id="tabs-swipe-demo" class="tabs">--}}
    {{--<li class="tab col s3"><a class="active" href="#todas">Todas las cotizaciones</a></li>--}}
    {{--<li class="tab col s3"><a href="#confirmados">Confirmados</a></li>--}}
    {{--<li class="tab col s3"><a href="#pendientes">Pendientes</a></li>--}}
    {{--</ul>--}}

    <div class="col s12">
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10">
                <a href="{{route('quotes_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>inbox</i> Todas las cotizaciones</a>
            </div>
        </div>
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10 active">
                <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>check_circle</i> Confirmados</a>
            </div>

        </div>
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10">
                <a href="{{route('quotes_pending_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>warning</i> Pendientes</a>
            </div>
        </div>
    </div>
    <div id="todas" class="col s12 ">
        <ul class="collection">
            @foreach($cotizaciones as $cotizacion)

                    @foreach($cotizacion->cliente_cotizaciones as $cot)
                        @if($cot)
                            @if($cotizacion->estado == '1')
                            @php $bg_status = ''; @endphp
                            @foreach($cotizacion->paquete_cotizaciones as $paquete_cot)
                                @if($paquete_cot->estado == 1)
                                    @php $bg_status = "white"; @endphp
                                @else
                                    @php $bg_status = "grey lighten-4"; @endphp
                                @endif

                                    @if($paquete_cot->estado == 0)
                                        @php $bg_hidden = "hide"; @endphp
                                    @else
                                        @php $bg_hidden = ""; @endphp
                                    @endif

                            @endforeach
                            <li class="collection-item {{$bg_status}} {{$bg_hidden}}">
                                <span class="title text-12"><i>Fecha de viaje: {{$cotizacion->fecha}} | Numero de pasajeros: {{$cotizacion->nropersonas}}</i></span>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="no-padding">Action</th>
                                        <th class="no-padding">Proposals</th>
                                        <th class="no-padding"></th>
                                    </tr>
                                    </thead>
                                    @php $i = 1; @endphp
                                    @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                                        @if($cot->estado == 0 and $paquete_cotizaciones->estado==3)

                                            @php
                                                switch ($paquete_cotizaciones->estado) {
                                                    case '1':
                                                        $active = 'grey-text text-darken-3 bold-900';
                                                        $estado = "<i class='material-icons grey-text text-darken-3'>mail</i>";
                                                        break;
                                                    case '2':
                                                        $active = 'grey-text text-darken-3';
                                                        $estado = '<i class="material-icons grey-text">mail_outline</i>';
                                                        break;
                                                    case '3':
                                                        $active = 'green-text text-darken-3';
                                                        $estado = '<i class="material-icons green-text">check_circle</i>';
                                                        break;
                                                    case '4':
                                                        $active = 'grey-text text-lighten-1';
                                                        $estado = "<i class='material-icons grey-text text-lighten-1'>close</i>";
                                                        break;
                                                    default:
                                                        $estado = '';
                                                        $active = '';
                                                        break;
                                                }

                                            @endphp


                                            <tr>
                                                <td class="no-padding">
                                                    @if($paquete_cotizaciones->estado == 3)
                                                        <a href="{{route('group_path',$cotizacion->id)}}" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Agregar datos personales y de grupo (si tiene grupo)."><i class="material-icons">supervisor_account</i></a>
                                                        <a href="{{route('payments_create_path',$cotizacion->id)}}" class="pink-text text-accent-4"><i class="material-icons">payment</i></a>
                                                    @endif
                                                </td>
                                                <td class="no-padding">
                                                    <a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}} valign-wrapper">
                                                        @php
                                                            echo $estado;
                                                        @endphp
                                                        Propuesta {{$i++ . PHP_EOL}}: {{ucwords(strtolower($paquete_cotizaciones->titulo))}}
                                                    </a>
                                                </td>
                                                {{--<td class="no-padding"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}}">{{$paquete_cotizaciones->titulo}}</a></td>--}}
                                                <td class="no-padding right-align"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}} rigth">{{date_format($paquete_cotizaciones->updated_at, 'j F Y')}}</a></td>
                                            </tr>
                                        @elseif($cot->estado == 1)
                                            @php
                                                switch ($paquete_cotizaciones->estado) {
                                                    case '1':
                                                        $active = 'grey-text text-darken-3 bold-900';
                                                        $estado = "<i class='material-icons grey-text text-darken-3'>mail</i>";
                                                        break;
                                                    case '2':
                                                        $active = 'grey-text text-darken-3';
                                                        $estado = '<i class="material-icons grey-text">mail_outline</i>';
                                                        break;
                                                    case '3':
                                                        $active = 'grey-text text-darken-3';
                                                        $estado = '<i class="material-icons green-text">check_circle</i>';
                                                        break;
                                                    case '4':
                                                        $active = 'grey-text text-lighten-1';
                                                        $estado = "<i class='material-icons grey-text text-lighten-1'>close</i>";
                                                        break;
                                                    default:
                                                        $estado = '';
                                                        $active = '';
                                                        break;
                                                }

                                            @endphp


                                            <tr>
                                                <td class="no-padding">
                                                    @if($paquete_cotizaciones->estado == 3)
                                                        <a href="{{route('group_path',$cotizacion->id)}}" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Agregar datos personales y de grupo (si tiene grupo)."><i class="material-icons">supervisor_account</i></a>
                                                        <a href="{{route('payments_create_path',$cotizacion->id)}}" class="pink-text text-accent-4"><i class="material-icons">payment</i></a>
                                                    @endif
                                                    @php
                                                        echo $estado;
                                                    @endphp
                                                </td>
                                                <td class="no-padding"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}}">Propuesta {{$i++}}:</a></td>
                                                <td class="no-padding"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}}">{{$paquete_cotizaciones->titulo}}</a></td>
                                                <td class="no-padding right-align"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}} rigth">{{date_format($paquete_cotizaciones->updated_at, 'j F Y')}}</a></td>
                                            </tr>
                                        @endif



                                    @endforeach
                                </table>

                                {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                                {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                                {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                                {{--<a href="#!" class="secondary-content">18 june 2017</a>--}}

                            </li>
                            @endif
                        @endif
                    @endforeach
            @endforeach
        </ul>
    </div>

    <!-- Modal Structure -->
    <div id="upgrade" class="modal bottom-sheet">
        <div class="container">
            <div class="modal-content">
                <h5>Request changes / upgrades</h5>
                <p>Ingrese los posibles cambio y sugerencias para personalizar adecuadamente su paquetes</p>
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

@stop