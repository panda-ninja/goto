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
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper text-darken-1">2. Configurar Paquete</a>
                </div>

            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_pending_path')}}" class="valign-wrapper text-darken-1 not-active">3. Itinerario y servicios</a>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row spacer-10">--}}
    {{--<div class="col s12 center">--}}
    {{--<h4>Configuracion del paquete</h4>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="row spacer-10">
        <div class="col s12 center">
            <h4>Configuracion del paquete</h4>
            @foreach($cliente as $cliente_)
                <p><b><i class="mdi-communication-email cyan-text text-darken-2"></i></b> {{$cliente_->email}} <b>|</b> <b><i class="mdi-social-person cyan-text text-darken-2"></i></b> {{$cliente_->nombres}}, {{$cliente_->apellidos}} <b>|</b> <b><i class="mdi-social-group-add cyan-text text-darken-2"></i></b> {{$nropasajeros}} <b>|</b> <b><i class="mdi-editor-insert-invitation cyan-text text-darken-2"></i></b> {{$fecha_nombre}}</p>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="col s12">
                <h5 class="grey-text text-darken-1">Datos de paquete</h5>
                <div class="divider"></div>
                <p class="text-12">Usted puede buscar y cargar datos de un paquete almacenado en nuestra base de datos y poder modificarlos segun sus necesidades o crear un paquete totalmente nuevo</p>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="{{route('cotizacion_buscar_plan_path')}}" method="post">
            <div class="col s12 valign-wrapper">
                <div class="input-field col s6">
                    <input id="codigo" name="codigo" type="text" class="validate" placeholder="codigo o titulo del paquete">
                    <label class="active" for="first_name2">Nombre o codigo del paquete (Cargar datos del paquete si se requiere)</label>
                </div>
                {{--<div class="col s2">--}}
                {{--<a class="waves-effect waves-light  btn"><i class="left mdi-action-search"></i> Buscar</a>--}}
                {{--</div>--}}
                <div class="col s6">
                    <input type="hidden" name="cotizacion_id" id="cotizacion_id" value="{{$cotizacion_id}}">
                    @foreach($cliente as $cliente_)
                        <input type="hidden" name="cliente_id" id="cliente_id" value="{{$cliente_->id}}">
                    @endforeach
                    {{csrf_field()}}
                    <button type="submit" class="waves-effect waves-light  btn"><i class="left mdi-action-search"></i> Buscar</button>
                    {{--<a class="waves-effect waves-light  btn"><i class="left mdi-editor-insert-chart"></i> </a>--}}
                </div>
            </div>
        </form>
    </div>

    {{--<div class="fixed-action-btn">--}}
    {{--<a class="btn-floating btn-large red">--}}
    {{--<i class="large mdi-content-save"></i>--}}
    {{--</a>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col s9">
            <div class="row">
                <div class="col s12">
                    <h5 class="grey-text text-darken-1">Personalizar paquete</h5>
                    <div class="divider"></div>
                    <p class="text-12">El codigo el paquete tiene que ser unico te ayudaremos a filtrar los codigos disponibles.</p>
                </div>
            </div>
            <div class="row">
                <form id="formPackage">
                    <div class="row">
                        <div class="input-field col s3">
                            <input placeholder="Ingrese el codigo del paquete" id="codigo_txt" name="codigo_txt" type="text" class="validate">
                            <label for="codigo_txt">Codigo</label>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Duracion del paquete" id="duracion_txt" name="duracion_txt" type="number" min="1" max="99" step="1" class="validate">
                            <label for="duracion_txt">Duracion</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Ingrese el titulo del paquete" id="titulo_txt" name="titulo_txt" type="text" class="validate">
                            <label for="titulo_txt">Titulo</label>
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
                            <button class="btn waves-effect waves-light" type="submit" name="action">Continuar
                                <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="col s3">
            <div class="row">
                <div class="col s12">
                    <h5 class="grey-text text-darken-1">Destinos paquete</h5>
                    <div class="divider"></div>
                    <p class="text-12">Seleccione los destinos para este paquete.</p>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                    <label for="filled-in-box">Lima</label>
                </div>
                <div class="col s12">
                    <input type="checkbox" class="filled-in" id="filled-in-box" />
                    <label for="filled-in-box">Cusco</label>
                </div>
                <div class="col s12">
                    <input type="checkbox" class="filled-in" id="filled-in-box" />
                    <label for="filled-in-box">Machu picchu</label>
                </div>
                <div class="col s12">
                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                    <label for="filled-in-box">Ballestas island and paracas</label>
                </div>
                <div class="col s12 margin-top-10">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Agregar Destinos
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


@stop