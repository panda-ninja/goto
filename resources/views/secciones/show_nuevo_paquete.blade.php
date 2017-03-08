
<link href="{{asset('css/admin-theme.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="{{URL::to('js/funciones_cotizacion.js')}}"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>--}}

<script type="text/javascript" src="{{URL::to('js/funciones_froala.js')}}"></script>


{{--<script>tinymce.init({ selector:'textarea-plan-itinerario' });</script>--}}
{{--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>--}}
<?php
$Paquete='';
?>
@foreach($paquete as $paquete)
    <?php $Paquete=$paquete;?>
@endforeach


<div class="card-panel">
    <div class="row">
        <div class="col m6 l6">
            <div class="input-field col m3">
                <input placeholder="GTP XXXX" id="codigo_plan" name="codigo_plan" type="text" class="validate">
                <label for="codigo_plan">Codigo</label>
            </div>
            <div class="input-field col m9">
                <input placeholder="Titulo para el plan " id="titulo_plan" name="titulo_plan" type="text" class="validate">
                <label for="titulo_plan">Titulo</label>
            </div>
         </div>
        <div class="col m6 16">
            <div class="row ">
                <div class="input-field col m3">
                    <input id="dias_plan" name="dias_plan" type="number" class="validate">
                    <label for="dias_plan">Dias</label>
                </div>
                <div class="col m9">
                    <div class="row right">
                        <div class="col m12">
                            <b class="grey-text text-darken-3">Total </b>
                            <h5 class="blue-text text-accent-3" id="totalM">$ <b class="blue-text text-accent-3" id="total">000.00</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        {{--<form class="col s12 m12 " action="" method="post">--}}
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <div class="row">
                        <div class="file-field input-field col m12">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="input-field col m12">
                            <b>Descripcion</b>
                            <textarea name="text_descripcion" id="text_descripcion"></textarea>
                            <script>
                                $(function(){
                                    $('#text_descripcion')
                                            .on('froalaEditor.initialized', function (e, editor) {
                                                $('#text_descripcion').parents('form').on('submit', function () {
//                                        console.log($('#text_descripcion').val());
//                                        return false;
                                                })
                                            })
                                            .froalaEditor({iframe:false,enter: $.FroalaEditor.ENTER_P, placeholderText: null})
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="input-field col s12 m6 l6">
                    <table class="table table1 borde-tabla-habitacion centrar">
                        <tr>
                            <td width="50px"><b class="text-small">Rooms</b></td>
                            <td width="130px"><b class="text-small">Price per person</b><br><span class="letra-peque">Based on hotel category</span></td>
                            <td id="aco2" width="50px" onclick="foco_acomodacion(2)" class="color_oro"><b id="titu_aco2" class="letra-roja centrar text-small">2 STARS</b></td>
                            <td id="aco3" width="50px" onclick="foco_acomodacion(3)"><b id="titu_aco3" class="letra-roja centrar text-small">3 STARS</b></td>
                            <td id="aco4" width="50px" onclick="foco_acomodacion(4)"><b id="titu_aco4" class="letra-roja centrar text-small">4 STARS</b></td>
                            <td id="aco5" width="50px" onclick="foco_acomodacion(5)"><b id="titu_aco5" class="letra-roja centrar text-small">5 STARS</b></td>
                        </tr>

                        {{--@foreach($Paquete->precio_paquetes as $precio)--}}
                        {{--@if($precio->estrellas=="2")--}}
                        <?php $precio_2_s=0;?>
                        <?php $precio_2_d=0;?>
                        <?php $precio_2_t=0;?>
                        {{--@endif--}}
                        {{--@if($precio->estrellas=="3")--}}
                        <?php $precio_3_s=0;?>
                        <?php $precio_3_d=0;?>
                        <?php $precio_3_t=0;?>
                        {{--@endif--}}
                        {{--@if($precio->estrellas=="4")--}}
                        <?php $precio_4_s=0;?>
                        <?php $precio_4_d=0;?>
                        <?php $precio_4_t=0;?>
                        {{--@endif--}}
                        {{--@if($precio->estrellas=="5")--}}
                        <?php $precio_5_s=0;?>
                        <?php $precio_5_d=0;?>
                        <?php $precio_5_t=0;?>
                        {{--@endif--}}
                        {{--@endforeach--}}
                        <tr>
                            <td><input type="number" name="room_t" id="room_t" value="0" min="0" onchange="coti_romms('t')"></td>
                            <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                            <td id="aco12" class="color_oro"><input type="number" name="precio_2_t" id="precio_2_t" min="0" value="{{$precio_2_t}}"  onchange="coti_precio_acom('2','t')"></td>
                            <td id="aco13"><input type="number" name="precio_3_t" id="precio_3_t" min="0" value="{{$precio_3_t}}" onchange="coti_precio_acom('3','t')"></td>
                            <td id="aco14"><input type="number" name="precio_4_t" id="precio_4_t" min="0" value="{{$precio_4_t}}" onchange="coti_precio_acom('4','t')"></td>
                            <td id="aco15"><input type="number" name="precio_5_t" id="precio_5_t" min="0" value="{{$precio_5_t}}" onchange="coti_precio_acom('5','t')"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="room_d" id="room_d" value="0"  min="0" onchange="coti_romms('d')"></td>
                            <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                            <td id="aco22" class="color_oro"><input type="number" name="precio_2_d" id="precio_2_d" min="0" value="{{$precio_2_d}}"  onchange="coti_precio_acom('2','d')"></td>
                            <td id="aco23"><input type="number" name="precio_3_d" id="precio_3_d" min="0" value="{{$precio_3_d}}" onchange="coti_precio_acom('3','d')"></td>
                            <td id="aco24"><input type="number" name="precio_4_d" id="precio_4_d" min="0" value="{{$precio_4_d}}" onchange="coti_precio_acom('4','d')"></td>
                            <td id="aco25"><input type="number" name="precio_5_d" id="precio_5_d" min="0" value="{{$precio_5_d}}" onchange="coti_precio_acom('5','d')"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="room_m" id="room_m" value="0"  min="0" onchange="coti_romms('m')"></td>
                            <td class="centrar"><img src="{{asset('images')}}/matrimonial.png" alt="" width="50px" height="30px"></td>
                            <td id="aco32" class="color_oro"><input type="number" name="precio_2_d_m" id="precio_2_d_m" min="0" value="{{$precio_2_d}}" onchange="coti_precio_acom('2','m')"></td>
                            <td id="aco33"><input type="number" name="precio_3_d_m" id="precio_3_d_m" min="0" value="{{$precio_3_d}}" onchange="coti_precio_acom('3','m')"></td>
                            <td id="aco34"><input type="number" name="precio_4_d_m" id="precio_4_d_m" min="0" value="{{$precio_4_d}}" onchange="coti_precio_acom('4','m')"></td>
                            <td id="aco35"><input type="number" name="precio_5_d_m" id="precio_5_d_m" min="0" value="{{$precio_5_d}}" onchange="coti_precio_acom('5','m')"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="room_s" id="room_s" value="0"  min="0" onchange="coti_romms('s')"></td>
                            <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                            <td id="aco42" class="color_oro"><input type="number" name="precio_2_s" id="precio_2_s" min="0" value="{{$precio_2_s}}" onchange="coti_precio_acom('2','s')"></td>
                            <td id="aco43"><input type="number" name="precio_3_s" id="precio_3_s" min="0" value="{{$precio_3_s}}" onchange="coti_precio_acom('3','s')"></td>
                            <td id="aco44"><input type="number" name="precio_4_s" id="precio_4_s" min="0" value="{{$precio_4_s}}" onchange="coti_precio_acom('4','s')"></td>
                            <td id="aco45"><input type="number" name="precio_5_s" id="precio_5_s" min="0" value="{{$precio_5_s}}" onchange="coti_precio_acom('5','s')"></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l6">
                    <ul id="task-card" class="collection with-header">
                        <li class="collection-header cyan">
                            <h4 class="task-card-title">Destinos:</h4>
                        </li>
                        <?php $i=0;?>
                        @foreach($destino as $destino1)
                            <?php $esta=0;?>
                            @foreach($Paquete->paquetes_destinos as $destino)
                                <?php $i++;?>
                                @if($destino1->id==$destino->iddestinos)
                                    <?php $esta=1;?>
                                    <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        <input type="checkbox" id="task{{$i}}" name="chb_destinos[]" checked="checked">
                                        <label for="task{{$i}}" style="text-decoration: none;">{{$destino1->nombre}}
                                        </label>
                                    </li>
                                @endif
                            @endforeach
                            @if($esta==0)
                                <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    <input type="checkbox" id="task{{$i}}" name="chb_destinos[]">
                                    <label for="task{{$i}}" style="text-decoration: none;">{{$destino1->nombre}}
                                    </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div  class="input-field col s12 m8 l6">
                    {{--<div class="row">--}}
                    {{--<div class="column">--}}
                    {{--<div class="portlet">--}}
                    {{--<div class="portlet-header"><span class="cursor-move">Feeds</span></div>--}}
                    {{--<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elitp <p>jfdghdfshgdf</p><p>jfdghdfshgdf</p><p>jfdghdfshgdf</p> </div>--}}
                    {{--</div>--}}
                    {{----}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <ul  id="task-card" class=" collection with-header collapsible "  data-collapsible="accordion">
                        <li class="collection-header cyan" data-id="40">
                            <div class="row">
                                <h4 class="task-card-title">Itinerario:</h4>
                                {{--<div class="row">--}}
                                {{--<div class="col s12 right">--}}
                                {{--<div style="position: relative;">--}}
                                {{--<div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block;right:5px;buttom:1px;top:-45px;">--}}
                                {{--<a class="btn-floating btn-large cyan  lighten-3">--}}
                                {{--<i class="mdi-navigation-menu"></i>--}}
                                {{--</a>--}}
                                {{--<ul>--}}
                                {{--<li><a class="btn-floating red" id="borrar_itinerario"><i class="large mdi-content-clear"></i></a>--}}
                                {{--</li>--}}
                                {{--<li><a class="btn-floating blue" id="guardar_itinerario"><i class="large mdi-content-save"></i></a>--}}
                                {{--</li>--}}
                                {{--<li><a class="btn-floating green" id="agregar_dia"><i class="large mdi-content-add"></i></a>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                            </div>
                        </li>

                        <li>
                            <div class="column lista_itinerario"  onmouseup="poner_valor()">
                                <?php $j=0;?>

                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <hr>
                                <div class="input-field col s4">
                                    <input placeholder="Escriba el itinerario" id="buscar" type="text" class="validate"  onkeyup="Buscar_iti()">
                                    <label for="buscar">Buscar Itinerario</label>
                                </div>
                                <div class="input-field col s2">
                                    <a id="agregar_dia" class="waves-effect waves-light  btn green"><i class="mdi-content-add-circle"></i></a>
                                </div>
                                <div class="input-field col s6 hide">
                                    ó
                                    <a class="waves-effect waves-light  btn"><i class="mdi-action-assignment left"></i>Ver todo</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div id="jalar_iti" class="row">

                            </div>
                        </li>
                    </ul>
                    <div id="modal331" class="modal bottom-sheet">
                        <div class="modal-content">
                            <h4>Modal Header</h4>
                            <p>A bunch of text</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                        </div>
                    </div>
                    <input type="hidden" name="nroItis" id="nroItis" value="{{$j}}">
                </div>
            </div>
        {{--</form>--}}
    </div>
</div>