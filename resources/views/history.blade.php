@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">transaccion</th>
                    <th>Medio</th>
                    <th>Fecha de pago</th>
                    {{--<th>Fecha de vencimiento</th>--}}
                    <th data-field="price">Total ($)</th>
                    <th>Estado</th>
                </tr>
                </thead>

                <tbody>
                @foreach($pagos as $pago)
                    @foreach($pago->cotizaciones->cliente_cotizaciones as $coti)

                        <tr>
                            <td>{{$pago->transaccion}}</td>
                            <td>{{$pago->medio}}</td>
                            <td>{{$pago->fecha}}</td>
                            {{--<td>{{$pago->vencimiento}}</td>--}}
                            <td>{{$pago->monto}}</td>
                            <td><span class="blue padding-5 white-text border-radius-5">PAID</span></td>
                        </tr>

                    @endforeach
                @endforeach
                
                </tbody>
            </table>
        </div>

    </div>
@stop