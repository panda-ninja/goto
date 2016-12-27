@extends('layouts.default')

@section('content')

    {{$_POST['txt_country']}}
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s3 m3">
                </div>
                <div class="col s2 m2">
                    <h5 class="no-margin font-moserrat row">7 DAYS</h5>
                </div>
                <div class="col s2 m2">
                    <h5 class="no-margin font-moserrat row">FROM MIAMI</h5>
                </div>
                <div class="col s2 m2">
                    <h5 class="no-margin font-moserrat row">from $1999</h5>
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
                    <select name="travelers" id="travelers">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="col s3 m3">

                </div>
                <div class="col s3 m3">

                </div>
            </div>
            <div class="row">
                <div class="col s12 m8">
                    <div class="col-lg-8 col-lg-offset-2 table-responsive">
                        <?php
//                        if(!class_exists('chabitacion'))
//                        {
//                            include("clases/chabitacion.php");
//                        }
                        $TipoPaquete='SinHotel';
                        ?>
                        <table class="table borde-tabla-habitacion text-center <?php if($TipoPaquete=='SinHotel') echo 'hide';?>">
                            <tr>
                                <td class="col-lg-1"><label for="" class="text-center">Rooms</label></td>
                                <td class="col-lg-3"><label for="" class="text-center">Price per person<br><label class="text-12 color-plomo">Based on hotel category</label></label></td>

                                <td class="col-lg-1" onclick="acomodacion(2)">
                                    <label for="acomodacion2" class="rojo text-center text-12">
                                        <!--<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>-->2 STARS
                                    </label><br>
                                    <input type="hidden" id="nro_estrellas" name="nro_estrellas" value="2">
                                    <input type="radio" name="acomodacion[]" id="acomodacion2" value="2" checked="checked">
                                </td>
                                <td class="col-lg-1"  onclick="acomodacion(3)">
                                    <label for="acomodacion3" class="rojo text-center text-12">
                                        <!--<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>-->3 STARS
                                    </label><br>
                                    <input type="radio" name="acomodacion[]" id="acomodacion3" value="3">
                                </td>
                                <td class="col-lg-1" onclick="acomodacion(4)">
                                    <label for="acomodacion4" class="rojo text-center text-12">
                                        <!--<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>-->4 STARS
                                    </label><br>
                                    <input class="radio-verde" type="radio" name="acomodacion[]" id="acomodacion4" value="4">
                                </td>
                                <td class="col-lg-1" onclick="acomodacion(5)">
                                    <label for="acomodacion5" class="rojo text-center text-12">
                                        <!--<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>-->5 STARS
                                    </label><br>
                                    <input type="radio" name="acomodacion[]" id="acomodacion5" value="5">
                                </td>
                            </tr>

                            <tr>
                                <?php
                                if($TipoPaquete=='SinHotel'){

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
                                }
                                else{
                                    $oPrecioPaquete=new cpreciopaquete('',2,'','','',$idpaquete);
                                    $rsPrecioPaquete=$oPrecioPaquete->Listar_precio_x_acomodacion();
                                    $fila=$rsPrecioPaquete->fetch_object();
                                    $pre_2_s=$fila->precio_s;
                                    $pre_2_d=$fila->precio_d;
                                    $pre_2_t=$fila->precio_t;

                                    $oPrecioPaquete_3=new cpreciopaquete('',3,'','','',$idpaquete);
                                    $rsPrecioPaquete_3=$oPrecioPaquete_3->Listar_precio_x_acomodacion();
                                    $fila_3=$rsPrecioPaquete_3->fetch_object();
                                    $pre_3_s=$fila_3->precio_s;
                                    $pre_3_d=$fila_3->precio_d;
                                    $pre_3_t=$fila_3->precio_t;

                                    $oPrecioPaquete_4=new cpreciopaquete('',4,'','','',$idpaquete);
                                    $rsPrecioPaquete_4=$oPrecioPaquete_4->Listar_precio_x_acomodacion();
                                    $fila_4=$rsPrecioPaquete_4->fetch_object();
                                    $pre_4_s=$fila_4->precio_s;
                                    $pre_4_d=$fila_4->precio_d;
                                    $pre_4_t=$fila_4->precio_t;

                                    $oPrecioPaquete_5=new cpreciopaquete('',5,'','','',$idpaquete);
                                    $rsPrecioPaquete_5=$oPrecioPaquete_5->Listar_precio_x_acomodacion();
                                    $fila_5=$rsPrecioPaquete_5->fetch_object();
                                    $pre_5_s=$fila_5->precio_s;
                                    $pre_5_d=$fila_5->precio_d;
                                    $pre_5_t=$fila_5->precio_t;
                                }
                                ?>
                                <td><input class="form-control ancho_number" type="number" name="nroHabitacionesT" id="nroHabitacionesT" value="0" min="0" max="0" onchange="distribucion('T')"></td>
                                <td><label for="" class="text-center">Triple Beds</label><br><img class="beds" src="../../../../ico/single.png"><img class="beds" src="../../../../ico/single.png"><img class="beds" src="../../../../ico/single.png"></td>
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
                                <td><label for="" class="text-center">Double Beds</label><br><img class="beds" src="../../../../ico/single.png"><img class="beds" src="../../../../ico/single.png"></td>
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
                                <td><label for="" class="text-center">Matrimonial Beds</label><br><img class="bedsm" src="../../../../ico/matrimonial1.png"></td>
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
                                <td><label for="" class="text-center">Single Beds</label><br><img class="beds" src="../../../../ico/single.png"></td>
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
                <div class="col s12 m4">

                </div>
            </div>
        </div>
    </div>

@stop