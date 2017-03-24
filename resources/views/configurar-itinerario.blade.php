@extends('layouts.admin')

@section('content')

    <div class="row margin-top-20">
        <div class="col s12">
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_path')}}" class="valign-wrapper text-darken-1">1. Datos basicos</a>
                </div>
            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper text-darken-1">2. Configurar Paquete</a>
                </div>

            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_pending_path')}}" class="valign-wrapper text-darken-1 not-active">3. Itinerario y servicios</a>
                </div>
            </div>
        </div>
    </div>
    @foreach($paquete as $paquete_)
    <div class="row margin-top-10">
        <div class="col s12 center">
            <div class="col s12">
                <h4 class="center">GTP500: CUSCO CITY TOUR PRIVATE
                    <a href="#packages_modal" class="modal-trigger tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar datos basicos del paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a>
                </h4>

                <p><b><i class="mdi-communication-email cyan-text text-darken-2"></i></b> {{$cliente->email}} <b>|</b> <b><i class="mdi-social-person cyan-text text-darken-2"></i></b> {{$cliente->nombres}}, {{$cliente->apellidos}} <b>|</b> <b><i class="mdi-social-group-add cyan-text text-darken-2"></i></b> {{$cotizaciones->nropersonas}} <b>|</b> <b><i class="mdi-editor-insert-invitation cyan-text text-darken-2"></i></b> {{$cotizaciones->fecha}}</p>
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
                    <input type="checkbox" class="filled-in" id="{{$destino->id}}" checked="checked" />
                    <label for="{{$destino->id}}" class="padding-left-5">{{$destino->destino}}</label>
                @endforeach


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s9">
                <div class="col s12">

                    <h5 class="grey-text text-darken-1">Itinerario
                        <a href="#modal_add" class="modal-trigger tooltipped right text-12 green-text" data-position="bottom" data-delay="50" data-tooltip="Agregar nuevo itinerario"><i class="mdi-av-my-library-add text-18 left"></i></a>
                        <a href="#modal_add_itinerary" class="modal-trigger tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Agregar itinerario de nuestra base de datos"><i class="mdi-av-my-library-books text-18 left"></i></a>
                    </h5>
                    <div class="divider"></div>
                    <p class="text-12">Usted puede buscar y cargar datos de un paquete almacenado en nuestra base de datos y poder modificarlos segun sus necesidades o crear un paquete totalmente nuevo</p>

                </div>
                <div class="col s12">
                    <div class="column lista_itinerario" onmouseup="poner_valor()">
                        <?php
                            $pos=0;
                            $totalItinerario=0;
                        ?>
                        @foreach($paquete_->itinerario_cotizaciones as $itinerario)
                            <?php
                                $pos++;
                                $totalItinerario+=$itinerario->precio;
                            ?>
                            <div id="Itine_{{$pos}}" class="portlet">
                                <div class="portlet-header">Dia <span class="pos_iti" name="posdia[]" id="pos_dia_{{$pos}}">{{$pos}}</span>: {{$itinerario->titulo}}
                                    <span class="right">$ {{$itinerario->precio}}</span>
                                    <a href="#modal_edit_{{$itinerario->id}}" class="modal-trigger blue-text"><i class="mdi-editor-mode-edit"></i></a>
                                    <a href="" class="red-text"><i class="mdi-action-delete"></i></a>
                                </div>
                                <div class="portlet-content col s12 " style="display: none">
                                    <p class="no-margin">{{$itinerario->descripcion}}</p>
                                    <div class="row spacer-20">
                                        <div class="col s6">
                                            <p class="no-margin orange-text text-darken-1"><b>Servicios</b></p>
                                            <div class="divider margin-bottom-20"></div>
                                            <table class="table bordered striped">

                                                <thead class="grey darken-2 white-text">
                                                <tr>
                                                    <th class="border-radius-0">Concepto</th>
                                                    <th class="border-radius-0">Precio</th>
                                                    <th class="border-radius-0"></th>
                                                </tr>
                                                </thead>
                                               @foreach($itinerario->ordenes as $ordenes)
                                                    <tr id="servicio_{{$ordenes->id}}">
                                                        <td>{{$ordenes->nombre}}</td>
                                                        <td>{{$ordenes->precio}}</td>
                                                        <td class="right-align">
                                                            <a href="" class="blue-text"><i class="mdi-editor-mode-edit"></i></a>
                                                            <a href="" class="red-text" onclick="eliminar_servicio({{$ordenes->id}})"><i class="mdi-action-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td class="no-padding right-align"><a href="#modal_add_services" class="modal-trigger text-12 blue-text"><i>Agregar nuevo servicio +</i></a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col s6 ">
                                            <p class="no-margin orange-text text-darken-1">
                                                <b>Comentarios u observaciones</b>
                                                <a href="#modal_add_com" class="modal-trigger green-text "><i class="mdi-content-add-box"></i></a>
                                                <a href="#modal_edit_com" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>
                                                <a href="" class="red-text"><i class="mdi-action-delete"></i></a>
                                            </p>
                                            <div class="divider margin-bottom-20"></div>
                                            <p class="no-margin">{{$itinerario->observaciones}}</p>
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

                        <!-- Modal Structure itinerario edit-->
                        <div id="modal_edit_{{$itinerario->id}}" class="modal">
                            <div class="modal-content">
                                <form id="form_editar_itinerario_{{$itinerario->id}}" name=form_editar_itinerario_{{$itinerario->id}}" class="col s12"  method="post" enctype="multipart/form-data">
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
                                    <div class="row spacer-20 right">
                                        <div class="col s12" id="response_tinerario"></div>
                                        <div class="col s12">
                                            {{csrf_field()}}
                                            <input type="text" name="itinerario_id" id="itinerario_id" value="{{$itinerario->id}}">
                                            <button class="btn waves-effect waves-light" type="submit" onclick="submit({{$itinerario->id}})" name="action_itinerario" id="action_itinerario_{{$itinerario->id}}">Agregar
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
                        <div id="modal_edit_com" class="modal">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s12">
                                        <h5 class="center">Editar Comentario u observacion</h5>
                                        <div class="divider margin-bottom-20"></div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="input-field col s12">
                                        <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">{{$itinerario->observacion}}</textarea>
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

                        <!-- Modal Structure itinerario lista-->
                        <div id="modal_add_itinerary" class="modal">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s12">
                                        <h5 class="center">Agregar itinerario</h5>
                                        <div class="divider margin-bottom-20"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <table class="table-services">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Cusco arrival and city tour </label>
                                                </td>
                                                <td>(200.00)</td>
                                                <td>
                                                    <a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="transfer($50.00), tours($20.00), ticket($30.00)"><i class="mdi-action-visibility"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Checkout time </label>
                                                </td>
                                                <td>(200.00)</td>
                                                <td>
                                                    <a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="transfer($50.00), tours($20.00), ticket($30.00)"><i class="mdi-action-visibility"></i></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col s6">
                                        <table class="table-services">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Machu picchu tour </label>
                                                </td>
                                                <td>(200.00)</td>
                                                <td>
                                                    <a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="transfer($50.00), tours($20.00), ticket($30.00), entrances($100)"><i class="mdi-action-visibility"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">River rafting </label>
                                                </td>
                                                <td>(200.00)</td>
                                                <td>
                                                    <a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="transfer($50.00), tours($50.00), ticket($100.00)"><i class="mdi-action-visibility"></i></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="row spacer-20 right">
                                    <div class="col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Agregar servicios
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal Structure servicios lista-->
                        <div id="modal_add_services" class="modal">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s12">
                                        <h5 class="center">Agregar servicios</h5>
                                        <div class="divider margin-bottom-20"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <table class="table-services">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">City tours </label>
                                                </td>
                                                <td>(10.00)</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Entrances </label>
                                                </td>
                                                <td>(2.00)</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col s6">
                                        <table class="table-services">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Tickets </label>
                                                </td>
                                                <td>(5.00)</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="filled-in" id="filled-in-2" />
                                                    <label for="filled-in-2">Transfer </label>
                                                </td>
                                                <td>(20.00)</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="row spacer-20 right">
                                    <div class="col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Agregar servicios
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col s12">

                    <h5 class="grey-text text-darken-1">Categoria y acomodacion</h5>
                    <div class="divider"></div>
                    <p class="text-12">Usted puede buscar y cargar datos de un paquete almacenado en nuestra base de datos y poder modificarlos segun sus necesidades o crear un paquete totalmente nuevo</p>

                </div>

                <div class="col s12 right-align">
                    <input type="text" name="totalItinerario" id="totalItinerario" value="{{$totalItinerario}}">
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Terminar
                        <i class="mdi-content-save right"></i>
                    </button>
                </div>
        </div>
        <div class="col s3">
            <div class="col s12">
                <h5 class="grey-text text-darken-1">Precios
                    <a href="#modal_add_uti" class="modal-trigger tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Definir porcentaje de utilidad"><i class="mdi-action-trending-up text-18 left"></i></a>
                </h5>
                <div class="divider margin-bottom-20"></div>
                <div class="card-panel grey lighten-5 z-depth-1">
                    <table>
                        <tr>
                            <td class="no-padding"><b>Costo:</b></td>
                            <td class="no-padding right-align">1200.00 $</td>
                        </tr>
                        <tr>
                            <td class="no-padding"><b>Venta:</b></td>
                            <td class="no-padding "><input type="text" class="right-align" value="1600.00 $"></td>
                        </tr>
                        <tr>
                            <td class="no-padding"><b>Utilidad(20%):</b></td>
                            <td class="no-padding right-align">400.00 $</td>
                        </tr>
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
                <form id="form_editar_pqt" name="form_editar_pqt" class="col s12" action="{{route('editar_paquete_cotizacion_path')}}" method="post" enctype="multipart/form-data">
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
                            <input placeholder="Ingrese el titulo del paquete" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="{{$paquete_->duracion}}">
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
                            {{csrf_field()}}
                            <input type="text" name="paquete_id" id="paquete_id" value="{{$paquete_->id}}">
                            <button class="btn waves-effect waves-light" type="submit" name="action" id="action">Modificar
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
                <form id="formDestinos" name="formDestinos" class="col s12" action="{{route('editar_destinos_cotizacion_path')}}" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <?php $i=0;?>
                        @foreach($destinos as $destin)
                            <?php $i++; $si=0;?>
                            @foreach($paquete_->destinos as $destinoCoti)
                                @if($destin->destino==$destinoCoti->destino)
                                        <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" checked="checked" value="{{$destin->destino}}"/>
                                        <label for="destino_{{$i}}" class="padding-left-5">{{$destin->destino}}</label>
                                    <?php $si=1;?>
                                @endif
                            @endforeach
                            @if($si==0)
                                    <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" value="{{$destin->destino}}"/>
                                    <label for="destino_{{$i}}" class="padding-left-5">{{$destin->destino}}</label>
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