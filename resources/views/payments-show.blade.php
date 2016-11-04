@extends('layouts.dashboard')

@section('content')
    {{$pago->concepto}}


    <div class="row">

        <form class="col s12" action="{{route('payments_store_path',$pago->id)}}" method="post" id="checkout-form">
            <div class="row">
                <div class="col s12">
                    <div id="charge-error" class="alert alert-danger">
                        {{Session::get('success')}}
                    </div>
                    <!--<span class="payment-errors"></span>-->
                </div>
                <div class="col s12">
                    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden': ''}}">
                         {{Session::get('error')}}
                    </div>
                    <!--<span class="payment-errors"></span>-->
                </div>
            </div>
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
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->email}}">
                            <label for="first_name">Email</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nombres}}">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->apellidos}}">
                            <label for="first_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="first_name">Pasaporte</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="first_name">Nacionalidad</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="first_name">Residencia</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="first_name">Street Address</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="first_name">Country</label>
                        </div>
                        <div class="input-field col s4">
                            <input  id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="first_name">State</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input  id="first_name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="first_name">City</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="address_zip" type="text" class="validate" value="123">
                            <label for="address_zip">Zip</label>
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
                            <input  id="name_card" type="text" class="validate" >
                            <label for="name_card">Name on the card</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="card_type" type="text" class="validate" >
                            <label for="card_type">Card Type</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="card_number" type="text" data-stripe="number">
                            <label for="card_number">Card Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="card-cvc" type="text" class="validate" data-stripe="cvc">
                            <label for="card-cvc">Validation Code</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3">
                            <input type="text" id="card-expiry-month" data-stripe="exp-month">
                            <label for="card-expiry-month">Expiration month (MM)</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="card-expiry-year" data-stripe="exp-year">
                            <label for="card-expiry-year">Expiration year(YYYY)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            {{csrf_field()}}
                            <button class="btn waves-effect waves-light" type="submit" value="Submit Payment" name="action">SUBMIT PAYMENT
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>



        </form>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection
