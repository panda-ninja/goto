@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <nav>
                    <div class="nav-wrapper">
                        <div class="col s12">
                            <a href="#!" class="breadcrumb">Cotizacion</a>
                            <a href="#!" class="breadcrumb">Nueva cotizacion</a>
                        </div>
                    </div>
                </nav>
                <div class="card-panel">
                    <h4 class="header2">Datos del cliente</h4>
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="mdi-communication-email prefix"></i>
                                    <input id="email_3" type="email">
                                    <label for="email_3" class="">Email</label>
                                </div>

                                <div class="input-field col s3">
                                    <i class="mdi-social-people prefix"></i>
                                    <input id="nropasajeros" type="number" min="1" >
                                    <label for="nropasajeros" class="">Nro pasajeros</label>
                                </div>

                                <div class="input-field col s3">
                                    <i class="mdi-editor-insert-invitation prefix"></i>
                                    <input id="fecha" type="date">
                                    <label for="fecha" class="active">Fecha</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h4 class="header2">Paquetes</h4>
                    <div class="row">
                        <div class="input-field col s3">
                            <a id="agregar_pqt" class="btn cyan waves-effect waves-light right modal-trigger" href="#modal1">Agregar paquete
                                <i class="mdi-content-add-circle right"></i>
                            </a>
                        </div>
                    </div>
                    <form action=""  method="post">
                    <div id="modal1" class="modal modal-ancho">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s6" id="mensaje"></div>

                            </div>
                            <div class="row">
                                <form action="" method="post">
                                    <div class="input-field col s6">
                                        <i class="mdi-action-search prefix"></i>
                                        {{csrf_field()}}
                                        <input id="codigopx" name="codigopx"  type="text">
                                        <label for="codigopx" class="">Ingrese el codigo del paquete</label>
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="btnBuscar_pqt" class="btn cyan waves-effect waves-light right">Buscar
                                        </a>
                                    </div>
                                    <div class="input-field col s2" id="idLoad">
                                    </div>
                                </form>
                            </div>
                            <div id="list_planes"></div>
                        </div>
                        <div class="modal-footer">
                            <div style="position: relative;">
                                <div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block; right: 19px;">
                                    <a class="btn-floating btn-large cyan darken-1">
                                        <i class="mdi-navigation-menu"></i>
                                    </a>
                                    <ul>
                                        <li><a id="cerrar_modal" href="#" class="btn-floating red modal-close"><i class="large mdi-content-clear"></i></a>
                                        </li>
                                        <li><a class="btn-floating cyan"><i class="mdi-content-content-copy"></i></a>
                                        </li>
                                        <li><a type="submit" class="btn-floating blue modal-action"><i class="large mdi-content-save"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{--<a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Cerrar</a>--}}
                            {{--<a href="#" class="waves-effect waves-green btn-flat modal-action ">Agregar</a>--}}
                        </div>
                    </div>
                    </form>
                    <table class="striped">
                        <thead>
                        <tr>
                            <th data-field="id">Codigo</th>
                            <th data-field="name">Titulo</th>
                            <th data-field="number">Nro pasajeros</th>
                            <th data-field="date">Fecha</th>
                            <th data-field="name">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GTP500</td>
                                <td>Titulo</td>
                                <td>5</td>
                                <td>2017-06-11</td>
                                <td class="">
                                    <a href="#!"><i class="mdi-content-create small"></i></a>
                                    <a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>GTP501</td>
                                <td>Titulo</td>
                                <td>5</td>
                                <td>2017-06-11</td>
                                <td class="">
                                    <a href="#!"><i class="mdi-content-create small"></i></a>
                                    <a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>GTP502</td>
                                <td>Titulo</td>
                                <td>5</td>
                                <td>2017-06-11</td>
                                <td class="">
                                    <a href="#!"><i class="mdi-content-create small"></i></a>
                                    <a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>

                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col s12 right">
                                <div class="fixed-action-btn horizontal">
                                    <a class="btn-floating btn-large">
                                        <i class="mdi-navigation-menu"></i>
                                    </a>
                                    <ul>
                                        <li><a class="btn-floating red" id="borrar_itinerario"><i class="large mdi-content-clear"></i></a>
                                        </li>
                                        <li><a class="btn-floating blue" id="guardar_cotizacion"><i class="large mdi-content-save"></i></a>
                                        </li>
                                    </ul>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--end container-->
@stop
@section('scripts')
    <script type="text/javascript" src="{{URL::to('js/sweetalert.js')}}"></script>
    <link href="{{asset('css/sweetalert.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="//cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{URL::to('js/funciones-ajax.js')}}"></script>
    <link href="{{asset('css/notification.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection