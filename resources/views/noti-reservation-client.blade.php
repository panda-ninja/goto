@extends('layouts.notification')

@section('content')
    <table class="x_full" border="0" cellpadding="0" width="100%" cellspacing="0"  align="center" style="max-width:900px;">
        <tbody>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 900px;padding: 7px" colspan="2"><h2>Format Pay</h2>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 600px;padding: 7px">
                <table>
                    <tr><td><b>Client:</b> {{$first_name_p.', '.$last_name_p}}</td></tr>
                    <tr><td>Nacionalidad:</b> {{$name_country}}</td></tr>
                    {{--<tr><td><b>Residenca:</b> {{auth()->guard('cliente')->user()->residencia}}</td></tr>--}}
                    {{--<tr><td><b>Pasaporte:</b> {{auth()->guard('cliente')->user()->pasaporte}}</td></tr>--}}
                    <tr><td><b>Telefono:</b> {{$telephone_p}}</td></tr>
                </table>
            </td>
            <td bgcolor="#f7f7f7" style="width: 300px;padding: 7px">
                {{--<table>--}}
                    {{--<tr><td><b>Numero de factura:</b> {{$pago->id}}</td></tr>--}}
                    <tr><td><b>Fecha de la factura:</b> {{$fecha_factura}}</td></tr>
                    <tr><td><b>Medio:</b> {{$medio}}</td></tr>
                    <tr><td><b>Transaccion:</b> {{$transaccion}}</td></tr>
                    <tr><td><b>Total:</b> $. {{$total}}</td></tr>
                {{--</table>--}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                {{--<p><b>Detail</b></p>--}}
                {{--<p>{{$pago->concepto}}</p>--}}
            </td>
        </tr>
        </tbody>
    </table>

@stop