@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <form class="col s12" action="{{route('payments_store_path',$pago->id)}}" method="post" id="checkout-form">
            <div class="row card-panel teal lighten-4">
                <div class="col s4">
                    @if($pago->estado==0)
                        <a class="waves-effect waves-light btn center-align"><i class="material-icons left">payment</i><b>Pending</b></a>
                    @else
                        <a class="waves-effect waves-light btn center-align"><i class="material-icons left">done_all</i><b>Paid out</b></a>
                    @endif
                </div>
                <div class="col s5">
                    <p class="no-padding grey-text text-darken-3 center-align"><b>
                        {{$pago->concepto}}</b>
                    </p>
                </div>
                <div class="col s1">
                    <p class="no-padding yellow-text text-darken-3 center-align"><b>Monto: {{$pago->monto}}</b></p>
                </div>
                @if($pago->estado==1)
                    <div class="col s3">
                        <p class="no-padding green-text text-darken-3 center-align">
                            <b>Vence: {{$pago->vencimiento}}</b>
                        </p>

                    </div>
                @else
                    <div class="col s3">
                        <p class="no-padding green-text text-darken-3 center-align">
                            <b>Vence: {{$pago->vencimiento}}</b>
                        </p>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col s12">
                    <div id="charge-success" name="charge-success" class="success-box card-panel green lighten-5  green-text text-darken-4 {{ !Session::has('success') ? 'hide': ''}}">
                        {{Session::get('success')}}
                    </div>
                    <!--<span class="payment-errors"></span>-->
                </div>
                <div class="col s12">
                    <div id="charge-error" class="error-box card-panel red lighten-5  red-text text-darken-4 {{ !Session::has('error') ? 'hide': ''}}">
                         {{Session::get('error')}}
                    </div>
                    <!--<span class="payment-errors"></span>-->
                </div>
            </div>
            @if($pago->estado==0)
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
                            <input id="email" name="email" type="text" class="validate" value="{{auth()->guard('cliente')->user()->email}}">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="first-name" name="first-name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nombres}}">
                            <label for="first-name">First Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last-name" name="last-name" type="text" class="validate" value="{{auth()->guard('cliente')->user()->apellidos}}">
                            <label for="last-name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="pasaporte" name="pasaporte" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="pasaporte">Pasaporte</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="nacionalidad" name="nacionalidad" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="nacionalidad">Nacionalidad</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="residencia" name="residencia" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="residencia">Residencia</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="street-address" name="street-address"  type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="street-address">Street Address</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="country" name="country" type="text" class="validate" value="{{auth()->guard('cliente')->user()->nacionalidad}}">
                            <label for="country">Country</label>
                        </div>
                        <div class="input-field col s4">
                            <input  id="state" name="state" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="state">State</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input  id="city" name="city" type="text" class="validate" value="{{auth()->guard('cliente')->user()->pasaporte}}">
                            <label for="city">City</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="address_zip" name="address_zip" type="text" class="validate" value="34638">
                            <label for="address_zip">Zip</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="telefono" name="telefono" type="text" class="validate" value="{{auth()->guard('cliente')->user()->residencia}}">
                            <label for="telefono">Telefone</label>
                        </div>
                    </div>
                </div>
                <div id="test2" class="col s12">

                    <div class="row ">
                        <div class="input-field col s6 ">
                            <input  name="amount" id="amount" type="text" value="130" class="validate" >
                            <label for="amount">Amount</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6 ">
                            <input  id="name-card" name="name-card" type="text" value="Visa" class="validate" >
                            <label for="name-card">Name on the card</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <select id="card-type" name="card-type">
                                <option value="Visa">Visa</option>
                                <option value="Visa(debit)">Visa(debit)</option>
                                <option value="MasterCard">MasterCard</option>
                                <option value="MasterCard (debit)">MasterCard (debit)</option>
                                <option value="MasterCard (prepaid)">MasterCard (prepaid)</option>
                                <option value="Amecican Express">Amecican Express</option>
                                <option value="Discover">Discover</option>
                                <option value="Diners Club">Diners Club</option>
                                <option value="JCB">JCB</option>
                                <option value="Otros">Otros</option>
                            </select>
                            <label for="card-type">Card Type</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="card-number" name="card-number" type="text" value="4242424242424242" data-stripe="number">
                            <label for="card-number">Card Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="card-cvc" name="card-cvc" type="text" value="123" class="validate" data-stripe="cvc">
                            <label for="card-cvc">Validation Code</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3">
                            <input type="text" id="card-expiry-month" name="card-expiry-month" value="12" data-stripe="exp-month">
                            <label for="card-expiry-month">Expiration month (MM)</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="card-expiry-year" name="card-expiry-year" value="2018" data-stripe="exp-year">
                            <label for="card-expiry-year">Expiration year(YYYY)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            {{csrf_field()}}

                            <button class="btn waves-effect waves-light" type="submit" value="Submit Payment" id="pago" name="pago">SUBMIT PAYMENT
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif


        </form>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection
