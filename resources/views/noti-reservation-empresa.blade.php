
@extends('layouts.notification')

@section('content')
    <?php
    $paquete1='';
    ?>
    @foreach ($paquetes as $paquete)
        <?php
        $paquete1=$paquete;
        ?>
    @endforeach

    <table class="x_full" border="0" cellpadding="0" width="100%" cellspacing="0"  align="center" style="max-width:900px;">
        <tbody>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 900px;padding: 7px" colspan="2"><h2>New invoice</h2>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f7f7f7" style="width: 550px;padding: 7px">
                <table>
                    <tr><td><b>Client:</b> {{$first_name_p.', '.$last_name_p}}</td></tr>
                    <tr><td><b>Nationality:</b> {{$name_country}}</td></tr>
                    <tr><td><b>Email:</b> {{$email_p}}</td></tr>
                    {{--<tr><td><b>Residenca:</b> {{auth()->guard('cliente')->user()->residencia}}</td></tr>--}}
                    {{--<tr><td><b>Passport:</b> {{auth()->guard('cliente')->user()->pasaporte}}</td></tr>--}}
                    <tr><td><b>Telephone:</b> {{$telephone_p}}</td></tr>
                </table>
            </td>
            <td bgcolor="#f7f7f7" style="width: 350px;padding: 7px">
                <table>
                    {{--<tr><td><b>Invoice number:</b> {{$pago->id}}</td></tr>--}}
                    <tr><td><b>Fecha de la factura:</b> {{$fecha_factura}}</td></tr>
                    <tr><td><b>Payment method:</b> {{$medio}}</td></tr>
                    <tr><td><b>Transaction:</b> {{$transaccion}}</td></tr>
                    <tr><td><b>Codigo Paquete:</b> {{$paquete1->codigo}}</td></tr>

                    <tr><td><b>Total:</b> $ {{$total}}.00</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <h3 class="text-25" style="text-decoration:none; color:#ff8c00; font-weight:bold">{{$destino_travel}}</h3>
                <b class="text-20" style="text-decoration:none;color: #828935;font-weight:bold">{{$nrodias_p}} DAYS</b> <b style="text-decoration:none; color:#ff8c00; font-weight:bold">|</b> <b class="text-20" style="text-decoration:none;color: #828935;font-weight:bold;">{{$date_travel}}</b>
                <p>
                    <b class="text-20" style="text-decoration:none;color: #212121;font-weight:bold">{{$travellers_p}} Travellers</b> | <b style="text-decoration:none; color:#ff8c00; font-weight:bold"></b> <b class="text-20" style="text-decoration:none;color: #f44336;font-weight:bold;">{{$nro_estrellas}} STARS</b>
                </p>
            </td>
        </tr>
        <tr>
            <table>
                <tr>
                    <td style="margin: 10px" bgcolor="#f7f7f7" width="45%"><p><b class="text-20" style="text-decoration:none; color:#2196F3; font-weight:bold">Accomodation</b></p></td>
                    <td  width="10%" bgcolor="#f7f7f7" ></td>
                    <td style="margin: 10px"  bgcolor="#f7f7f7" width="45%"><p><b class="text-20" style="text-decoration:none; color:#2196F3; font-weight:bold">Optional Activities</b></p></td>
                </tr>
                <tr>
                    <td style="margin: 10px"  bgcolor="#f7f7f7" width="45%">

                        @if($nro_ontriple_p!=0)
                        <p style="color: #3d4d5a">On triple accomodation {{$nro_ontriple_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ontriple_p}}</p>
                        <hr>
                        @endif
                        @if($nro_ondouble_p!=0)
                        <p style="color: #3d4d5a">On double accomodation {{$nro_ondouble_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ondouble_p}}</p>
                        <hr>
                        @endif
                        @if($nro_onmatrimonial_p!=0)
                        <p style="color: #3d4d5a">On matrimonial accomodation {{$nro_onmatrimonial_p}}x <img src="{{URL::to('images/male.png')}}" alt=""><img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_onmatrimonial_p}}</p>
                        <hr>
                        @endif
                        @if($nro_onsimple_p!=0)
                        <p style="color: #3d4d5a">On simple accomodation {{$nro_onsimple_p}}x <img src="{{URL::to('images/male.png')}}" alt=""> x ${{$precio_ononsimple_p}}</p>
                        <hr>
                        @endif
                    </td>
                    <td  width="10%" bgcolor="#f7f7f7" ></td>
                    <td  style="margin: 10px" bgcolor="#f7f7f7" width="45%">
                        @if($ch_extras_valor_count>0)
                        <?php $pos=0;?>
                        @foreach($ch_extras_valor as $ch_extra)
                            @if($ch_extra>0)
                                <p style="color: #3d4d5a">{{$ch_extras_name[$pos]}} ${{$travellers_p*$ch_extras_precio[$pos]}}({{$ch_extras_precio[$pos]}} for traveller)</p>
                                <hr>
                                {{--                                <li>{{$ch_extras_name[$pos]}} ${{$ch_extras_precio[$pos]}}</li>--}}
                            @endif
                            <?php $pos++;?>
                        @endforeach
                        @else
                            None
                        @endif
                    </td>
                </tr>
            </table>
        </tr>
        <tr style="text-align: right"><td colspan="2" style="text-align: right"><b style="text-decoration:none; color:#ff8c00; font-weight:bold" class="text-20">TOTAL </b><b class="text-24" style="text-decoration:none; color:#42A5F5; font-weight:bold">${{$total}}.00</b></td></tr>

        </tbody>
    </table>

@stop