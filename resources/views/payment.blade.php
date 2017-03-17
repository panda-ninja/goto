@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col s12">
            @if(Session::get('success'))
                <div class="card-panel light-blue darken-1 center-align">
                    <h5 class="white-text">{{Session::get('success')}}</h5>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s12 font-moserrat">
            <h5><b>MODULO DE PAGOS</b></h5>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <table class="table striped">
                <tr>
                    <td><b>Hidalgo ch Pnce</b></td>
                    <td><b>Arrival date:</b> 2017-05-25</td>
                </tr>
                <tr>
                    <td><b>Number of traveler</b></td>
                    <td>2</td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td>Total</td>
                </tr>
                <tr>
                    <td><b>Number of payments</b></td>
                    <td>
                        <select class="browser-default">
                            {{--<option value="" disabled selected>Opcion</option>--}}
                            <option value="2" selected>Pago Total</option>
                            <option value="2">2 Partes</option>
                            <option value="3">3 Partes</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col s12">
            <div class="divider margin-bottom-20"></div>
            <table class="table bordered striped">
                <caption></caption>
                <thead class="grey darken-2 white-text">
                    <tr>
                        <th class="border-radius-0">Cod.</th>
                        <th class="border-radius-0">Descripcion</th>
                        <th class="border-radius-0">N°Pasajeros</th>
                        <th class="border-radius-0">Fecha Pago</th>
                        <th class="right-align border-radius-0">Pagos</th>
                        <th class="border-radius-0"></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>GTP500</td>
                    <td>The best of peru</td>
                    <td>2</td>
                    <td>27 jun, 2017</td>
                    <td class="right">3850.00</td>
                    <td class="right-align">
                        <a href="" class="tooltipped pink-text text-accent-4" data-position="bottom" data-delay="50" data-tooltip="Pagar Ahora"><i class="material-icons">payment</i></a>
                        <a href="" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enviar datos bancarios para pagar (deposito)"><i class="material-icons">mail</i></a>
                    </td>
                </tr>
                <tr>
                    <td>GTP500</td>
                    <td>The best of peru</td>
                    <td>2</td>
                    <td>27 jun, 2017</td>
                    <td class="right">3850.00</td>
                    <td class="right-align">
                        <i class="material-icons green-text">check_circle</i>
                    </td>
                </tr>
                <tr>
                    <td>GTP500</td>
                    <td>The best of peru</td>
                    <td>2</td>
                    <td>27 jun, 2017</td>
                    <td class="right">3850.00</td>
                    <td class="right-align">
                        <i class="red-text">Pending</i>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <ul>
                            <li><b>TOTAL</b></li>
                            <li><b>PRECIO PAQUETE</b></li>
                            <li><b>TOTAL DEUDA</b></li>
                        </ul>
                    </td>
                    <td class='right'>
                        <ul>
                            <li><b>3850.00</b></li>
                            <li>7700.00</li>
                            <li><b>3850.00</b></li>
                        </ul>
                    </td>
                    <td></td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>

@stop