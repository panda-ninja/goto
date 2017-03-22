@extends('layouts.admin')

@section('content')

    <div class="row margin-top-20">
        <div class="col s12">
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 ">
                    <a href="{{route('quotes_path')}}" class="valign-wrapper text-darken-1">1. Datos basicos</a>
                </div>
            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper text-darken-1 not-active">2. Configurar Paquete</a>
                </div>

            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
                    <a href="{{route('quotes_pending_path')}}" class="valign-wrapper text-darken-1 not-active">3. Itinerario y servicios</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row spacer-10">
        <div class="col s12 center">
            <h4>Escoja una opcion</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if($estadoMensaje==1)
                {{$mensaje}}
            @elseif($estadoMensaje==0)
                {{$mensaje}}
            @elseif($estadoMensaje==-1)
                {{$mensaje}}
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-content">
                <span>Datos del cliente:</span>
                @foreach($cliente as $cliente_)
                    <div class="row">
                        <div class="col-lg-4"><span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> {{$cliente_->nombres}} {{$cliente_->apellidos}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-communication-email cyan-text text-darken-2"></i> {{$cliente_->email}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{$cliente_->telefono}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span><i class="mdi-communication-email cyan-text text-darken-2"></i> {{$cliente_->nacionalidad}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{$cliente_->sexo}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-communication-email cyan-text text-darken-2"></i> {{$cliente_->pasaporte}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-editor-insert-invitation cyan-text text-darken-2"></i> {{$fecha}}</span></div>
                        <div class="col-lg-4"><span><i class="mdi-social-group-add cyan-text text-darken-2"></i> {{$nropasajeros}}</span></div>
                        mdi-social-person

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row margin-top-20">
        <div class="col s6">
            <a type="submit" class="waves-effect waves-light  btn">
                <img src="{{asset('images/ingresar-datos-basicos.png')}}" class="img-responsive" alt="">
            </a>
        </div>
        <div class="col s6 center">
            <a type="submit" class="waves-effect waves-light  btn">
                <img src="{{asset('images/ingresar-datos-basicos.png')}}" class="img-responsive" alt="">
            </a>

        </div>
    </div>

@stop