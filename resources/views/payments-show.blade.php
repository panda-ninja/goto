@extends('layouts.dashboard')

@section('content')
    {{$pago->concepto}}


    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12 tabs-detail">
                    <ul class="tabs" >
                        <li class="tab col s3"><a class="active" href="#test1" ><span class="teal-text text-accent-5">1. Customer Information</span> </a></li>
                        <li class="tab col s3"><a href="#test2" ><span class="teal-text text-accent-5">2. Payment Information</span></a></li>
                    </ul>
                </div>
                <div id="test1" class="col s12">
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
                    <div class="row">
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="first_name">Street Address</label>
                        </div>
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="first_name">Country</label>
                        </div>
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="first_name">State</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="first_name">City</label>
                        </div>
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="first_name">Zip</label>
                        </div>
                        <div class="input-field col s4">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="first_name">Telefone</label>
                        </div>
                    </div>
                </div>
                <div id="test2" class="col s12
                ">
                    <div class="row ">
                        <div class="input-field col s6 ">
                            <input  id="first_name" type="text" class="validate" >
                            <label for="first_name">Name on the card</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="first_name" type="text" class="validate" >
                            <label for="first_name">Card Type</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="first_name" type="text" data-stripe="number">
                            <label for="first_name">Card Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="first_name" type="text" class="validate" data-stripe="cvc">
                            <label for="first_name">Validation Code</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3">
                            <input type="text" data-stripe="exp-month">
                            <label for="first_name">Expiration month (MM)</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" data-stripe="exp-year">
                            <label for="first_name">Expiration year(YYYY)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="btn waves-effect waves-light" type="submit" name="action">SUBMIT PAYMENT
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>



        </form>
    </div>


@stop