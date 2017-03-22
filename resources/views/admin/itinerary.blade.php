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
                    <a href="" class="tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar datos basicos del paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a>
                </h4>

                <p><b>Nombre:</b> Hidalgo | <b>Nro Pasajeros:</b> 2 | <b>Fecha de viaje:</b> 27 jun, 2017 | <b>Duracion:</b> 2 dias</p>
                <p class="left-align">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur autem dolorem dolores enim expedita explicabo fugiat harum hic ipsum labore nobis odio odit officia omnis, perferendis provident quisquam reiciendis!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="col s12">
                <h5 class="grey-text text-darken-1">Destinos <a href="" class="tooltipped right text-12" data-position="bottom" data-delay="50" data-tooltip="Editar destinos para este paquete"><i class="mdi-editor-mode-edit valign text-18 left"></i></a></h5>
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
                        <a href="" class="tooltipped right text-12 green-text" data-position="bottom" data-delay="50" data-tooltip="Agregar nuevo itinerario"><i class="mdi-av-my-library-add text-18 left"></i></a>
                        <a href="" class="tooltipped right text-12 blue-text" data-position="bottom" data-delay="50" data-tooltip="Agregar itinerario de nuestra base de datos"><i class="mdi-av-my-library-books text-18 left"></i></a>
                    </h5>
                    <div class="divider"></div>
                    <p class="text-12">Usted puede buscar y cargar datos de un paquete almacenado en nuestra base de datos y poder modificarlos segun sus necesidades o crear un paquete totalmente nuevo</p>

            </div>
            <div class="col s12">
                <div class="column">

                    <div class="portlet">
                        <div class="portlet-header">Dia 1: City Tous
                            <span class="right">$1200.00</span>
                            <a href="" class="blue-text"><i class="mdi-editor-mode-edit"></i></a>
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
                                            <td class="no-padding right-align"><a href="" class="text-12 blue-text"><i>Agregar nuevo servicio +</i></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col s6 ">
                                    <p class="no-margin orange-text text-darken-1">
                                        <b>Comentarios u observaciones</b>
                                        <a href="" class="blue-text"><i class="mdi-editor-mode-edit"></i></a>
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
                <h5 class="grey-text text-darken-1">Precios</h5>
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
                            <td class="no-padding"><b>Utilidad:</b></td>
                            <td class="no-padding right-align">400.00 $</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



@stop