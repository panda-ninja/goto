@extends('layouts.default')

@section('content')
    <?php $i1=0;?>
    @foreach($paquetes as $paquete)
        @foreach($paquete->paquete_servicio_extra as $servicios)
            <?php $i1++;?>
        @endforeach
    @endforeach
    <?php
    $paquete1='';

    $pre_2_s=$precio;
    $pre_2_d=$precio;
    $pre_2_t=$precio;

    $pre_3_s=$precio;
    $pre_3_d=$precio;
    $pre_3_t=$precio;

    $pre_4_s=$precio;
    $pre_4_d=$precio;
    $pre_4_t=$precio;

    $pre_5_s=$precio;
    $pre_5_d=$precio;
    $pre_5_t=$precio;
    function obtenerFechaEnLetra($fecha0){
        $fecha1=explode('-',$fecha0);
        $fecha=$fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0];
        $dia= conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$mes.' '.$num.', '.$anno;
    }

    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }
    ?>
    @foreach($paquetes as $paquete)
        <?php
        $paquete1=$paquete;
        ?>
    @endforeach

    <div class="container">
        <div class="section">
            <div class="row center">
                <h1 class="yellow-text text-darken-4 no-margin text-50"><b>{{$_POST['txt_country']}}</b></h1>
                <p class="font-moserrat center text-20 no-margin grey-text ">{{$paquete1->duracion}} DAYS | from ${{$precio}}</p>
            </div>
            <form class="font-moserrat" id="form_buscar" action="{{route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($_POST['txt_country'])), 'dias'=>$paquete1->duracion.'-days-tours'))}}"
                  method="post">
                {{csrf_field()}}
                <div class="row center">
                    <div class="input-field col s12 m3 l3">
                        <input type="hidden" value="{{$paquete1->duracion}}" name="dias">
                        <select name="txt_country" id="destino_travel">
                            @foreach($paqueteCombo as $paquete)
                                @if($paquete->titulo==$paquete1->titulo)
                                    <option value="{{$paquete->titulo}}" selected>{{$paquete->titulo}}</option>
                                @else
                                    <option value="{{$paquete->titulo}}">{{$paquete->titulo}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="destino_travel" class="grey-text text-darken-3">From</label>
                    </div>
                    <div class="input-field col s12 m4 l4" id="dispo">

                        <input type="hidden" value="{{$precio}}" name="txt_price" id="txt_price">
                        <select name="txt_date" id="date_travel" onclick="pasar()" onchange="this.form.submit();">
                            @foreach($paqueteCombo as $paquete)
                                @if($paquete->codigo==$paquete1->codigo)
                                    @foreach($paquete->disponibilidad as $disponibilidad)
                                        @if($disponibilidad->estado=='1')
                                            @if($disponibilidad->estrellas=='3')
                                                @if($disponibilidad->fecha_disponibilidad==$datedispo)
                                                    <option value="{{$disponibilidad->fecha_disponibilidad.'_'.$disponibilidad->precio_d}}" selected>{{obtenerFechaEnLetra($disponibilidad->fecha_disponibilidad)}}</option>
                                                @else
                                                    <option value="{{$disponibilidad->fecha_disponibilidad.'_'.$disponibilidad->precio_d}}" >{{obtenerFechaEnLetra($disponibilidad->fecha_disponibilidad)}}</option>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                        <label for="date_travel" class="grey-text text-darken-3">Other Dates</label>
                    </div>
                    <div class="col s12 m5 l5">
                        <div class="row">
                            <div class="input-field col m6" >
                                <select  name="travelers" id="travelers" onchange="ch_travelers()">
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <label for="travelers" class="grey-text text-darken-3">Travellers</label>
                            </div>
                            <div class="col m6">
                                <div id="nro_travelers" class=" margin-top-20">
                                    <i class="fa fa-male fa-2x" ></i><i class="fa fa-male fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="font-moserrat checkout-form" action="{{route('checkout_store_path')}}" method="post" id="checkout-form1">
                {{csrf_field()}}
                <input type="hidden" name="bloq0" id="bloq0" value=""/>
                <input type="hidden" name="bloq" id="bloq" value="bloque_0"/>
                <div class="row ">
                    <div class="col s12 m8 l8 margin-bottom-20">
                        <div class="row center">
                            <div class="col s12 m12 l12 table-responsive">

                                <?php
                                $TipoPaquete='ConHotel';
                                ?>
                                <input type="hidden" name="TipoPaquete" idname="TipoPaquete" value="<php echo $TipoPaquete;?>">
                                <table class="table  borde-tabla-habitacion text-center">
                                    <tr>
                                        <td class="col-lg-2"><label for="" class="text-center">Rooms</label></td>
                                        <td class="col-lg-6"><label for="" class="text-center">Price per person<br><label class="text-12 color-plomo">Based on hotel category</label></label></td>

                                        <td class="col-lg-1 hide" onclick="acomodacion(2)">
                                            <p>
                                                <input type="hidden" id="nro_estrellas" name="nro_estrellas" value="3">
                                                <input name="acomodacion[]" type="radio" id="acomodacion2"/>
                                                <label for="acomodacion2" class="red-text text-9">2 STARS</label>
                                            </p>

                                        </td>
                                        <td class="col-lg-1"  onclick="acomodacion(3)">
                                            <p>
                                                <input name="acomodacion[]" type="radio" id="acomodacion3" checked="checked" />
                                                <label for="acomodacion3" class="red-text">3 STARS</label>
                                            </p>
                                        </td>
                                        <td class="col-lg-1" onclick="acomodacion(4)">
                                            <p>
                                                <input name="acomodacion[]" type="radio" id="acomodacion4" />
                                                <label for="acomodacion4" class="red-text">4 STARS</label>
                                            </p>
                                        </td>
                                        <td class="col-lg-1 hide" onclick="acomodacion(5)">
                                            <p>
                                                <input name="acomodacion[]" type="radio" id="acomodacion5" />
                                                <label for="acomodacion5" class="red-text">5 STARS</label>
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>

                                        @if($TipoPaquete=='SinHotel')


                                        @else
                                            @foreach($paquetes as $paquete)
                                                @foreach($paquete->disponibilidad as $precio_paquetes)
                                                    @if($precio_paquetes->estrellas=='2')
                                                        <?php
                                                        $pre_2_s=$precio_paquetes->precio_s;
                                                        $pre_2_d=$precio_paquetes->precio_d;
                                                        $pre_2_t=$precio_paquetes->precio_t;
                                                        ?>
                                                    @endif
                                                    @if($precio_paquetes->estrellas=='3')
                                                        <?php
                                                        $pre_3_s=$precio_paquetes->precio_s;
                                                        $pre_3_d=$precio_paquetes->precio_d;
                                                        $pre_3_t=$precio_paquetes->precio_t;
                                                        ?>
                                                    @endif
                                                    @if($precio_paquetes->estrellas=='4')
                                                        <?php
                                                        $pre_4_s=$precio_paquetes->precio_s;
                                                        $pre_4_d=$precio_paquetes->precio_d;
                                                        $pre_4_t=$precio_paquetes->precio_t;
                                                        ?>
                                                    @endif
                                                    @if($precio_paquetes->estrellas=='5')
                                                        <?php
                                                        $pre_5_s=$precio_paquetes->precio_s;
                                                        $pre_5_d=$precio_paquetes->precio_d;
                                                        $pre_5_t=$precio_paquetes->precio_t;
                                                        ?>
                                                    @endif
                                                @endforeach
                                            @endforeach


                                        @endif

                                        <td><input class="form-control ancho_number" type="number" name="nroHabitacionesT" id="nroHabitacionesT" value="0" min="0" max="0" onchange="distribucion('T')"></td>
                                        <td><label for="" class="text-center">Triple Beds</label><br><img class="beds" src="{{asset('images/single.png')}}"><img class="beds" src="{{asset('images/single.png')}}"><img class="beds" src="{{asset('images/single.png')}}"></td>
                                        <?php
                                        echo '<input type="hidden" id="precio_T" name="precio_T" value="'.$pre_3_t.'">';
                                        echo'<td class=" hide" id="aco_2_T" onclick="acomodacion(2)">$ '.$pre_2_t.'</td>';
                                        echo'<td id="aco_3_T" onclick="acomodacion(3)">$ '.$pre_3_t.'</td>';
                                        echo'<td id="aco_4_T" onclick="acomodacion(4)">$ '.$pre_4_t.'</td>';
                                        echo'<td class=" hide"  id="aco_5_T" onclick="acomodacion(5)">$ '.$pre_5_t.'</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control ancho_number" type="number" name="nroHabitacionesD" id="nroHabitacionesD" value="1" min="0"  max="1"  onchange="distribucion('D')"></td>
                                        <td><label for="" class="text-center">Double Beds</label><br><img class="beds" src="{{asset('images/single.png')}}"><img class="beds" src="{{asset('images/single.png')}}"></td>
                                        <?php
                                        echo '<input type="hidden" id="precio_D" name="precio_D" value="'.$pre_3_d.'">';
                                        echo'<td class=" hide"  id="aco_2_D" class="" onclick="acomodacion(2)">$ '.$pre_2_d.'</td>';
                                        echo'<td id="aco_3_D" class="precio-verde" onclick="acomodacion(3)">$ '.$pre_3_d.'</td>';
                                        echo'<td id="aco_4_D" onclick="acomodacion(4)">$ '.$pre_4_d.'</td>';
                                        echo'<td class=" hide"  id="aco_5_D" onclick="acomodacion(5)">$ '.$pre_5_d.'</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control ancho_number" type="number" name="nroHabitacionesM" id="nroHabitacionesM" value="0" min="0"  max="1"  onchange="distribucion('M')"></td>
                                        <td><label for="" class="text-center">Matrimonial Beds</label><br><img class="bedsm" src="{{asset('images/matrimonial1.png')}}"></td>
                                        <?php
                                        echo'<input type="hidden" id="precio_Ma" name="precio_Ma" value="'.$pre_3_d.'">';
                                        echo'<td class=" hide"  id="aco_2_M" onclick="acomodacion(2)">$ '.$pre_2_d.'</td>';
                                        echo'<td id="aco_3_M" onclick="acomodacion(3)">$ '.$pre_3_d.'</td>';
                                        echo'<td id="aco_4_M" onclick="acomodacion(4)">$ '.$pre_4_d.'</td>';
                                        echo'<td class=" hide"  id="aco_5_M" onclick="acomodacion(5)">$ '.$pre_5_d.'</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control ancho_number" type="number" name="nroHabitacionesS" id="nroHabitacionesS" value="0"  min="0"  max="2" onchange="distribucion('S')"></td>
                                        <td><label for="" class="text-center">Single Beds</label><br><img class="beds" src="{{asset('images/single.png')}}"></td>
                                        <?php
                                        echo '<input type="hidden" id="precio_S" name="precio_S" value="'.$pre_3_s.'">';
                                        echo'<td class=" hide"  id="aco_2_S" onclick="acomodacion(2)">$ '.$pre_2_s.'</td>';
                                        echo'<td id="aco_3_S" onclick="acomodacion(3)">$ '.$pre_3_s.'</td>';
                                        echo'<td id="aco_4_S" onclick="acomodacion(4)">$ '.$pre_4_s.'</td>';
                                        echo'<td class=" hide"  id="aco_5_S" onclick="acomodacion(5)">$ '.$pre_5_s.'</td>';
                                        ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12 hide">
                                <hr>
                                <div class="row">
                                    <div class="col m12"><p>TRAVELLERS</p></div>
                                </div>
                                <div class="row" id="travellers_1">
                                    <div class="col m1">
                                        <h6>1</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_1" name="txt_name[]" type="text" class="validate">
                                            <label for="name_1">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_1" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_1">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_1" name="country[]" type="text" class="validate">
                                            <label for="country_1">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="travellers_2">
                                    <div class="col m1">
                                        <h6>2</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_2" name="txt_name[]" type="text" class="validate">
                                            <label for="name_2">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_2" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_2">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_2" name="country[]" type="text" class="validate">
                                            <label for="country_2">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hide" id="travellers_3">
                                    <div class="col m1">
                                        <h6>3</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_3" name="txt_name[]" type="text" class="validate">
                                            <label for="name_3">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_3" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_3">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_3" name="country[]" type="text" class="validate">
                                            <label for="country_3">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hide" id="travellers_4">
                                    <div class="col m1">
                                        <h6>4</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_4" name="txt_name[]" type="text" class="validate">
                                            <label for="name_4">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_4" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_4">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_4" name="country[]" type="text" class="validate">
                                            <label for="country_4">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hide" id="travellers_5">
                                    <div class="col m1">
                                        <h6>5</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_5" name="txt_name[]" type="text" class="validate">
                                            <label for="name_5">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_5" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_5">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_5" name="country[]" type="text" class="validate">
                                            <label for="country_5">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hide" id="travellers_6">
                                    <div class="col m1">
                                        <h6>6</h6>
                                    </div>
                                    <div class="col m3">
                                        <h6>NAME</h6>
                                        <div class="input-field">
                                            <input id="name_6" name="txt_name[]" type="text" class="validate">
                                            <label for="name_6">Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>LAST NAME</h6>
                                        <div class="input-field">
                                            <input id="last_name_6" name="last_name[]" type="text" class="validate">
                                            <label for="last_name_6">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col m3">
                                        <h6>COUNTRY</h6>
                                        <div class="input-field">
                                            <input id="country_6" name="country[]" type="text" class="validate">
                                            <label for="country_6">Country</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="col s12 caja-flotante grey lighten-2">
                            <ul>
                                <li id="acomodacion_3" class="hide grey-text text-darken-1"><span>On triple accomodation </span><span id="rooms_T">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_3">{{$pre_3_t}}</span></li>
                                <li id="acomodacion_2" class="grey-text text-darken-1"><span>On double accomodation </span><span id="rooms_D">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_Ma2">{{$pre_3_d}}</span></li>
                                <li id="acomodacion_M" class="hide grey-text text-darken-1"><span>On matinonial accomodation </span><span id="rooms_M">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_2">{{$pre_3_d}}</span></li>
                                <li id="acomodacion_1" class="hide grey-text text-darken-1"><span>On simple accomodation </span><span id="rooms_S">1</span>X<img class="" src="{{asset('images/male.png')}}">X$<span id="precio_1">{{$pre_3_s}}</span></li>
                                <li class="hide"><span id="precioPaquete">{{$precio}}</span></li>

                            </ul>
                        </div>
                        <div class=" col s12 grey darken-4">
                            <div class="text-14 white-text" >Total (USD)
                                <span class="text-30 blue-text text-lighten-1 ">$
                                        <span id="subtotal"> {{2*$precio}}</span>
                                    </span>
                            </div>
                            <div class="text-12 align-rigth white-text">taxes included
                            </div>
                        </div>

                        <div class="col s12  light-green lighten-2">
                            <h6>Optional Activities:</h6>
                            <?php $i=0;?>
                            @foreach($paquetes as $paquete)
                                {{--                                    @if($paquete->disponibilidad->estrellas=3)--}}
                                @foreach($paquete->paquete_servicio_extra as $servicios2)
                                    <?php $i++;?>
                                    @foreach($servicio_extras as $extra)
                                        @if($servicios2->idservicio_extra==$extra->id)
                                            <div class="row">
                                                <div class="col m9">
                                                    <p>
                                                        <input type="hidden" id="ch_extras_id_{{$i}}" value="{{$extra->id}}">
                                                        <input type="hidden" id="ch_extras_name_{{$i}}" name="ch_extras_name[]" value="{{$extra->titulo}}">
                                                        <input type="hidden" id="ch_extras_valor_{{$i}}" name="ch_extras_valor[]" value="0">
                                                        <input type="checkbox" id="ch_extras_{{$i}}" name="ch_extras[]" value="{{$extra->precio}}" onchange="ch_extra({{$i}})"/>
                                                        <label for="ch_extras_{{$i}}" class="grey-text text-darken-4">{{$extra->titulo}}<span id="p_{{$i}}}"> ($<span id="extra_precioS_{{$i}}">{{$extra->precio}}</span> for traveller)</span><br><span class="text-12 grey-text text-darken-3">{{$extra->descripcion}}</span></label>
                                                    </p>
                                                </div>
                                                <div class="col m3">
                                                    $ <span id="extra_precioP_{{$i}}">{{2*$extra->precio}}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                                {{--@endif--}}
                            @endforeach
                            <br>
                        </div>
                        <div class=" col s12 orange lighten-1">
                            <div class="text-14 white-text" >Total (USD)
                                <span class="text-30 ">$
                                        <span id="total"> {{2*$precio}}</span>
                                    </span>
                            </div>
                            <div class="text-12 align-rigth white-text">taxes included
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12 margin-top-40">
                        <div class="row">
                            <div class="col m12"><h4 class="no-margin">PAYMENTS</h4></div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <h5><i class="material-icons orange-text text-darken-2">contacts</i>Billing Information</h5>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="first_name_p" name="first_name_p" type="text" class="validate" placeholder="First name(required)">
                                            <label for="first_name_p" class="grey-text text-darken-3">First name <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="last_name_p" name="last_name_p" type="text" class="validate" placeholder="Last name(required)">
                                            <label for="last_name_p" class="grey-text text-darken-3">Last name <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <div class="input-field">
                                            <input id="passport_p" name="passport_p" type="text" class="validate" placeholder="Passport(required)">
                                            <label for="passport_p" class="grey-text text-darken-3">Passport <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m8 l8">
                                        <div class="input-field">
                                            <input id="email_p" name="email_p" type="email" class="validate" placeholder="mail@example.com(required)">
                                            <label for="email_p" class="grey-text text-darken-3">Email <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m7 l7">
                                        <div class="input-field">
                                            <input id="address_p" name="address_p" type="text" class="validate" placeholder="Your address(required)">
                                            <label for="address_p" class="grey-text text-darken-3">Address <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m5 l5">
                                        <div class="input-field">
                                            <input id="telephone_p" name="telephone_p" type="text" class="validate" placeholder="Telephone(required)">
                                            <label for="telephone_p" class="grey-text text-darken-3">Telephone <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <select name="country_p" id="country_p" onchange="country_p_ch()" class="validate">
                                                @foreach($country1 as $county11)
                                                    @if($county11->name=='United States')
                                                        <option value="{{$county11->id}}" selected>{{$county11->name}}</option>
                                                    @else
                                                        <option value="{{$county11->id}}">{{$county11->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="country_p" class="grey-text text-darken-3">Country <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <div id="state_goto" class="input-field">
                                            <select name="state_p" id="state_p" onchange="state_p_ch()" class="validate">
                                                @foreach($state as $state1)
                                                    @if($state1->id=='3930')
                                                        <option value="{{$state1->id}}" selected>{{$state1->name}}</option>
                                                    @else
                                                        <option value="{{$state1->id}}">{{$state1->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="state_p" class="grey-text text-darken-3">State/Province <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="zip_p" mame="zip_p" type="text" class="validate" placeholder="Zip or Postal code(required)">
                                            <label for="zip_p" class="grey-text text-darken-3">Zip/Postal Code <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <div id="city_goto" class="input-field">
                                            <select name="city_p" id="city_p" class="validate">
                                                @foreach($city as $city1)
                                                    @if($city1->id=='43885')
                                                        <option value="{{$city1->id}}" selected>{{$city1->name}}</option>
                                                    @else
                                                        <option value="{{$city1->id}}">{{$city1->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="city_p" class="grey-text text-darken-3">City <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <h5><i class="material-icons  orange-text text-darken-2">payment</i>Payments Methods</h5>
                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <div class="input-field">
                                            <input id="name_card_p" name="name_card_p" type="text"  class="validate" value="Visa" placeholder="Example: Visa(required)">
                                            <label for="name_card_p" class="grey-text text-darken-3">Name Card <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="input-field">
                                            <select name="credit_card_type_p" id="credit_card_type_p" class="validate">
                                                <option value="Select">Please Select</option>
                                                <option value="Visa">Visa</option>
                                                <option value="Visa (debit)">Visa (debit)</option>
                                                <option value="MasterCard">MasterCard</option>
                                                <option value="MasterCard (debit)">MasterCard (debit)</option>
                                                <option value="American Express">American Express</option>
                                                <option value="Discover">Discover</option>
                                                <option value="Diners Clud">Diners Clud</option>
                                                <option value="JCB">JCB</option>
                                                <option value="Otros">Otros</option>

                                            </select>
                                            <label for="credit_card_type_p" class="grey-text text-darken-3">Credit Card Type <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="input-field">
                                            <input id="credit_card_number_p" name="credit_card_number_p" max="16" maxlength="16" type="text" class="validate" value="" placeholder="Card number(required)">
                                            <label for="credit_card_number_p" class="grey-text text-darken-3">Credit Card Number <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="expiration_date_month_p" name="expiration_date_month_p"  max="2" maxlength="2" type="text" class="validate" value="" placeholder="DD (required)">
                                            <label for="expiration_date_month_p" class="grey-text text-darken-3">Exp. Date Month <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="expiration_date_year_p" name="expiration_date_year_p" min="4" max="4" maxlength="4" type="text" class="validate" value="" placeholder="YYYY (required)">
                                            <label for="expiration_date_year_p" class="grey-text text-darken-3">Exp. Date Year <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <div class="input-field">
                                            <input id="card_verification_p" type="text" class="validate"  value="" placeholder="**** (required)">
                                            <label for="card_verification_p" class="grey-text text-darken-3">Validation code <span class="blue-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l6 hide">
                                        <div class="input-field">
                                            <span>What is this?</span>Fappl
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <input type="hidden" name="ch_extras_total" id="ch_extras_total" value="{{$i1}}">

                                        <input type="hidden" name="titulo_p" id="titulo_p" value="{{$_POST['txt_country']}}">
                                        <input type="hidden" name="nrodias_p" id="nrodias_p" value="{{$paquete1->duracion}}">

                                        <input type="hidden" name="nro_ontriple_p" id="nro_ontriple_p" value="0">
                                        <input type="hidden" name="precio_ontriple_p" id="precio_ontriple_p" value="{{$pre_3_t}}">

                                        <input type="hidden" name="nro_ondouble_p" id="nro_ondouble_p" value="1">
                                        <input type="hidden" name="precio_ondouble_p" id="precio_ondouble_p" value="{{$pre_3_d}}">

                                        <input type="hidden" name="nro_onmatrimonial_p" id="nro_onmatrimonial_p" value="0">
                                        <input type="hidden" name="precio_onmatrimonial_p" id="precio_onmatrimonial_p" value="{{$pre_3_d}}">

                                        <input type="hidden" name="nro_onsimple_p" id="nro_onsimple_p" value="0">
                                        <input type="hidden" name="precio_onsimple_p" id="precio_onsimple_p" value="{{$pre_3_s}}">
                                        <?php $j=0;?>
                                        @foreach($paquetes as $paquete)
                                            @foreach($paquete->paquete_servicio_extra as $servicios2)
                                                     <?php $j++;?>
                                                @foreach($servicio_extras as $servicios)
                                                    @if($servicios2->idservicio_extra==$servicios->id)
                                                        <input type="hidden" name="name_optional_activities[]" id="optional_activities_{{$j}}" value="{{$servicios->titulo}}">
                                                        <input type="hidden" name="precio_optional_activities[]" id="precio_optional_activities_{{$j}}" value="{{$servicios->precio}}">
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach

                                        <input type="hidden" name="date_travel_p" id="date_travel_p" value="{{$datedispo}}">
                                        <input type="hidden" name="travellers_p" id="travellers_p" value="2">
                                        <input type="hidden" name="total_p" id="total_p" value="{{2*$precio}}">

                                        <button class="btn-checkout btn-large waves-effect waves-light lime darken-4" type="submit" name="action">Place Order
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class=" col m6">
                                <h5><i class="material-icons  orange-text text-darken-2">filter_drama</i>Order Review</h5>
                                <div class="row">
                                    <div class="col m12">
                                        <table class="striped">
                                            <thead>
                                            <tr>
                                                <th data-field="id">Product Name</th>
                                                <th data-field="price">SubTotal</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{$paquete1->duracion}} DAYS FROM {{$_POST['txt_country']}}</td>
                                                <td>$<span id="st_precio0">{{2*$precio}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>SubTotal</td>
                                                <td>$<span id="st_precio1">{{2*$precio}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Grand Total</b></td>
                                                <td><b>$<span id="st_precio2">{{2*$precio}}</span></b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field">
                                            <input id="coupon_code_p" type="text" class="validate">
                                            <label for="coupon_code_p">Coupon code</label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field">
                                            <button class="waves-effect  waves-light btn">Apply Coupon</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m12">
                                        <div class="input-field col s12">
                                            <textarea id="comments_p" class="materialize-textarea"></textarea>
                                            <label for="comments_p">Textarea</label>
                                            Product Name               </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m12">
                                        <div class="input-field">
                                            <input id="terminos_p" name="terminos_p" type="checkbox" class="validate">
                                            <label for="terminos_p">I accept the <a href="">Terms and conditions*</a></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
    <script src="https://use.fontawesome.com/1d452fa330.js"></script>
    <script type="text/javascript" src="{{URL::to('js/funciones-checkout.js')}}"></script>
@endsection
