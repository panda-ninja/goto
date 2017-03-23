@extends('layouts.admin')

@section('content')

    
    <div id="profile-page" class="row">
        <div class="col s12">
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{asset("images/user-profile-bg.jpg")}}" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="{{asset("images/avatar.jpg")}}" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s3 offset-s2">
                            <h4 class="card-title grey-text text-darken-4">Roger Waters</h4>
                            <p class="medium-small grey-text">Cliente</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">10+</h4>
                            <p class="medium-small grey-text">Total Propuetas</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">6</h4>
                            <p class="medium-small grey-text">Confirmadas</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                            <p class="medium-small grey-text">Total</p>
                        </div>
                        <div class="col s1 right-align">
                            <a class="btn-floating activator waves-effect waves-light darken-2 right">
                                <i class="mdi-action-perm-identity"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                    <p>
                        <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                        <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</span>
                    </p>

                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>

                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                    <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center">
            <h5>Cotizaciones y Propuestas</h5>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>N°Pasajero</th>
                    <th>Fecha de Viaje</th>
                    <th></th>
                    <th>Posibilidad</th>
                </tr>
                </thead>

                <tbody>
                <tr class="red lighten-5">
                    <td>1</td>
                    <td class="center">2</td>
                    <td class="center">24 Mar, 2017</td>
                    <td>
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <th>Propuestas</th>
                                    <th class="right-align">Costo ($)</th>
                                    <th class="right-align">Venta ($)</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><b>Propuesta A:</b> Classic Cusco</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">1200.00</td>
                                <td class="right-align">
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta B:</b> Classic Cusco</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">1200.00</td>
                                <td class="right-align">
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta C:</b> Classic Cusco</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">1200.00</td>
                                <td class="right-align">
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="center"><a href="" class="text-30 red-text"><b><u>10%</u></b></a></td>
                </tr>
                <tr class="green lighten-5">
                    <td>2</td>
                    <td class="center">2</td>
                    <td class="center">24 Mar, 2017</td>
                    <td>
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <th>Propuestas</th>
                                    <th class="right-align">Costo ($)</th>
                                    <th class="right-align">Venta ($)</th>
                                </tr>
                            </thead>
                            <tr class="orange lighten-4">
                                <td><b>Propuesta A:</b> Classic Cusco 2</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">$1200.00</td>
                                <td class="right-align">
                                    <a href="" class="red-text"><i>Pago Pendiente(10%)</i></a>
                                </td>
                            </tr>
                            <tr class="green lighten-4">
                                <td><b>Propuesta B:</b> Classic Cusco 3</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">$1200.00</td>
                                <td class="right-align">
                                    <a href="" class="blue-text"><i>Pago Completo(100%)</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Propuesta C:</b> Classic Cusco 4</td>
                                <td class="right-align">1000.00</td>
                                <td class="right-align">$1200.00</td>
                                <td class="right-align">
                                    <a href="" class="text-22 red-text"><i class="mdi-action-delete"></i></a>
                                    <a href="" class="text-22"><i class="mdi-content-send"></i></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="center"><a href="" class="text-30 green-text"><b><u>100%</u></b></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop