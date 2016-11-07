@extends('layouts.dashboard')

@section('content')
    @foreach($pagos as $pagocliente)

        @foreach($pagocliente->cotizaciones as $cotizacion)
            <?php $nroCuotas=0?>
            <?php $porcentaje=0?>
            @if($cotizacion->estado==1)
                <ul class="collapsible popout" data-collapsible="accordion">
                <li class="row">

                    <?php $pagados=0?>

                    @foreach($cotizacion->pagos as $pagoCount)

                                @if($pagoCount->estado==1)
                                    <?php $pagados=$pagados+1?>

                                @endif
                            <?php $nroCuotas=$nroCuotas+1?>
                    @endforeach
                        <?php
                            $porcentaje=round(($pagados/$nroCuotas)*100);
                        ?>

                        <div class="collapsible-header">
                        <i class="material-icons green-text">check_circle</i>
                        <b>Cotizacion:</b> {{$cotizacion->fecha}} / </b>
                        <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}
                        <div class="row">
                            <div class="col s10">
                                <div class="progress">
                                    <div class="determinate" style="width: {{$porcentaje}}%"></div>
                                </div>
                            </div>
                            <div class="col s2 no-padding green-text text-darken-3 center-align">
                                <b>{{$porcentaje}}% Paid out</b>
                            </div>
                        </div>
                    </div>
                    <div class="collapsible-body">
                    <?php $i=1?>
                    @foreach($cotizacion->pagos as $pago)
                        <div class="col s12">
                            <div class="section card-panel grey lighten-4 z-depth-1 hoverable">
                                <div class="valign-wrapper qoutes-box">
                                    <div class="col s2">
                                        <p class="no-padding yellow-text text-darken-3 center-align"><b>Pay {{$i++}}</b></p>
                                    </div>
                                    <div class="col s6">
                                        <p class="no-padding black-text text-darken-3 center-align">
                                            {{$pago->concepto}}
                                        </p>
                                    </div>
                                    <div class="col s2">
                                        <p class="no-padding yellow-text text-darken-3 center-align"><b>Monto: {{$pago->monto}}</b></p>
                                    </div>
                                    @if($pago->estado==1)
                                    <div class="col s2">
                                        <p class="no-padding green-text text-darken-3 center-align">
                                            <b>Vence: {{$pago->vencimiento}}</b>
                                            <a class="waves-effect waves-light btn"><i class="material-icons left">done_all</i>button</a>

                                        </p>

                                    </div>
                                    @else
                                        <div class="col s2">
                                            <p class="no-padding green-text text-darken-3 center-align">
                                                <b>Vence: {{$pago->vencimiento}}</b>
                                                <a href="{{route('payments_show_path',$pago->id)}}" class="waves-effect waves-light btn"><i class="material-icons left">payment</i>button</a>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </li>
                </ul>
            @endif
        @endforeach
    @endforeach

@stop