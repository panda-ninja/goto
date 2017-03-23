@extends('layouts.admin')

@section('content')

    <div class="row spacer-20">
        <div class="col s12 center">
            <div class="col s12">
                <h5>Cotizaciones y Propuestas</h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Cliente</th>
                    <th>N°Pasajero</th>
                    <th>Fecha de Viaje</th>
                    <th>Propuestas</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>Hidalgo Ch Ponce</td>
                    <td>2</td>
                    <td>24 Mar, 2017</td>
                    <td>
                        <table class="bordered">
                            <tr>
                                <td><b>Propuesta A:</b> Classic Cusco</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta B:</b> Classic Cusco</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta C:</b> Classic Cusco</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Fernando Doe</td>
                    <td>2</td>
                    <td>24 Mar, 2017</td>
                    <td>
                        <table class="bordered">
                            <tr>
                                <td><b>Propuesta A:</b> Classic Cusco 2</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta B:</b> Classic Cusco 3</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta C:</b> Classic Cusco 4</td>
                                <td class="right-align">$1200.00</td>
                                <td>
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop