@extends('layouts.default')

@section('content')

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
    ?>
    @foreach($paquetes as $paquete)
        <?php
        $paquete1=$paquete;
        ?>
    @endforeach
    <div class="row">
        <div class="col s3 m3">
        </div>
        <div class="col s2 m2 grey-text text-darken-2">
            <h5 class="no-margin font-moserrat row">{{$paquete1->duracion}} DAYS</h5>
        </div>
        <div class="col s2 m2 orange-text text-darken-2">
            <h5 class="no-margin font-moserrat row">FROM {{$_POST['txt_country']}}</h5>
        </div>
        <div class="col s2 m2 teal-text text-darken-2">
            <h5 class="no-margin font-moserrat row">from ${{$precio}}</h5>
        </div>
        <div class="col s3 m3">
        </div>
    </div>
    <div class="row">
        <div class="col s3 m3">

        </div>
        <div class="col s2 m2">
            <div><h5>Travelers:</h5></div>
        </div>
        <div class="input-field col s1 m1">
            <select name="travelers" id="travelers" onchange="ch_travelers()">
                <option value="1">1</option>
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <div id="nro_travelers" class="col s2 m2">
            <i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>
        </div>
        <div class="col s3 m2">
            <select name="date_travel" id="date_travel">
                @foreach($paquetes as $paquete)
                    @foreach($paquete->disponibilidad as $disponibilidad)
                        @if($disponibilidad->estado=='1')
                            <option value="1">{{$disponibilidad->fecha_disponibilidad}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
    <div class="col s6 m9 align-rigth">
        <div class="row">
            <div class="col m7 offset-m3 table-responsive">

                 <?php
                 $TipoPaquete='ConHotel';
                 ?>
                 <input type="hidden" name="TipoPaquete" idname="TipoPaquete" value="<php echo $TipoPaquete;?>">
                 <table class="table borde-tabla-habitacion text-center <?php if($TipoPaquete=='SinHotel') echo 'hide';?>">
                     <tr>
                         <td class="col-lg-1"><label for="" class="text-center">Rooms</label></td>
                         <td class="col-lg-3"><label for="" class="text-center">Price per person<br><label class="text-12 color-plomo">Based on hotel category</label></label></td>

                         <td class="col-lg-1" onclick="acomodacion(2)">
                             <p>
                                 <input type="hidden" id="nro_estrellas" name="nro_estrellas" value="2">
                                 <input name="acomodacion[]" type="radio" id="acomodacion2" />
                                 <label for="acomodacion2" class="red-text text-9">2 STARS</label>
                             </p>

                         </td>
                         <td class="col-lg-1"  onclick="acomodacion(3)">
                             <p>
                                 <input name="acomodacion[]" type="radio" id="acomodacion3" />
                                 <label for="acomodacion3" class="red-text">3 STARS</label>
                             </p>
                         </td>
                         <td class="col-lg-1" onclick="acomodacion(4)">
                             <p>
                                 <input name="acomodacion[]" type="radio" id="acomodacion4" />
                                 <label for="acomodacion4" class="red-text">4 STARS</label>
                             </p>
                         </td>
                         <td class="col-lg-1" onclick="acomodacion(5)">
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
                                 @foreach($paquete->precio_paquetes as $precio_paquetes)
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
                         echo '<input type="hidden" id="precio_T" name="precio_T" value="'.$pre_2_t.'">';
                         echo'<td id="aco_2_T" onclick="acomodacion(2)">$ '.$pre_2_t.'</td>';
                         echo'<td id="aco_3_T" onclick="acomodacion(3)">$ '.$pre_3_t.'</td>';
                         echo'<td id="aco_4_T" onclick="acomodacion(4)">$ '.$pre_4_t.'</td>';
                         echo'<td id="aco_5_T" onclick="acomodacion(5)">$ '.$pre_5_t.'</td>';
                         ?>
                     </tr>
                     <tr>
                         <td><input class="form-control ancho_number" type="number" name="nroHabitacionesD" id="nroHabitacionesD" value="1" min="0"  max="1"  onchange="distribucion('D')"></td>
                         <td><label for="" class="text-center">Double Beds</label><br><img class="beds" src="{{asset('images/single.png')}}"><img class="beds" src="{{asset('images/single.png')}}"></td>
                         <?php
                         echo '<input type="hidden" id="precio_D" name="precio_D" value="'.$pre_2_d.'">';
                         echo'<td id="aco_2_D" class="precio-verde" onclick="acomodacion(2)">$ '.$pre_2_d.'</td>';
                         echo'<td id="aco_3_D" onclick="acomodacion(3)">$ '.$pre_3_d.'</td>';
                         echo'<td id="aco_4_D" onclick="acomodacion(4)">$ '.$pre_4_d.'</td>';
                         echo'<td id="aco_5_D" onclick="acomodacion(5)">$ '.$pre_5_d.'</td>';
                         ?>
                     </tr>
                     <tr>
                         <td><input class="form-control ancho_number" type="number" name="nroHabitacionesM" id="nroHabitacionesM" value="0" min="0"  max="1"  onchange="distribucion('M')"></td>
                         <td><label for="" class="text-center">Matrimonial Beds</label><br><img class="bedsm" src="{{asset('images/matrimonial1.png')}}"></td>
                         <?php
                         echo'<input type="hidden" id="precio_Ma" name="precio_Ma" value="'.$pre_2_d.'">';
                         echo'<td id="aco_2_M" onclick="acomodacion(2)">$ '.$pre_2_d.'</td>';
                         echo'<td id="aco_3_M" onclick="acomodacion(3)">$ '.$pre_3_d.'</td>';
                         echo'<td id="aco_4_M" onclick="acomodacion(4)">$ '.$pre_4_d.'</td>';
                         echo'<td id="aco_5_M" onclick="acomodacion(5)">$ '.$pre_5_d.'</td>';
                         ?>
                     </tr>
                     <tr>
                         <td><input class="form-control ancho_number" type="number" name="nroHabitacionesS" id="nroHabitacionesS" value="0"  min="0"  max="2" onchange="distribucion('S')"></td>
                         <td><label for="" class="text-center">Single Beds</label><br><img class="beds" src="{{asset('images/single.png')}}"></td>
                         <?php
                         echo '<input type="hidden" id="precio_S" name="precio_S" value="'.$pre_2_s.'">';
                         echo'<td id="aco_2_S" onclick="acomodacion(2)">$ '.$pre_2_s.'</td>';
                         echo'<td id="aco_3_S" onclick="acomodacion(3)">$ '.$pre_3_s.'</td>';
                         echo'<td id="aco_4_S" onclick="acomodacion(4)">$ '.$pre_4_s.'</td>';
                         echo'<td id="aco_5_S" onclick="acomodacion(5)">$ '.$pre_5_s.'</td>';
                         ?>
                     </tr>

                 </table>
            </div>
        </div>
    </div>
    <div class="col s6 m3">
            <div class="row">
                <div class="col s12 caja-flotante grey lighten-2">
                    <ul>
                        <li id="acomodacion_3" class="hide grey-text text-darken-1"><span>On triple accomodation </span><span id="rooms_T">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_3">{{$pre_2_t}}</span></li>
                        <li id="acomodacion_2" class="grey-text text-darken-1"><span>On double accomodation </span><span id="rooms_D">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_Ma2">{{$pre_2_d}}</span></li>
                        <li id="acomodacion_M" class="hide grey-text text-darken-1"><span>On matinonial accomodation </span><span id="rooms_M">1</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_2">{{$pre_2_d}}</span></li>
                        <li id="acomodacion_1" class="hide grey-text text-darken-1"><span>On simple accomodation </span><span id="rooms_S">1</span>X<img class="" src="{{asset('images/male.png')}}">X$<span id="precio_1">{{$pre_2_s}}</span></li>
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
            </div>
            <div class="row">
                <div class="col s12">
                    <h6>Optional Activities:</h6>
                    <?php $i=0;?>
                    @foreach($paquetes as $paquete)
                        @foreach($paquete->paquete_servicio_extra as $servicios)
                            <?php $i++;?>
                            <p>
                                <input type="hidden" id="ch_extras_id_{{$i}}" value="{{$servicios->servicio_extra->id}}">
                                <input type="hidden" id="ch_extras_name_{{$i}}" value="{{$servicios->servicio_extra->titulo}}">
                                <input type="checkbox" id="ch_extras_{{$i}}" name="ch_extras[]" value="{{$servicios->servicio_extra->precio}}" onchange="ch_extra()"/>
                                <label for="ch_extras_{{$i}}" >{{$servicios->servicio_extra->titulo}}<span id="p_{{$i}}}"> ${{2*$servicios->servicio_extra->precio}}(${{$servicios->servicio_extra->precio}} for traveller)</span></label>
                            </p>
                        @endforeach
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
    </div>
    <div class="row">
        <div class="col m8 offset-m2">
            <hr>
            <div class="row">
                <div class="col m12"><p>TRAVELLERS</p></div>
            </div>
            <div class="row">
                <div class="col m12">

                </div>
            </div>
            <div class="row">
                <div class="col m1">
                    <h6>1</h6>
                </div>
                <div class="col m3">
                    <h6>NAME</h6>
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Name</label>
                    </div>
                </div>
                <div class="col m3">
                    <h6>LAST NAME</h6>
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="col m3">
                    <h6>COUNTRY</h6>
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Country</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m1">
                    <h6>2</h6>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Name</label>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Country</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m8 offset-m2">
            <hr>
            <div class="row">
                <div class="col m12"><p>PAYMENTS</p></div>
            </div>
            <div class="row">
                <div class="col m4">
                    <h5><i class="material-icons orange-text text-darken-2">filter_drama</i>Billing Information</h5>
                    <div class="row">
                        <div class="col m6">
                            <div class="input-field">
                                <input id="first_name_p" type="text" class="validate">
                                <label for="first_name_p">First name*</label>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="input-field">
                                <input id="last_name_p" type="text" class="validate">
                                <label for="last_name_p">Last name*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6">
                            <div class="input-field">
                                <input id="company_p" type="text" class="validate">
                                <label for="company_p">Company*</label>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="input-field">
                                <input id="email_p" type="text" class="validate">
                                <label for="email_p">Email*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div class="input-field">
                                <input id="address_p" type="text" class="validate">
                                <label for="address_p">Address*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div class="input-field">
                                <input id="telephone_p" type="text" class="validate">
                                <label for="telephone_p">Telephone*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6">
                            <div class="input-field">
                                <input id="city_p" type="text" class="validate">
                                <label for="city_p">City*</label>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="input-field">
                                <select name="state_p" id="state_p" class="validate">
                                    <option value="Select">Select</option>
                                </select>
                                <label for="state_p">State/Province*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6">
                            <div class="input-field">
                                <input id="city_p" type="text" class="validate">
                                <label for="city_p">Zip/Postal Code*</label>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="input-field">
                                <select name="country_p" id="country_p" class="validate">
                                    <option value="Select">Select</option>
                                </select>
                                <label for="country_p">Country*</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m4">
                    <h5><i class="material-icons  orange-text text-darken-2">filter_drama</i>Payments Methods</h5>
                    <div class="row">

                        <div class="col m12">
                            <div class="input-field">
                                <input id="name_card_p" name="name_card_p" type="text" class="validate">
                                <label for="name_card_p">Name Card*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div class="input-field">
                                <select name="credit_card_type_p" id="credit_card_type_p" class="validate">
                                    <option value="Select">Please Select</option>
                                </select>
                                <label for="credit_card_type_p">Credit Card Type*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div class="input-field">
                                <input id="credit_card_number_p" name="credit_card_number_p" type="text" class="validate">
                                <label for="credit_card_number_p">Credit Card Number*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6">
                            <div class="input-field">
                                <select name="expiration_date_month_p" id="expiration_date_month_p" class="validate">
                                    <option value="Select">Month</option>
                                </select>
                                <label for="expiration_date_month_p">Expiration Date*</label>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="input-field">
                                <select name="expiration_date_year_p" id="expiration_date_year_p" class="validate">
                                    <option value="Select">Year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m9">
                            <div class="input-field">
                                <input id="card_verification_p" type="text" class="validate">
                                <label for="card_verification_p">Card Verification Number*</label>
                            </div>
                        </div>
                        <div class="col m3">
                            <div class="input-field">
                                <span>What is this?</span>Fappl
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m4">
                    <h5><i class="material-icons  orange-text text-darken-2">filter_drama</i>Order Review</h5>
                    <div class="row">
                        <div class="col m12">

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
                            <div class="input-field">
                                <textarea name="comments_p" id="comments_p" cols="30" rows="10"></textarea>
                                <label for="comments_p">Comments</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m9">
                            <div class="input-field">
                                <input id="terminos_p" name="terminos_p" type="checkbox" class="validate">
                                <label for="terminos_p">I accept the <a href="">Terms and conditions*</a></label>
                            </div>
                        </div>
                        <div class="col m3">
                            <input type="hidden" name="ch_extras_total" id="ch_extras_total" value="{{$i}}">
                            <button  class="waves-effect  waves-light btn">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<script src="https://use.fontawesome.com/1d452fa330.js"></script>
<script type="text/javascript" src="{{URL::to('js/funciones-checkout.js')}}"></script>