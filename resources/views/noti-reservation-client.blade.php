
@extends('layouts.notification')

@section('content')
<!--    --><?php
//    public function obtenerFechaEnLetra($fecha0){
//        $fecha1=explode('-',$fecha0);
//        $fecha=$fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0];
//        $dia= conocerDiaSemanaFecha($fecha);
//        $num = date("j", strtotime($fecha));
//        $anno = date("Y", strtotime($fecha));
//        $mes = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
//        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
//        return $dia.', '.$mes.' '.$num.', '.$anno;
//    }
//
//    public function conocerDiaSemanaFecha($fecha) {
//        $dias = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
//        $dia = $dias[date('w', strtotime($fecha))];
//        return $dia;
//    }
//    ?>
    <table class="x_full" border="0" cellpadding="0" width="100%" cellspacing="0"  align="center" style="max-width:900px;">
        <tbody>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 900px;padding: 7px" colspan="2"><h2>Format Pay</h2>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 550px;padding: 7px">
                <table>
                    <tr><td><b>Client:</b> {{$first_name_p.', '.$last_name_p}}</td></tr>
                    <tr><td><b>Nacionalidad:</b> {{$name_country}}</td></tr>
                    {{--<tr><td><b>Residenca:</b> {{auth()->guard('cliente')->user()->residencia}}</td></tr>--}}
                    {{--<tr><td><b>Pasaporte:</b> {{auth()->guard('cliente')->user()->pasaporte}}</td></tr>--}}
                    <tr><td><b>Telefono:</b> {{$telephone_p}}</td></tr>
                </table>
            </td>
            <td bgcolor="#f7f7f7" style="width: 350px;padding: 7px">
                <table>
                    {{--<tr><td><b>Numero de factura:</b> {{$pago->id}}</td></tr>--}}
                    <tr><td><b>Fecha de la factura:</b> {{$fecha_factura}}</td></tr>
                    <tr><td><b>Medio:</b> {{$medio}}</td></tr>
                    <tr><td><b>Transaccion:</b> {{$transaccion}}</td></tr>
                    <tr><td><b>Total:</b> $. {{$total}}</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="text-20">{{$destino_travel}}</b>
                <b class="text-20">{{$nrodias_p}}</b>
                <b class="text-20">{{$date_travel}}</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p><b>Travellers:</b><span class="text-15 blue-text">{{$travellers_p}}</span></p>
                <p><b class="text-18">Accomodation:</b><span class="text-15 red-text ">{{$nro_estrellas}} STARS</span></p>
                @if($nro_ontriple_p!=0)
                    <p>On triple accomodation {{$nro_ontriple_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ontriple_p}}</p>
                @endif
                @if($nro_ondouble_p!=0)
                    <p>On double accomodation {{$nro_ondouble_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ondouble_p}}</p>
                @endif
                @if($nro_onmatrimonial_p!=0)
                    <p>On matrimonial accomodation {{$nro_onmatrimonial_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_onmatrimonial_p}}</p>
                @endif
                @if($nro_onsimple_p!=0)
                    <p>On simple accomodation {{$nro_onsimple_p}}x <img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ononsimple_p}}</p>
                @endif
                <p><b class="text-18">Optional Activities:</b></p>
                {{--<ul>--}}
                {{--<?php $pos=0;?>--}}
                {{--@foreach($ch_extras_valor as $ch_extra)--}}
                    {{--<?php $pos++;?>--}}
                    {{--<li>{{$ch_extra}}$ {{$travellers_p*$ch_extras_precio[$pos]}} ({{$ch_extras_precio[$pos]}} for traveller)</li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                <b class="text-20">TOTAL ${{$total}}</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3 class="text-20">Your Package</h3>

            </td>
        </tr>
        </tbody>
    </table>

@stop