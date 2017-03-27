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
    <form action="{{route('paquete_proposals_path')}}" method="post">
    <div class="row">

        <div class="col s7">
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
                                <div class="portlet-header">Dia <span class="pos_iti" name="posdia[]" id="pos_dia_{{$pos}}">{{$pos}}</span>: <span id="titulo_iti_{{$itinerario->id}}">{{$itinerario->titulo}}</span>
                                    <input class="precio_itinerario" type="hidden" name="precio_itinerario[]" id="precio_itinerario_{{$pos}}" value="{{$itinerario->precio}}"><span class="right">$ {{$itinerario->precio}}</span>
                                    <a href="#modal_edit_{{$itinerario->id}}" class="modal-trigger blue-text"><i class="mdi-editor-mode-edit"></i></a>
                                    <a href="#!" class="red-text" onclick="borrarItinerario({{$pos}},{{$itinerario->id}})"><i class="mdi-action-delete"></i></a>
                                </div>
                                <div class="portlet-content col s12 " style="display: none">
                                    <p class="no-margin" id="descrp_{{$itinerario->id}}">{{$itinerario->descripcion}}</p>
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
                                                {{--<a href="#modal_add_com" class="modal-trigger green-text "><i class="mdi-content-add-box"></i></a>--}}
                                                <a href="#modal_edit_com_{{$itinerario->id}}" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>
                                                <a href="" class="red-text"><i class="mdi-action-delete"></i></a>
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
                                            <div class="row spacer-20 ">
                                                <div class="col s4">
                                                    <div class="row">
                                                        <div class="col s12" id="response_tinerario"></div>
                                                    </div>
                                                </div>
                                                <div class="col s8 right">
                                                    <div class="row right">
                                                        <div class="col s12">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="itinerario_id" id="itinerario_id" value="{{$itinerario->id}}">
                                                            <a class="btn waves-effect waves-light"  onclick="enviar({{$itinerario->id}})" name="action_itinerario" id="action_itinerario_{{$itinerario->id}}">Agregar
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
                        <div id="modal_edit_com_{{$itinerario->id}}" class="modal">
                            <div class="modal-content">
                                <form id="form_editar_itinerario_obs_{{$itinerario->id}}" name=form_editar_itinerario_obs_{{$itinerario->id}}" class="col s12"  method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col s12">
                                            <h5 class="center">Editar Comentario u observacion</h5>
                                            <div class="divider margin-bottom-20"></div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="input-field col s12">
                                            <textarea id="obs_txt" name="obs_txt" class="materialize-textarea">{{$itinerario->observaciones}}</textarea>
                                            <label for="obs_txt" class="">Comentario</label>
                                        </div>
                                    </div>
                                    <div class="row spacer-20 right">
                                        <div class="col s12">
                                            {{csrf_field()}}
                                            <input type="hidden" name="itinerario_id" id="itinerario_id" value="{{$itinerario->id}}">
                                            <a class="btn waves-effect waves-light" onclick="enviar_obs({{$itinerario->id}})" name="action" id="action_itinerario_obs_{{$itinerario->id}}">Agregar
                                                <i class="mdi-content-send right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
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
            ?>
                @foreach($paquete_->precio_paquetes as $precio)
                    @if($precio->estrellas==2)
                    <?php
                        $precio_t_2=$precio->precio_t;
                        $precio_d_2=$precio->precio_m;
                        $precio_m_2=$precio->precio_d;
                        $precio_s_2=$precio->precio_s;
                        $precio_id2=$precio->id;
                    ?>
                    @endif
                    @if($precio->estrellas==3)
                        <?php
                        $precio_t_3=$precio->precio_t;
                        $precio_d_3=$precio->precio_m;
                        $precio_m_3=$precio->precio_d;
                        $precio_s_3=$precio->precio_s;
                        $precio_id3=$precio->id;
                        ?>
                    @endif
                    @if($precio->estrellas==4)
                        <?php
                        $precio_t_4=$precio->precio_t;
                        $precio_d_4=$precio->precio_m;
                        $precio_m_4=$precio->precio_d;
                        $precio_s_4=$precio->precio_s;
                        $precio_id4=$precio->id;
                        ?>
                    @endif
                    @if($precio->estrellas==5)
                        <?php
                        $precio_t_5=$precio->precio_t;
                        $precio_d_5=$precio->precio_m;
                        $precio_m_5=$precio->precio_d;
                        $precio_s_5=$precio->precio_s;
                        $precio_id5=$precio->id;
                        ?>
                    @endif
                @endforeach
                <div class="col s12">
                    <table class="table stripe">
                        <thead>
                            <tr>
                                <th>ROOMS</th>
                                <th>ACOMODACION</th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_2" id="vstar_2" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star2" value="2" onclick="pasartotal(2)">
                                        <label for="star2">2 STARS</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_3" id="vstar_3" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star3" value="3" onclick="pasartotal(3)">
                                        <label for="star3">3 STARS</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_4" id="vstar_4" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star4" value="4" onclick="pasartotal(4)">
                                        <label for="star4">4 STARS</label>
                                    </div>
                                </th>
                                <th >
                                    <div class="col s12">
                                        <input type="hidden" name="vstar_5" id="vstar_5" value="0">
                                        <input type="checkbox" name="star[]" class="filled-in" id="star5" value="5" onclick="pasartotal(5)">
                                        <label for="star5">5 STARS</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input type="number" name="acom_t" id="acom_t" min="0" value="0" onchange="acomodacion()">
                            </td>
                            <th><i class="mdi-maps-local-hotel text-30"></i><i class="mdi-maps-local-hotel text-30"></i><i class="mdi-maps-local-hotel text-30"></i></th>
                            <td>
                                <input type="number" name="t_2" id="t_2" min="0" value="{{$precio_t_2}}"  onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="t_3" id="t_3" min="0" value="{{$precio_t_3}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="t_4" id="t_4" min="0" value="{{$precio_t_4}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="t_5" id="t_5" min="0" value="{{$precio_t_5}}" onchange="acomodacion()">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="acom_d" id="acom_d" min="0" value="0" onchange="acomodacion()">
                            </td>
                            <th><i class="mdi-maps-local-hotel text-30"></i><i class="mdi-maps-local-hotel text-30"></i></th>
                            <td>
                                <input type="number" name="d_2" id="d_2" min="0" value="{{$precio_d_2}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="d_3" id="d_3" min="0" value="{{$precio_d_3}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="d_4" id="d_4" min="0" value="{{$precio_d_4}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="d_5" id="d_5" min="0" value="{{$precio_d_5}}" onchange="acomodacion()">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="acom_m" id="acom_m" min="0" value="0" onchange="acomodacion()">
                            </td>
                            <th><i class="mdi-maps-local-hotel text-30"></i><i class="mdi-maps-local-hotel text-30"></i></th>
                            <td>
                                <input type="number" name="m_2" id="m_2" min="0" value="{{$precio_m_2}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="m_3" id="m_3" min="0" value="{{$precio_m_3}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="m_4" id="m_4" min="0" value="{{$precio_m_4}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="m_5" id="m_5" min="0" value="{{$precio_m_5}}" onchange="acomodacion()">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="acom_s" id="acom_s" min="0" value="0" onchange="acomodacion()">
                            </td>
                            <th><i class="mdi-maps-local-hotel text-30"></i></th>
                            <td>
                                <input type="number" name="s_2" id="s_2" min="0" value="{{$precio_s_2}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="s_3" id="s_3" min="0" value="{{$precio_s_3}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="s_4" id="s_4" min="0" value="{{$precio_s_4}}" onchange="acomodacion()">
                            </td>
                            <td>
                                <input type="number" name="s_5" id="s_5" min="0" value="{{$precio_s_5}}" onchange="acomodacion()">
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

                    <input type="text" name="totalItinerario" id="totalItinerario" value="{{$totalItinerario}}">
                    <input type="hidden" name="cliente_id" id="cliente_id" value="{{$cliente->id}}">

                    <button class="btn waves-effect waves-light green" type="submit" name="action">Terminar
                        <i class="mdi-content-save right"></i>
                    </button>
                </div>
        </div>
        <div class="col s5">
            <div class="col s12">
                <h5 class="grey-text text-darken-1">Precios
                    <a href="#modal_add_uti" class="modal-trigger tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Definir porcentaje de utilidad"><i class="mdi-action-trending-up text-18 left"></i></a>
                </h5>
                <div class="divider margin-bottom-20"></div>
                <div class="card-panel grey lighten-5 z-depth-1">
                    <table>
                        <thead>
                        <tr>
                            <th class="no-padding"><b>Categoria:</b></th>
                            <th class="no-padding right-align">2 STARS</th>
                            <th class="no-padding right-align">3 STARS</th>
                            <th class="no-padding right-align">4 STARS</th>
                            <th class="no-padding right-align">5 STARS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="no-padding"><b>Costo:</b></td>
                            <td class="no-padding right-align">$ <span id="ptotal2">0</span><input type="hidden" id="nptotal_2" name="nptotal_2" value="0"></td>
                            <td class="no-padding right-align">$ <span id="ptotal3">0</span><input type="hidden" id="nptotal_3" name="nptotal_3" value="0"></td>
                            <td class="no-padding right-align">$ <span id="ptotal4">0</span><input type="hidden" id="nptotal_4" name="nptotal_4" value="0"></td>
                            <td class="no-padding right-align">$ <span id="ptotal5">0</span><input type="hidden" id="nptotal_5" name="nptotal_5" value="0"></td>
                        </tr>
                        <tr>
                            <td class="no-padding"><b>Utilidad %:</b></td>
                            <td class="right-align"><input type="number" name="utilidad_2" id="utilidad_2" min="0" max="40" value="0" onchange="utilidad(2)"></td>
                            <td class="right-align"><input type="number" name="utilidad_3" id="utilidad_3" min="0" max="40" value="0" onchange="utilidad(3)"></td>
                            <td class="right-align"><input type="number" name="utilidad_4" id="utilidad_4" min="0" max="40" value="0" onchange="utilidad(4)"></td>
                            <td class="right-align"><input type="number" name="utilidad_5" id="utilidad_5" min="0" max="40" value="0" onchange="utilidad(5)"></td>
                        </tr>
                        <tr>
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