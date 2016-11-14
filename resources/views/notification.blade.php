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
                <tr><td><b>Client:</b> {{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</td></tr>
                <tr><td><b>Nacionalidad:</b> {{auth()->guard('cliente')->user()->nacionalidad}}</td></tr>
                <tr><td><b>Residenca:</b> {{auth()->guard('cliente')->user()->residencia}}</td></tr>
                <tr><td><b>Pasaporte:</b> {{auth()->guard('cliente')->user()->pasaporte}}</td></tr>
                <tr><td><b>Telefono:</b> {{auth()->guard('cliente')->user()->telefono}}</td></tr>
            </table>
        </td>
        <td bgcolor="#f7f7f7" style="width: 300px;padding: 7px">
            <table>
                <tr><td><b>Numero de factura:</b> {{$pago->id}}</td></tr>
                <tr><td><b>Fecha de la factura:</b> {{$pago->vencimiento}}</td></tr>
                <tr><td><b>Medio:</b> {{$pago->medio}}</td></tr>
                <tr><td><b>Transaccion:</b> {{$pago->transaccion}}</td></tr>
                <tr><td><b>Total:</b> $. {{$pago->monto}}</td></tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <p><b>Detail</b></p>
            <p>{{$pago->concepto}}</p>
        </td>
    </tr>
    </tbody>
</table>

@stop