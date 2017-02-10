
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
            <div class="input-field col m9">
                <input placeholder="Titulo para el plan " id="titulo_plan" name="titulo_plan" type="text" class="validate">
                <label for="titulo_plan">Titulo</label>
            </div>
            <div class="input-field col m3">
                <input id="dias_plan" name="dias_plan" type="number" class="validate">
                <label for="dias_plan">Dias</label>
            </div>

             </div>
        <div class="col m6 16">
            <div class="row right">
                <div class="col m12">
                    <b class="grey-text text-darken-3">Total </b>
                    <h5 class="blue-text text-accent-3" id="total">$ <b class="blue-text text-accent-3" id="total">000.00</b></h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <form action="" method="post" >
            <div class="input-field col s12 m6 l6">
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
            <div class="input-field col s12 m6 l6">
                <table class="table table1 borde-tabla-habitacion centrar">
                    <tr>
                        <td width="50px"><b class="text-small">Rooms</b></td>
                        <td width="130px"><b class="text-small">Price per person</b><br><span class="letra-peque">Based on hotel category</span></td>
                        <td width="50px"><b class="letra-roja centrar text-small">2 STARS</b></td>
                        <td width="50px"><b class="letra-roja centrar text-small">3 STARS</b></td>
                        <td width="50px"><b class="letra-roja centrar text-small">4 STARS</b></td>
                        <td width="50px"><b class="letra-roja centrar text-small">5 STARS</b></td>
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
                        <td><input type="number" name="room_t" value="0" onchange="coti_romms('T')"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_t" id="precio_2_t" value="{{$precio_2_t}}"  onchange="coti_precio_acom('2','t')"></td>
                        <td><input type="number" name="precio_3_t" id="precio_3_t" value="{{$precio_3_t}}" onchange="coti_precio_acom('3','t')"></td>
                        <td><input type="number" name="precio_4_t" id="precio_4_t" value="{{$precio_4_t}}" onchange="coti_precio_acom('4','t')"></td>
                        <td><input type="number" name="precio_5_t" id="precio_5_t" value="{{$precio_5_t}}" onchange="coti_precio_acom('5','t')"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_d" value="0"  onchange="coti_romms('D')"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_d" id="precio_2_d" value="{{$precio_2_d}}"  onchange="coti_precio_acom('2','d')"></td>
                        <td><input type="number" name="precio_3_d" id="precio_3_d" value="{{$precio_3_d}}" onchange="coti_precio_acom('3','d')"></td>
                        <td><input type="number" name="precio_4_d" id="precio_4_d" value="{{$precio_4_d}}" onchange="coti_precio_acom('4','d')"></td>
                        <td><input type="number" name="precio_5_d" id="precio_5_d" value="{{$precio_5_d}}" onchange="coti_precio_acom('5','d')"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_m" value="0"  onchange="coti_romms('M')"></td>
                        <td class="centrar"><img src="{{asset('images')}}/matrimonial.png" alt="" width="50px" height="30px"></td>
                        <td><input type="number" name="precio_2_d_m" id="precio_2_d_m" value="{{$precio_2_d}}" onchange="coti_precio_acom('2','m')"></td>
                        <td><input type="number" name="precio_3_d_m" id="precio_3_d_m" value="{{$precio_3_d}}" onchange="coti_precio_acom('3','m')"></td>
                        <td><input type="number" name="precio_4_d_m" id="precio_4_d_m" value="{{$precio_4_d}}" onchange="coti_precio_acom('4','m')"></td>
                        <td><input type="number" name="precio_5_d_m" id="precio_5_d_m" value="{{$precio_5_d}}" onchange="coti_precio_acom('5','m')"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_s" value="0"  onchange="coti_romms('S')"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_s" id="precio_2_s" value="{{$precio_2_s}}" onchange="coti_precio_acom('2','s')"></td>
                        <td><input type="number" name="precio_3_s" id="precio_3_s" value="{{$precio_3_s}}" onchange="coti_precio_acom('3','s')"></td>
                        <td><input type="number" name="precio_4_s" id="precio_4_s" value="{{$precio_4_s}}" onchange="coti_precio_acom('4','s')"></td>
                        <td><input type="number" name="precio_5_s" id="precio_5_s" value="{{$precio_5_s}}" onchange="coti_precio_acom('5','s')"></td>
                    </tr>
                </table>
                <br>
                <br>
            </div>
            <div class="input-field col s12 m6 l6">
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
            <div  class="input-field col s12 m6 l6">
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
                            <div class="row">
                                <div class="col s12 right">
                                    <div style="position: relative;">
                                        <div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block;right:5px;buttom:1px;top:-45px;">
                                            <a class="btn-floating btn-large cyan  lighten-3">
                                                <i class="mdi-navigation-menu"></i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" id="borrar_itinerario"><i class="large mdi-content-clear"></i></a>
                                                </li>
                                                <li><a class="btn-floating blue" id="guardar_itinerario"><i class="large mdi-content-save"></i></a>
                                                </li>
                                                <li><a class="btn-floating green" id="agregar_dia"><i class="large mdi-content-add"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <?php $j=0;?>
                    <li>
                        <div id="jalar_iti" class="column lista_itinerario">

                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <hr>
                            <div class="input-field col s6">
                                <input placeholder="Escriba el itinerario" id="buscar" type="text" class="validate"  onkeyup="Buscar_iti()">
                                <label for="buscar">Buscar Itinerario</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="column lista_itinerario"  onmouseup="poner_valor()">

                            @foreach($Paquete->itinerario as $itinerario)
                                <?php $j++;?>
                                <div class="portlet">
                                    <div class="portlet-header"  onmousedown="Pasar_datos('{{$j}}','{{$j}}','{{$itinerario->titulo}}')"><span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_{{$j}}">{{$itinerario->dia}}</span>: <i id="titulo_{{$j}}">{{$itinerario->titulo}}</i></span></div>
                                    <div class="portlet-content" onmouseenter="estado_edicion(1)" onmouseleave="estado_edicion(0)">
                                        <div class="row">
                                                <div class="col s12">
                                                <span class="grey-text text-darken-3">
                                                    <input name="titulo_itinerario[]" id="titulo_itinerario_{{$j}}" type="text" placeholder="Ingrese el titulo" value="{{$itinerario->titulo}}">
                                                </span>
                                            </div>

                                        </div>
                                        <textarea  name="desc_itinerario[]" id="desc_itinerario_{{$j}}"  >
                                        {{$itinerario->descripcion}}
                                    </textarea>
                                    </div>
                                </div>
                                <script>
                                    $(function(){
                                        $('#desc_itinerario_{{$j}}')
                                                .on('froalaEditor.initialized', function (e, editor) {
                                                    $('#desc_itinerario_{{$j}}').parents('form').on('submit', function () {
                                                        {{--console.log($('#desc_itinerario_{{$j}}').val());--}}
                                                        //                                                    return false;
                                                    })
                                                })
                                                .froalaEditor({iframe:false,enter: $.FroalaEditor.ENTER_P, placeholderText: null})
                                    });
                                    $('#titulo_itinerario_{{$j}}').keypress(function() {
                                        var valor=$('#titulo_itinerario_{{$j}}').val();
                                        $('#titulo_{{$j}}').html(valor);
                                    });
                                    $('#titulo_itinerario_{{$j}}').keydown(function() {
                                        var valor=$('#titulo_itinerario_{{$j}}').val();
                                        $('#titulo_{{$j}}').html(valor);
                                    });
                                    $('#titulo_itinerario_{{$j}}').keyup(function() {
                                        var valor=$('#titulo_itinerario_{{$j}}').val();
                                        $('#titulo_{{$j}}').html(valor);
                                    });
                                </script>
                            @endforeach
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
        </form>
    </div>
</div>