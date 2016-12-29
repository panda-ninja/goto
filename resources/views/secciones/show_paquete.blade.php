
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
        <div class="col s12 m6 l6">

            <h5 class="THIN letra-naranja">
                {{$Paquete->codigo.' '.$Paquete->titulo}}
            </h5>
                <b>Duracion: </b><label class="letra-verde">{{$Paquete->duracion}} DAYS & {{$Paquete->duracion-1}} NIGHTS</label>

        </div>

    </div>
    <hr>
    <div class="row">
        <form action="" method="post" >
            <div class="input-field col s12 m6 l6">
                <textarea name="text_descripcion" id="text_descripcion">{{$Paquete->descripcion}}</textarea>
                <script>
//                    $(function(){
//                        $('#text_descripcion').froalaEditor({
//                            iframe: true
//                        })
//                    });
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
                {{--<script>--}}
                    {{--CKEDITOR.replace( 'text_descripcion' );--}}
                {{--</script>--}}
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

                    @foreach($Paquete->precio_paquetes as $precio)
                        @if($precio->estrellas=="2")
                            <?php $precio_2_s=$precio->precio_s;?>
                            <?php $precio_2_d=$precio->precio_d;?>
                            <?php $precio_2_t=$precio->precio_t;?>
                        @endif
                        @if($precio->estrellas=="3")
                            <?php $precio_3_s=$precio->precio_s;?>
                            <?php $precio_3_d=$precio->precio_d;?>
                            <?php $precio_3_t=$precio->precio_t;?>
                        @endif
                        @if($precio->estrellas=="4")
                            <?php $precio_4_s=$precio->precio_s;?>
                            <?php $precio_4_d=$precio->precio_d;?>
                            <?php $precio_4_t=$precio->precio_t;?>
                        @endif
                        @if($precio->estrellas=="5")
                            <?php $precio_5_s=$precio->precio_s;?>
                            <?php $precio_5_d=$precio->precio_d;?>
                            <?php $precio_5_t=$precio->precio_t;?>
                        @endif

                    @endforeach
                    <tr>
                        <td><input type="number" name="room_t" value="0"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_t" id="precio_2_t" value="{{$precio_2_t}}"></td>
                        <td><input type="number" name="precio_3_t" id="precio_3_t" value="{{$precio_3_t}}"></td>
                        <td><input type="number" name="precio_4_t" id="precio_4_t" value="{{$precio_4_t}}"></td>
                        <td><input type="number" name="precio_5_t" id="precio_5_t" value="{{$precio_5_t}}"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_d" value="0"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_d" id="precio_2_d" value="{{$precio_2_d}}"></td>
                        <td><input type="number" name="precio_3_d" id="precio_3_d" value="{{$precio_3_d}}"></td>
                        <td><input type="number" name="precio_4_d" id="precio_4_d" value="{{$precio_4_d}}"></td>
                        <td><input type="number" name="precio_5_d" id="precio_5_d" value="{{$precio_5_d}}"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_m" value="0"></td>
                        <td class="centrar"><img src="{{asset('images')}}/matrimonial.png" alt="" width="50px" height="30px"></td>
                        <td><input type="number" name="precio_2_d_m" id="precio_2_d_m" value="{{$precio_2_d}}"></td>
                        <td><input type="number" name="precio_3_d_m" id="precio_3_d_m" value="{{$precio_3_d}}"></td>
                        <td><input type="number" name="precio_4_d_m" id="precio_4_d_m" value="{{$precio_4_d}}"></td>
                        <td><input type="number" name="precio_5_d_m" id="precio_5_d_m" value="{{$precio_5_d}}"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="room_s" value="0"></td>
                        <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                        <td><input type="number" name="precio_2_s" id="precio_2_s" value="{{$precio_2_s}}"></td>
                        <td><input type="number" name="precio_3_s" id="precio_3_s" value="{{$precio_3_s}}"></td>
                        <td><input type="number" name="precio_4_s" id="precio_4_s" value="{{$precio_4_s}}"></td>
                        <td><input type="number" name="precio_5_s" id="precio_5_s" value="{{$precio_5_s}}"></td>
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
               <div class="column lista_itinerario"  onmouseup="poner_valor()">

                    @foreach($Paquete->itinerario as $itinerario)
                        <?php $j++;?>
                            <div class="portlet">
                                <div class="portlet-header"  onmousedown="Pasar_datos('{{$j}}','{{$j}}','{{$itinerario->titulo}}')"><span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_{{$j}}">{{$itinerario->dia}}</span>: <i id="titulo_{{$j}}">{{$itinerario->titulo}}</i></span></div>
                                <div class="portlet-content" onmouseenter="estado_edicion(1)" onmouseleave="estado_edicion(0)">
                                    <div class="row">
                                        <div class="col s10">
                                                <span class="grey-text text-darken-3">
                                                    <input name="titulo_itinerario[]" id="titulo_itinerario_{{$j}}" type="text" placeholder="Ingrese el titulo" value="{{$itinerario->titulo}}">
                                                </span>
                                        </div>
                                        <div class="col s2">
                                            <a id="agregar_pq" class="btn cyan waves-effect waves-light right modal-trigger" href="#modal331">Buscar Dia
                                                <i class="mdi-content-add-circle right"></i>
                                            </a>
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


