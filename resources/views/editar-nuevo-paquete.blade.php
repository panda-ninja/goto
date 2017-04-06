@extends('layouts.admin')

@section('content')

    <div class="row margin-top-20">
        <div class="col s12">
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper text-darken-1">1. Configurar Paquete</a>
                </div>

            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_pending_path')}}" class="valign-wrapper text-darken-1 not-active">2. Itinerario y servicios</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row spacer-10">
        <div class="col s12 center">
            <h4>Editar paquete</h4>
        </div>
    </div>


    <form action="{{route('editar_nuevo_paquete_itis_path')}}" method="post">
        @foreach($paquetes as $paquete)
            <div class="row">
                <div class="col s9">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="grey-text text-darken-1">Editar paquete</h5>
                            <div class="divider"></div>
                            <p class="text-12">El codigo el paquete tiene que ser unico te ayudaremos a filtrar los codigos disponibles.</p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="row">
                            <div class="input-field col s3">
                                <input placeholder="Ingrese el codigo del paquete" id="codigo_txt" name="codigo_txt" type="text" class="validate" value="{{$paquete->codigo}}">
                                <label for="codigo_txt">Codigo</label>
                            </div>
                            <div class="input-field col s3">
                                <input placeholder="Duracion del paquete" id="duracion_txt" name="duracion_txt" type="number" min="1" max="99" step="1" class="validate"  value="{{$paquete->duracion}}">
                                <label for="duracion_txt">Duracion</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Ingrese el titulo del paquete" id="titulo_txt" name="titulo_txt" type="text" class="validate" value="{{$paquete->titulo}}">
                                <label for="titulo_txt">Titulo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea">{{$paquete->descripcion}}</textarea>
                                <label for="descipcion_txt" class="">Descipcion del paquete</label>
                            </div>
                            <div class="input-field col s6">
                                <textarea id="opcional_txt" name="opcional_txt" class="materialize-textarea">{{$paquete->opcional}}</textarea>
                                <label for="opcional_txt" class="">Opcional</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <textarea id="icon_prefix2" name="incluye_txt" class="materialize-textarea">{{$paquete->incluye}}</textarea>
                                <label for="icon_prefix2" class="">Incluye</label>
                            </div>
                            <div class="input-field col s6">
                                <textarea id="incluye_txt" name="noincluye_txt" class="materialize-textarea">{{$paquete->noincluye}}</textarea>
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
                                {{csrf_field()}}
                                <input type="hidden" name="paquete_id" id="paquete_id" value="{{$paquete->id}}">
                                <input type="hidden" name="cotizacion_id" id="cotizacion_id" value="0">
                                <input type="hidden" name="cliente_id" id="cliente_id" value="0">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Continuar
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>

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
                        <?php $i=0;?>
                        @foreach($destinos as $destino)
                                <?php $i++;$si=0;?>
                                @foreach($paquete->destinos as $destinop)
                                    @if($destinop->destino==$destino->destino)
                                        <?php $si=1;?>
                                        <div class="col s12">
                                            <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" value="{{$destino->destino}}" checked="checked"/>
                                            <label for="destino_{{$i}}">{{$destino->destino}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            @if($si==0)
                                <div class="col s12">
                                    <input type="checkbox" name="destino[]" class="filled-in" id="destino_{{$i}}" value="{{$destino->destino}}"/>
                                    <label for="destino_{{$i}}">{{$destino->destino}}</label>
                                </div>
                            @endif
                        @endforeach
                        {{--<div class="col s12 margin-top-10">--}}

                        {{--<button class="btn waves-effect waves-light" type="submit" name="action">Agregar Destinos--}}
                        {{--<i class="mdi-content-send right"></i>--}}
                        {{--</button>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </form>
@stop