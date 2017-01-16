
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
                    <tr><td><b>Nationality:</b> {{$name_country}}</td></tr>
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
        <tr>
            <td colspan="2">
                <div class="container">
                    <div class="section">
                        <div class="row main-wrapper">

                            <div class="col s12 m9 l7">
                                <div>
                                    <h4 class="no-margin font-moserrat row">ITINERARY</h4>
                                </div>
                                @foreach($paquetes as $paquete)
                                    @foreach($paquete->itinerario as $itinerario)

                                        <div id="days-{{$itinerario->iditinerario}}" class="scrollspy clearfix">
                                            <p class="text-18 font-moserrat"><b style="color: #2196F3;font-weight:bold;font-size: 18px">DAY {{$itinerario->dia}}:</b> <b>{{$itinerario->titulo}}</b></p>

                                            <div class="col s12 no-padding" style="width: 90%">
                                                <p class="no-margin">@php echo $itinerario->descripcion @endphp</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>

                        </div>

                        <div class="row margin-top-40">
                            <div class="col s12">
                                <div>
                                    <h4 class="no-margin font-moserrat row">What's Included</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa expedita, labore magni pariatur rem totam voluptates. Assumenda, facere, similique. Autem doloremque, ea harum odio reiciendis saepe tempora veritatis voluptas?</p>
                                </div>
                            </div>
                            <div class="col s12">
                                <div>
                                    <h4 class="no-margin font-moserrat row">What's Not Included</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa expedita, labore magni pariatur rem totam voluptates. Assumenda, facere, similique. Autem doloremque, ea harum odio reiciendis saepe tempora veritatis voluptas?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

@stop