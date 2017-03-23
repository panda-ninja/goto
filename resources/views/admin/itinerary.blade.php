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

    <div class="row margin-top-10">
        <div class="col s12 center">
            <div class="col s12">
                <h4 class="center">GTP500: CUSCO CITY TOUR PRIVATE
                    <a href="#packages_modal" class="modal-trigger tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar datos basicos del paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a>
                </h4>

                <p><b>Nombre:</b> Hidalgo | <b>Nro Pasajeros:</b> 2 | <b>Fecha de viaje:</b> 27 jun, 2017 | <b>Duracion:</b> 2 dias</p>
                <p class="left-align">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur autem dolorem dolores enim expedita explicabo fugiat harum hic ipsum labore nobis odio odit officia omnis, perferendis provident quisquam reiciendis!</p>
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

                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                <label for="filled-in-box" class="padding-left-5">Cusco</label>

                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                <label for="filled-in-box">Machu picchu</label>

                <input type="checkbox" class="filled-in" id="filled-in-box" />
                <label for="filled-in-box">Valle Sagrado</label>

                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                <label for="filled-in-box">Ballestas island and paracas</label>

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
                <div class="column">

                    <div class="portlet">
                        <div class="portlet-header">Dia 1: City Tous
                            <span class="right">$1200.00</span>
                            <a href="#modal_edit" class="modal-trigger blue-text"><i class="mdi-editor-mode-edit"></i></a>
                            <a href="" class="red-text"><i class="mdi-action-delete"></i></a>
                        </div>
                        <div class="portlet-content col s12">
                            <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error itaque iusto, nesciunt perspiciatis quisquam ratione ut voluptatibus! Laboriosam necessitatibus nobis ullam veritatis! Asperiores aspernatur delectus, laboriosam modi natus quis ullam.</p>
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
                                        <tbody>
                                        <tr>
                                            <td>Transfer</td>
                                            <td>1200.00</td>
                                            <td class="right-align">
                                                <a href="" class="blue-text"><i class="mdi-editor-mode-edit"></i></a>
                                                <a href="" class="red-text"><i class="mdi-action-delete"></i></a>
                                            </td>
                                        </tr>
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
                                    <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut cupiditate delectus et quas quo recusandae reprehenderit sint velit veniam? Beatae distinctio eaque laborum magni minima? Ex molestiae quis veniam!</p>
                                    {{--<div class="input-field">--}}
                                        {{--<textarea id="textarea1" class="materialize-textarea"></textarea>--}}
                                        {{--<label for="textarea1">Textarea</label>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet">
                        <div class="portlet-header">Dia 2: Sacred Valley</div>
                        <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
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
                    <div id="modal_edit" class="modal">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12">
                                    <h5 class="center">Modificar itinerario</h5>
                                    <div class="divider margin-bottom-20"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="City Tours">
                                    <label for="titulo_txt">Titulo</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error itaque iusto, nesciunt perspiciatis quisquam ratione ut voluptatibus! Laboriosam necessitatibus nobis ullam veritatis! Asperiores aspernatur delectus, laboriosam modi natus quis ullam.</textarea>
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
                                    <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut cupiditate delectus et quas quo recusandae reprehenderit sint velit veniam? Beatae distinctio eaque laborum magni minima? Ex molestiae quis veniam!</textarea>
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


                </div>
            </div>

            <div class="col s12">

                <h5 class="grey-text text-darken-1">Categoria y acomodacion</h5>
                <div class="divider"></div>
                <p class="text-12">Usted puede buscar y cargar datos de un paquete almacenado en nuestra base de datos y poder modificarlos segun sus necesidades o crear un paquete totalmente nuevo</p>

            </div>

            <div class="col s12 right-align">
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
                <form id="formPackage" class="col s12" action="{{route("admin_itinerary_path")}}" method="get">
                    <div class="row">
                        <div class="input-field col s3">
                            <input placeholder="Ingrese el codigo del paquete" id="codigo_txt" name="codigo_txt" type="text" class="validate">
                            <label for="codigo_txt" class="active">Codigo</label>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Duracion del paquete" id="duracion_txt" name="duracion_txt" type="number" min="1" max="99" step="1" class="validate">
                            <label for="duracion_txt" class="active">Duracion</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Ingrese el titulo del paquete" id="titulo_txt" name="titulo_txt" type="text" class="validate">
                            <label for="titulo_txt" class="active">Titulo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea"></textarea>
                            <label for="descipcion_txt" class="">Descipcion del paquete</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea id="opcional_txt" name="opcional_txt" class="materialize-textarea"></textarea>
                            <label for="opcional_txt" class="">Opcional</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2" class="">Incluye</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea id="incluye_txt" name="opcional_txt" class="materialize-textarea"></textarea>
                            <label for="incluye_txt" class="">No incluye</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 input-field">
                            <p class="grey-text">Agregue una imagen</p>
                            <input type="file" id="imagen" name="imagen" class="dropify" data-default-file=""/>
                        </div>
                    </div>
                    <div class="row margin-top-20 right">
                        <div class="col s12">
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
                <form id="formPackage" class="col s12" action="{{route("admin_itinerary_path")}}" method="get">
                    <div class="row">
                        <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                        <label for="filled-in-box" class="padding-left-5">Cusco</label>

                        <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                        <label for="filled-in-box">Machu picchu</label>

                        <input type="checkbox" class="filled-in" id="filled-in-box" />
                        <label for="filled-in-box">Valle Sagrado</label>

                        <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                        <label for="filled-in-box">Ballestas island and paracas</label>
                    </div>

                    <div class="row margin-top-20 right">
                        <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Modificar
                                <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@stop