@extends('layouts.admin')

@section('content')
    <div class="row margin-top-20">
        <div class="col s12">
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper text-darken-1">1. Configurar Paquete</a>
                </div>

            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_pending_path')}}" class="valign-wrapper text-darken-1 not-active">2. Itinerario y servicios</a>
                </div>
            </div>
        </div>
    </div>
    @foreach($paquete as $paquete_)
        <div class="row margin-top-10">
            <div class="col s12 center">
                <div class="col s12">
                    <h4 class="center">{{$paquete_->codigo}}: {{$paquete_->titulo}}
                        <input type="hidden" id="duracion_m" value="{{$paquete_->duracion-1}}">
                        <a href="#packages_modal" class="modal-trigger tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar datos basicos del paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a>
                    </h4>

                    {{--<p><b><i class="mdi-communication-email cyan-text text-darken-2"></i></b> {{$cliente->email}} <b>|</b> <b><i class="mdi-social-person cyan-text text-darken-2"></i></b> {{$cliente->nombres}}, {{$cliente->apellidos}} <b>|</b> <b><i class="mdi-social-group-add cyan-text text-darken-2"></i></b> {{$cotizaciones->nropersonas}} <b>|</b> <b><i class="mdi-editor-insert-invitation cyan-text text-darken-2"></i></b> {{$cotizaciones->fecha}}</p>--}}
                    <p class="left-align">{{$paquete_->descripcion}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s12">
                    <h5 class="grey-text text-darken-1">Destinos
                        <a href="#destinations_modal" class="modal-trigger tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar destinos para este paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a>
                    </h5>
                    <div class="divider"></div>
                    <p class="text-12">Destinos actuales del paquete</p>
                    @foreach($paquete_->destinos as $destino)
                        <div class="col s3">
                            <input type="checkbox" class="filled-in" id="{{$destino->id}}" checked="checked" />
                            <label for="{{$destino->id}}" class="padding-left-5">{{$destino->destino}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <form action="{{route('guardar_paquete_path')}}" method="post">
            <div class="row main-wrapper">

                <div class="col s7">
                    <div class="col s12 margin-bottom-20">

                        <h5 class="grey-text text-darken-1">Itinerario
                            {{--<a href="#modal_add" class="modal-trigger tooltipped right text-12 green-text" data-position="bottom" data-delay="50" data-tooltip="Agregar nuevo itinerario"><i class="mdi-av-my-library-add text-18 left"></i></a>--}}
                            <a href="#modal_add_itinerary" class="modal-trigger tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Agregar itinerario de nuestra base de datos"><i class="mdi-av-my-library-books text-18 left"></i></a>
                        </h5>
                        <div class="divider"></div>
                        <p class="text-12">Se puede agregar mas itinerarios y poder desplazarlos a la ubicacion que requiera.</p>

                    </div>
                    <div class="col s12">
                        <div id="modal_add_services" class="modal">
                            <div class="modal-content">
                                <form id="frm_agregar_servicio_" name="frm_agregar_servicio_" class="col s12" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col s12">
                                            <h5 class="center">Agregar servicios</h5>
                                            <div class="divider margin-bottom-20"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <div id="lista_servicios_" class="row">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row spacer-20 right">
                                        <div class="col s12">
                                            <input type="text" name="iti_orden" id="iti_orden_" value="">
                                            <a class="btn waves-effect waves-light" onclick="agregar_servicio()" id="action_agregar_servicio_" name="action_agregar_servicio">Agregar servicios
                                                <i class="mdi-content-send right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="column lista_itinerario" onmouseup="poner_valor()">
                            <?php
                            $pos=0;
                            $totalItinerario=0;
                            ?>
                            @foreach($paquete_->itinerarios->sortBy('dias') as $itinerario)

                                <?php $precio_iti2=0?>
                                @foreach($itinerario->ordenes as $ordenes2)
                                    <?php $precio_iti2+=$ordenes2->precio?>
                                @endforeach
                                <?php
                                $pos++;
                                $totalItinerario+=$precio_iti2;
                                ?>

                                <div id="Itine_{{$pos}}" class="portlet">

                                    <div class="portlet-header">Dia <span class="pos_iti" name="posdia[]" id="pos_dia_{{$pos}}">{{$pos}}</span>: <span id="titulo_iti_{{$itinerario->id}}" class="grey-text text-darken-1">{{ucwords(strtolower($itinerario->titulo))}}</span>
                                        <a href="#modal_edit_{{$itinerario->id}}" class="modal-trigger blue-text right"><i class="mdi-editor-mode-edit"></i></a>
                                        <a href="#!" class="red-text right" onclick="borrarItinerario_pqt({{$pos}},{{$itinerario->id}})"><i class="mdi-action-delete"></i></a>
                                        <input class="precio_itinerario" type="hidden" name="precio_itinerario[]" id="precio_itinerario_{{$pos}}" value="{{$precio_iti2}}"><span class="right grey-text" id="html_precio_itinerario_{{$pos}}">(${{$precio_iti2}})</span>

                                    </div>
                                    <div class="portlet-content col s12 " style="display: none">
                                        <p class="no-margin" id="descrp_{{$itinerario->id}}">{{$itinerario->descripcion}}</p>
                                        <div class="row spacer-20">
                                            <div class="col s6">
                                                <p class="no-margin orange-text text-darken-1"><b>Servicios</b></p>
                                                <div class="divider margin-bottom-20"></div>
                                                <table class="table bordered striped table-services-config">

                                                    <thead class="grey darken-2 white-text">
                                                    <tr>
                                                        <th class="border-radius-0">Concepto</th>
                                                        <th class="border-radius-0">Precio</th>
                                                        <th class="border-radius-0"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="itineraio_orden_{{$itinerario->id}}">
                                                    @foreach($itinerario->ordenes as $ordenes)
                                                        <tr id="servicio_{{$itinerario->id}}_{{$ordenes->id}}">
                                                            <td>{{$ordenes->nombre}}</td>
                                                            <td class="iti_precio_orden_{{$itinerario->id}}" id="iti_precio_serv_{{$ordenes->id}}">{{$ordenes->precio}}</td>
                                                            <td class="right-align">
                                                                <a href="#modal_edit_serv_{{$ordenes->id}}" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>
                                                                <a href="#!" class="red-text" onclick="eliminar_servicio({{$ordenes->id}})"><i class="mdi-action-delete"></i></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td class="no-padding right-align"><a href="#modal_add_services_{{$itinerario->id}}" class="modal-trigger text-12 blue-text"><i>Agregar nuevo servicio +</i></a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- Modal Structure comentario-->
                                                <div id="modal_edit_serv_" class="modal">
                                                    <div class="modal-content">
                                                        <form id="form_editar_itinerario_serv_" name=form_editar_itinerario_serv_" class="col s12"  method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col s12">
                                                                    <div class="row">
                                                                        <div class="col s12">
                                                                            <h5 class="center">Editar Servicio</h5>
                                                                            <div class="divider margin-bottom-20"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="input-field col s12">
                                                                            <input type="number" id="precio_txt_" name="precio_txt" class="" value="0">
                                                                            <label for="precio_txt" class="">Precio</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row spacer-20 right">
                                                                        <div class="col s12">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="orden_id" id="orden_id" value="">
                                                                            <a class="btn waves-effect waves-light" name="action_itinerario_serv" id="action_itinerario_serv_">Agregar
                                                                                <i class="mdi-content-send right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            @foreach($itinerario->ordenes as $ordenes)
                                                <!-- Modal Structure comentario-->
                                                    <div id="modal_edit_serv_{{$ordenes->id}}" class="modal">
                                                        <div class="modal-content">
                                                            <form id="form_editar_itinerario_serv_{{$ordenes->id}}" name=form_editar_itinerario_serv_{{$ordenes->id}}" class="col s12"  method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <h5 class="center">Editar Servicio</h5>
                                                                                <div class="divider margin-bottom-20"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="input-field col s12">
                                                                                <input type="number" id="precio_txt_{{$ordenes->id}}" name="precio_txt" class="" value="{{$ordenes->precio}}">
                                                                                <label for="precio_txt" class="">Precio</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row spacer-20 right">
                                                                            <div class="col s12">
                                                                                {{csrf_field()}}
                                                                                <input type="hidden" name="orden_id" id="orden_id" value="{{$ordenes->id}}">
                                                                                <a class="btn waves-effect waves-light" onclick="enviar_serv_pqt({{$ordenes->id}})" name="action_itinerario_serv" id="action_itinerario_serv_{{$ordenes->id}}">Agregar
                                                                                    <i class="mdi-content-send right"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col s6 ">
                                                <p class="no-margin orange-text text-darken-1">
                                                    <b>Comentarios u observaciones</b>
                                                    {{--<a href="#modal_add_com" class="modal-trigger green-text "><i class="mdi-content-add-box"></i></a>--}}
                                                    <a href="#modal_edit_com_{{$itinerario->id}}" class="hide modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>
                                                    <a class="hide" href="" class="red-text"><i class="mdi-action-delete"></i></a>
                                                </p>
                                                <div class="divider margin-bottom-20"></div>
                                                <p class="no-margin" id="observaciones_iti_{{$itinerario->id}}">{{$itinerario->observaciones}}</p>
                                                {{--<div class="input-field">--}}
                                                {{--<textarea id="textarea1" class="materialize-textarea"></textarea>--}}
                                                {{--<label for="textarea1">Textarea</label>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Structure itinerario-->
                                <div id="modal_add" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5 class="center">Agregar nuevo itinerario</h5>
                                                <div class="divider margin-bottom-20"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate">
                                                <label for="titulo_txt">Titulo</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea"></textarea>
                                                <label for="descipcion_txt" class="">Descipcion del paquete</label>
                                            </div>
                                        </div>
                                        <div class="row spacer-20 right">
                                            <div class="col s12">
                                                <button class="btn waves-effect waves-light" type="submit" name="action">Agregar
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="modal_edit_0" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <form id="form_editar_itinerario_0" name=form_editar_itinerario_0" class="col s12"  method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <h5 class="center">Modificar itinerario</h5>
                                                            <div class="divider margin-bottom-20"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="">
                                                            <label for="titulo_txt">Titulo</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea"></textarea>
                                                            <label for="descipcion_txt" class="">Descripcion</label>
                                                        </div>
                                                    </div>
                                                    <div class="row spacer-20 right">
                                                        <div class="col s12" id="response_tinerario"></div>
                                                        <div class="col s12">
                                                            {{csrf_field()}}
                                                            <input type="text" name="itinerario_id" id="itinerario_id" value="">
                                                            <a class="btn waves-effect waves-light" name="action_itinerario" id="action_itinerario_">Agregar
                                                                <i class="mdi-content-send right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Structure itinerario edit-->
                                <div id="modal_edit_{{$itinerario->id}}" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <form id="form_editar_itinerario_{{$itinerario->id}}" action="{{route('editar_paquete_nuevo_itinerario_path')}}" name=form_editar_itinerario_{{$itinerario->id}}" class="col s12">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <h5 class="center">Modificar itinerario</h5>
                                                            <div class="divider margin-bottom-20"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="{{$itinerario->titulo}}">
                                                            <label for="titulo_txt">Titulo</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">{{$itinerario->descripcion}}</textarea>
                                                            <label for="descipcion_txt" class="">Descripcion</label>
                                                        </div>
                                                    </div>
                                                    <div class="row spacer-20 ">
                                                        <div class="col s4">
                                                            <div class="row">
                                                                <div class="col s12" id="response_tinerario_{{$itinerario->id}}"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col s8 right">
                                                            <div class="row right">
                                                                <div class="col s12">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="itinerario_id" id="itinerario_id" value="{{$itinerario->id}}">
                                                                    <a class="btn waves-effect waves-light"  onclick="enviar_pqt({{$itinerario->id}})" name="action_itinerario" id="action_itinerario_{{$itinerario->id}}">Agregar
                                                                        <i class="mdi-content-send right"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Structure comentario-->
                                <div id="modal_add_com" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5 class="center">Agregar Comentario u observacion</h5>
                                                <div class="divider margin-bottom-20"></div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="input-field col s12">
                                                <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea"></textarea>
                                                <label for="descipcion_txt" class="">Comentario</label>
                                            </div>
                                        </div>
                                        <div class="row spacer-20 right">
                                            <div class="col s12">
                                                <button class="btn waves-effect waves-light" type="submit" name="action">Agregar
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Modal Structure comentario-->
                                {{--<div id="modal_edit_com_{{$itinerario->id}}" class="modal">--}}
                                {{--<div class="modal-content">--}}
                                {{--<form id="form_editar_itinerario_obs_{{$itinerario->id}}" name=form_editar_itinerario_obs_{{$itinerario->id}}" class="col s12"  method="post" enctype="multipart/form-data">--}}
                                {{--<div class="row">--}}
                                {{--<div class="col s12">--}}
                                {{--<h5 class="center">Editar Comentario u observacion</h5>--}}
                                {{--<div class="divider margin-bottom-20"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}

                                {{--<div class="input-field col s12">--}}
                                {{--<textarea id="obs_txt" name="obs_txt" class="materialize-textarea">{{$itinerario->observaciones}}</textarea>--}}
                                {{--<label for="obs_txt" class="">Comentario</label>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="row spacer-20 right">--}}
                                {{--<div class="col s12">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" name="itinerario_id" id="itinerario_id" value="{{$itinerario->id}}">--}}
                                {{--<a class="btn waves-effect waves-light" onclick="enviar_obs_nuevo({{$itinerario->id}})" name="action" id="action_itinerario_obs_{{$itinerario->id}}">Agregar--}}
                                {{--<i class="mdi-content-send right"></i>--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</form>--}}
                                {{--</div>--}}

                                {{--</div>--}}




                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <!-- Modal Structure itinerario lista-->
                            <div id="modal_add_itinerary" class="modal">
                                <div class="modal-content">
                                    <form id="action_agregar_itis_" action="{{route('paquete_guardar_itinerario_path')}}" name="action_agregar_itis_" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5 class="center">Agregar itinerario</h5>
                                                <div class="divider margin-bottom-20"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach($itinerarios as $itinerario)
                                                <?php
                                                $st=0;
                                                $ordentxt='';
                                                ?>
                                                @foreach($itinerario->ordenes as $orden)
                                                    <?php
                                                    $st+=$orden->orden_modelo->precio;
                                                    $ordentxt.=$orden->orden_modelo->nombre.'($'.$orden->orden_modelo->precio.'), ';
                                                    ?>
                                                @endforeach
                                                <?php
                                                $ordentxt=substr($ordentxt,0,strlen($ordentxt)-2);
                                                ?>
                                                <div class="col s6">
                                                    <input type="checkbox" name="itinerario[]" id="itinerario_{{$itinerario->id}}" value="{{$itinerario->id}}" class="filled-in"/>
                                                    <label for="itinerario_{{$itinerario->id}}">{{$itinerario->titulo}} ({{$st}}.00) <a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="{{$ordentxt}}"><i class="mdi-action-visibility"></i></a></label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row spacer-20 right">
                                            <div class="col s12">
                                                <input type="hidden" name="paquete_id" id="paquete_id" value="{{$paquete_->id}}">
                                                {{csrf_field()}}
                                                <button class="btn waves-effect waves-light" type="submit" name="action">Agregar itinerario
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                        @foreach($paquete_->itinerarios->sortBy('dias') as $itinerario)
                            <!-- Modal Structure servicios lista-->
                                <div id="modal_add_services_{{$itinerario->id}}" class="modal">
                                    <div class="modal-content">
                                        <form id="frm_agregar_servicio_{{$itinerario->id}}" name="frm_agregar_servicio_{{$itinerario->id}}" class="col s12" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col s12">
                                                    <h5 class="center">Agregar servicios</h5>
                                                    <div class="divider margin-bottom-20"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div id="lista_servicios_{{$itinerario->id}}" class="row">
                                                        @foreach($ordenes1  as $orden1)
                                                            <?php $estaw=0;?>
                                                            @foreach($itinerario->ordenes as $ordenes)
                                                                @if($orden1->nombre==$ordenes->nombre)
                                                                    <?php $estaw=1;?>
                                                                    <div class="col s4">
                                                                        <input type="checkbox" name="nservicio_{{$itinerario->id}}[]" class="filled-in nservicios" id="nservicio_{{$itinerario->id}}_{{$ordenes->id}}" value="{{$itinerario->id}}_{{$orden1->id}}_{{$orden1->nombre}}_{{$orden1->precio}}" checked="checked"/>
                                                                        <label for="nservicio_{{$itinerario->id}}_{{$ordenes->id}}">{{$ordenes->nombre}} ($ {{$ordenes->precio}})</label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            @if($estaw==0)
                                                                <div class="col s4">

                                                                    <input type="checkbox" name="nservicio_{{$itinerario->id}}[]" class="filled-in nservicios" id="nservicio_{{$itinerario->id}}_{{$orden1->id}}" value="{{$itinerario->id}}_{{$orden1->id}}_{{$orden1->nombre}}_{{$orden1->precio}}"/>
                                                                    <label for="nservicio_{{$itinerario->id}}_{{$orden1->id}}">{{$orden1->nombre}} ($ {{$orden1->precio}})</label>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row spacer-20 right">
                                                <div class="col s12">
                                                    {{csrf_field()}}
                                                    <input type="text" name="iti_orden" id="iti_orden_{{$itinerario->id}}" value="{{$itinerario->id}}">
                                                    <a class="btn waves-effect waves-light" onclick="agregar_servicio_pqt({{$itinerario->id}})" id="action_agregar_servicio_{{$itinerario->id}}" name="action_agregar_servicio">Agregar servicios
                                                        <i class="mdi-content-send right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col s12">

                        <h5 class="grey-text text-darken-1">Categoria y acomodacion</h5>
                        <div class="divider"></div>
                        <p class="text-12">Seleccione el numero de habitaciones segun el numero de pasajeros y categoria de hotel segun se requiera.</p>

                    </div>
                    <?php
                    $precio_t_2=0;
                    $precio_t_3=0;
                    $precio_t_4=0;
                    $precio_t_5=0;
                    $precio_m_2=0;
                    $precio_m_3=0;
                    $precio_m_4=0;
                    $precio_m_5=0;
                    $precio_d_2=0;
                    $precio_d_3=0;
                    $precio_d_4=0;
                    $precio_d_5=0;
                    $precio_s_2=0;
                    $precio_s_3=0;
                    $precio_s_4=0;
                    $precio_s_5=0;
                    $precio_id2=0;
                    $precio_id3=0;
                    $precio_id4=0;
                    $precio_id5=0;
                    $ulitidad_2=0;
                    $ulitidad_3=0;
                    $ulitidad_4=0;
                    $ulitidad_5=0;
                    $estrella_2=0;
                    $estrella_3=0;
                    $estrella_4=0;
                    $estrella_5=0;

                    $nrop_s=0;
                    $nrop_d=0;
                    $nrop_m=0;
                    $nrop_t=0;

                    ?>
                    @foreach($paquete_->precios as $precio)
                        @if($precio->estrellas==2)
                            <?php
                            $estrella_2==1;
                            $precio_t_2=$precio->precio_t;
                            $precio_d_2=$precio->precio_m;
                            $precio_m_2=$precio->precio_d;
                            $precio_s_2=$precio->precio_s;
                            $ulitidad_2=$precio->utilidad;
                            $precio_id2=$precio->id;
                            $nrop_s=$precio->personas_s;
                            $nrop_d=$precio->personas_d;
                            $nrop_m=$precio->personas_m;
                            $nrop_t=$precio->personas_t;
                            ?>
                        @endif
                        @if($precio->estrellas==3)
                            <?php
                            $estrella_3==1;
                            $precio_t_3=$precio->precio_t;
                            $precio_d_3=$precio->precio_m;
                            $precio_m_3=$precio->precio_d;
                            $precio_s_3=$precio->precio_s;
                            $ulitidad_3=$precio->utilidad;
                            $precio_id3=$precio->id;
                            $nrop_s=$precio->personas_s;
                            $nrop_d=$precio->personas_d;
                            $nrop_m=$precio->personas_m;
                            $nrop_t=$precio->personas_t;
                            ?>
                        @endif
                        @if($precio->estrellas==4)
                            <?php
                            $estrella_4==1;
                            $precio_t_4=$precio->precio_t;
                            $precio_d_4=$precio->precio_m;
                            $precio_m_4=$precio->precio_d;
                            $precio_s_4=$precio->precio_s;
                            $ulitidad_4=$precio->utilidad;
                            $precio_id4=$precio->id;
                            $nrop_s=$precio->personas_s;
                            $nrop_d=$precio->personas_d;
                            $nrop_m=$precio->personas_m;
                            $nrop_t=$precio->personas_t;
                            ?>
                        @endif
                        @if($precio->estrellas==5)
                            <?php
                            $estrella_5==1;
                            $precio_t_5=$precio->precio_t;
                            $precio_d_5=$precio->precio_m;
                            $precio_m_5=$precio->precio_d;
                            $precio_s_5=$precio->precio_s;
                            $ulitidad_5=$precio->utilidad;
                            $precio_id5=$precio->id;
                            $nrop_s=$precio->personas_s;
                            $nrop_d=$precio->personas_d;
                            $nrop_m=$precio->personas_m;
                            $nrop_t=$precio->personas_t;
                            ?>
                        @endif
                    @endforeach
                    <div class="col s12 margin-top-20">
                        <table class="table striped">
                            <thead>
                            <tr class="grey darken-3">
                                <th class="text-11 white-text">ROOMS</th>
                                <th class="text-11 white-text">ACOMODACION</th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_2" id="vstar_2" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star2" value="2" onclick="pasartotal(2)" <?php if($estrella_2==1) echo 'checked="checked"';?>>
                                        <label for="star2" class="text-8 orange-textn">2 STARS</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_3" id="vstar_3" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star3" value="3" onclick="pasartotal(3)" <?php if($estrella_3==1) echo 'checked="checked"';?>>
                                        <label for="star3" class="text-8 orange-textn">3 STARS</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_4" id="vstar_4" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star4" value="4" onclick="pasartotal(4)" <?php if($estrella_4==1) echo 'checked="checked"';?>>
                                        <label for="star4" class="text-8 orange-textn">4 STARS</label>
                                    </div>
                                </th>
                                <th >
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_5" id="vstar_5" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star5" value="5" onclick="pasartotal(5)" <?php if($estrella_5==1) echo 'checked="checked"';?>>
                                        <label for="star5" class="text-8 orange-textn">5 STARS</label>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input class="right-align" type="number" name="acom_t" id="acom_t" min="0"  value="{{$nrop_t}}" onchange="pasartotal(0)">
                                </td>
                                <th><i class="mdi-maps-local-hotel text-25"></i><i class="mdi-maps-local-hotel text-25"></i><i class="mdi-maps-local-hotel text-25"></i></th>
                                <td>
                                    <input class="right-align" type="number" name="t_2" id="t_2" min="0" value="{{$precio_t_2}}"  onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="t_3" id="t_3" min="0" value="{{$precio_t_3}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="t_4" id="t_4" min="0" value="{{$precio_t_4}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="t_5" id="t_5" min="0" value="{{$precio_t_5}}" onchange="pasartotal(0)">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="right-align" type="number" name="acom_d" id="acom_d" min="0"  value="{{$nrop_d}}" onchange="pasartotal(0)">
                                </td>
                                <th><i class="mdi-maps-local-hotel text-25"></i><i class="mdi-maps-local-hotel text-25"></i></th>
                                <td>
                                    <input class="right-align" type="number" name="d_2" id="d_2" min="0" value="{{$precio_d_2}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="d_3" id="d_3" min="0" value="{{$precio_d_3}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="d_4" id="d_4" min="0" value="{{$precio_d_4}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="d_5" id="d_5" min="0" value="{{$precio_d_5}}" onchange="pasartotal(0)">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="right-align" type="number" name="acom_m" id="acom_m" min="0"  value="{{$nrop_m}}" onchange="pasartotal(0)">
                                </td>
                                <th><i class="mdi-maps-local-hotel text-25"></i><i class="mdi-maps-local-hotel text-25"></i>(m)</th>
                                <td>
                                    <input class="right-align" type="number" name="m_2" id="m_2" min="0" value="{{$precio_m_2}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="m_3" id="m_3" min="0" value="{{$precio_m_3}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="m_4" id="m_4" min="0" value="{{$precio_m_4}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="m_5" id="m_5" min="0" value="{{$precio_m_5}}" onchange="pasartotal(0)">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="right-align" type="number" name="acom_s" id="acom_s" min="0"  value="{{$nrop_s}}" onchange="pasartotal(0)">
                                </td>
                                <th><i class="mdi-maps-local-hotel text-25"></i></th>
                                <td>
                                    <input class="right-align" type="number" name="s_2" id="s_2" min="0" value="{{$precio_s_2}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="s_3" id="s_3" min="0" value="{{$precio_s_3}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="s_4" id="s_4" min="0" value="{{$precio_s_4}}" onchange="pasartotal(0)">
                                </td>
                                <td>
                                    <input class="right-align" type="number" name="s_5" id="s_5" min="0" value="{{$precio_s_5}}" onchange="pasartotal(0)">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 right-align">
                        <input type="hidden" name="total2" id="total2" value="0">
                        <input type="hidden" name="total3" id="total3" value="0">
                        <input type="hidden" name="total4" id="total4" value="0">
                        <input type="hidden" name="total5" id="total5" value="0">

                        <input type="hidden" name="precio_id_2" id="precio_id_2" value="{{$precio_id2}}">
                        <input type="hidden" name="precio_id_3" id="precio_id_3" value="{{$precio_id3}}">
                        <input type="hidden" name="precio_id_4" id="precio_id_4" value="{{$precio_id4}}">
                        <input type="hidden" name="precio_id_5" id="precio_id_5" value="{{$precio_id5}}">

                        <input type="text" class="hide" name="totalItinerario" id="totalItinerario" value="{{$totalItinerario}}">
                        <input type="hidden" name="cliente_id" id="cliente_id" value="0">
                        <input type="text" name="paquete_id1" id="paquete_id1" value="{{$paquete_->id}}">

                        {{csrf_field()}}
                        <button class="btn waves-effect waves-light green" type="submit" name="action">Terminar
                            <i class="mdi-content-save right"></i>
                        </button>
                    </div>
                </div>
                <div class="col s5">
                    <div class="col s12" id="pinned">
                        <h5 class="grey-text text-darken-1">Precios
                            <a href="#modal_add_uti" class="modal-trigger tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Definir porcentaje de utilidad"><i class="mdi-action-trending-up text-18 left"></i></a>
                        </h5>
                        <div class="divider margin-bottom-20"></div>
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th><b class="orange-text">Categoria:</b></th>
                                    <th class="right-align text-14 orange-text">2 Stars</th>
                                    <th class="right-align text-14 orange-text">3 Stars</th>
                                    <th class="right-align text-14 orange-text">4 Stars</th>
                                    <th class="right-align text-14 orange-text">5 Stars</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class=""><b>Costo Total:</b></td>
                                    <td class="right-align">$ <span id="ptotal2">0</span><input type="hidden" id="nptotal_2" name="nptotal_2" value="0"></td>
                                    <td class="right-align">$ <span id="ptotal3">0</span><input type="hidden" id="nptotal_3" name="nptotal_3" value="0"></td>
                                    <td class="right-align">$ <span id="ptotal4">0</span><input type="hidden" id="nptotal_4" name="nptotal_4" value="0"></td>
                                    <td class="right-align">$ <span id="ptotal5">0</span><input type="hidden" id="nptotal_5" name="nptotal_5" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="no-padding"><b>Utilidad(%):</b></td>
                                    <td><input class="right-align" type="number" name="utilidad_2" id="utilidad_2" min="0" max="40" value="40" onchange="pasartotal(0)"></td>
                                    <td><input class="right-align" type="number" name="utilidad_3" id="utilidad_3" min="0" max="40" value="40" onchange="pasartotal(0)"></td>
                                    <td><input class="right-align" type="number" name="utilidad_4" id="utilidad_4" min="0" max="40" value="40" onchange="pasartotal(0)"></td>
                                    <td><input class="right-align" type="number" name="utilidad_5" id="utilidad_5" min="0" max="40" value="40" onchange="pasartotal(0)"></td>
                                </tr>
                                <tr>
                                    <td class="no-padding"><b>Triple:</b></td>
                                    <td class="right-align">$ <span name="preciov_2_t" id="preciov_2_t">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_3_t" id="preciov_3_t">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_4_t" id="preciov_4_t">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_5_t" id="preciov_5_t">0.00</span></td>
                                </tr>
                                <tr>
                                    <td class="no-padding"><b>Doble:</b></td>
                                    <td class="right-align">$ <span name="preciov_2_d" id="preciov_2_d">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_3_d" id="preciov_3_d">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_4_d" id="preciov_4_d">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_5_d" id="preciov_5_d">0.00</span></td>
                                </tr>
                                <tr>
                                    <td class="no-padding"><b>Matr:</b></td>
                                    <td class="right-align">$ <span name="preciov_2_m" id="preciov_2_m">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_3_m" id="preciov_3_m">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_4_m" id="preciov_4_m">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_5_m" id="preciov_5_m">0.00</span></td>
                                </tr>
                                <tr>
                                    <td class="no-padding"><b>Simple:</b></td>
                                    <td class="right-align">$ <span name="preciov_2_s" id="preciov_2_s">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_3_s" id="preciov_3_s">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_4_s" id="preciov_4_s">0.00</span></td>
                                    <td class="right-align">$ <span name="preciov_5_s" id="preciov_5_s">0.00</span></td>
                                </tr>


                                <tr class="hide">
                                    <td class="no-padding"><b>Venta:</b></td>
                                    <td class="no-padding right-align "><input type="number" id="pventa_2" name="pventa_2" class="right-align" value="0"></td>
                                    <td class="no-padding right-align "><input type="number" id="pventa_3" name="pventa_3" class="right-align" value="0"></td>
                                    <td class="no-padding right-align "><input type="number" id="pventa_4" name="pventa_4" class="right-align" value="0"></td>
                                    <td class="no-padding right-align "><input type="number" id="pventa_5" name="pventa_5" class="right-align" value="0"></td>

                                </tr>
                                </tbody>

                            </table>
                        </div>

                        <!-- Modal Structure itinerario-->
                        <div id="modal_add_uti" class="modal">
                            <div class="modal-content">
                                <div class="row">
                                    <form action="" class="col s12">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5 class="center">Agregar porcentaje de utilidad</h5>
                                                <div class="divider margin-bottom-20"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="porcentaje_txt" type="text" class="validate" name="porcentaje_txt" value="20">
                                                <label for="porcentaje_txt">Porcentaje (%)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 right-align">
                                                <button class="btn waves-effect waves-light" type="submit" name="action">Definir
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal Structure packages-->
        <div id="packages_modal" class="modal packages_modal">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12">
                        <h5 class="center">Modificar Paquete</h5>
                        <div class="divider margin-bottom-20"></div>
                    </div>
                </div>
                <div class="row">
                    <form  name="form_editar_pqt_nuevo" class="col s12" action="{{route('editar_paquete_itinerario_path')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s3">
                                <input placeholder="Ingrese el codigo del paquete" id="codigo_txt" name="codigo_txt" type="text" class="validate" value="{{$paquete_->codigo}}">
                                <label for="codigo_txt" class="active">Codigo</label>
                            </div>
                            <div class="input-field col s3">
                                <input placeholder="Duracion del paquete" id="duracion_txt" name="duracion_txt" type="number" min="1" max="99" step="1" class="validate" value="{{$paquete_->duracion}}">
                                <label for="duracion_txt" class="active">Duracion</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Ingrese el titulo del paquete" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="{{$paquete_->titulo}}">
                                <label for="titulo_txt" class="active">Titulo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">{{$paquete_->descripcion}}</textarea>
                                <label for="descipcion_txt" class="">Descipcion del paquete</label>
                            </div>
                            <div class="input-field col s6">
                                <textarea id="opcional_txt" name="opcional_txt" class="materialize-textarea">{{$paquete_->opcional}}</textarea>
                                <label for="opcional_txt" class="">Opcional</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <textarea id="icon_prefix2" name="incluye_txt" class="materialize-textarea">{{$paquete_->incluye}}</textarea>
                                <label for="icon_prefix2" class="">Incluye</label>
                            </div>
                            <div class="input-field col s6">
                                <textarea id="incluye_txt" name="noincluye_txt" class="materialize-textarea">{{$paquete_->noincluye}}</textarea>
                                <label for="incluye_txt" class="">No incluye</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <p class="grey-text">Agregue una imagen</p>
                                <input type="file" id="imagen" name="imagen" class="dropify" data-default-file="{{asset('/img/maps/'.$paquete_->imagen)}}"/>
                            </div>
                        </div>
                        <div class="row margin-top-20 right">
                            <div class="col s12" id="response"></div>
                            <div class="col s12">
                                <input type="hidden" name="ppaquete_id" id="ppaquete_id" value="{{$paquete_->id}}">
                                {{csrf_field()}}
                                <button class="btn waves-effect waves-light" type="submit" name="action">Modificar
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Modal Structure destinations-->
        <div id="destinations_modal" class="modal">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12">
                        <h5 class="center">Modificar destinos</h5>
                        <div class="divider margin-bottom-20"></div>
                    </div>
                </div>
                <div class="row">
                    <form id="formDestinos_pqt" name="formDestinos_pqt" class="col s12" action="{{route('editar_destinos_paquete_path')}}" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <?php $i=0;?>
                            @foreach($destinos->sortBy("destino") as $destin)
                                <?php $i++; $si=0;?>
                                @foreach($paquete_->destinos as $destinoCoti)
                                    @if($destin->destino==$destinoCoti->destino)
                                        <div class="col s6">
                                            <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" checked="checked" value="{{$destin->destino}}"/>
                                            <label for="destino_{{$i}}" class="padding-left-5">{{$destin->destino}}</label>
                                            <?php $si=1;?>
                                        </div>
                                    @endif
                                @endforeach
                                @if($si==0)
                                    <div class="col s6">
                                        <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" value="{{$destin->destino}}"/>
                                        <label for="destino_{{$i}}" class="padding-left-5">{{$destin->destino}}</label>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="row margin-top-20 right">
                            <div class="col s12" id="response"></div>
                            <div class="col s12">
                                {{csrf_field()}}
                                <input type="text" name="paquete_id" id="paquete_id" value="{{$paquete_->id}}">
                                <button class="btn waves-effect waves-light" type="submit" name="actionDestino" id="actionDestino">Modificar
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endforeach
@stop