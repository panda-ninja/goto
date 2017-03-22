@extends('layouts.admin')

@section('content')
    <div class="row margin-top-20">
        <div class="col s12">
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10 active">
                    <a href="{{route('quotes_path')}}" class="valign-wrapper text-darken-1">1. Datos basicos</a>
                </div>
            </div>
            <div class="col s4 no-padding">
                <div class="tab-qoutes center padding-10">
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
            <h4>Ingrese datos del basicos del pasajero</h4>
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
    <div class="row margin-top-20">
        <div class="col s6">
            <form class="formValidate" id="formValidate" method="post" action="{{route('cotizacion_crear_plan_path')}}">
                <div class="row">

                    <div class="input-field col s12">
                        <label for="email3">E-Mail *</label>
                        <input id="email3" type="email" name="email3"  placeholder="Email del cliente">
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="number" type="number"  name="nropasajeros" class="validate" placeholder="Number travelers" min="1" max="99" step="1">
                            <label for="number">Number travelers</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="2015-01-01" name="fecha" id="date" type="date" class="datepicker">
                            <label for="date">Date</label>
                        </div>
                    </div>

                    <div class="input-field col s12">
                        {{csrf_field()}}
                        <button class="btn waves-effect waves-light right submit" type="submit" name="action">Continuar
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col s6 center">
            <img src="{{asset('images/ingresar-datos-basicos.png')}}" class="img-responsive" alt="">
        </div>
    </div>

@stop