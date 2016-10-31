@extends('layouts.dashboard')

@section('content')
    {{$pago->concepto}}
    <div class="row">
        <form class="col s12">

            <div class="row">
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->email}}">
                    <label for="first_name">Email</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nombres}}">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->apellidos}}">
                    <label for="first_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                    <label for="first_name">Pasaporte</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                    <label for="first_name">Nacionalidad</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                    <label for="first_name">Residencia</label>
                </div>
            </div>
        </form>
    </div>


@stop