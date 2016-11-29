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
                                    <input id="email3" type="email">
                                    <label for="email" class="">Email</label>
                                </div>

                                <div class="input-field col s3">
                                    <i class="mdi-social-people prefix"></i>
                                    <input id="nropasajeros" type="number" min="1" >
                                    <label for="nropasajeros" class="">Nro pasajeros</label>
                                </div>

                                <div class="input-field col s3">
                                    <i class="mdi-editor-insert-invitation prefix"></i>
                                    <input id="fecha_" type="date">
                                    <label for="fecha_" class="active">Fecha</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h4 class="header2">Paquetes</h4>
                    <div class="row">
                        <div class="input-field col s3">
                            <a class="btn cyan waves-effect waves-light right modal-trigger" href="#modal1">Agregar paquete
                                <i class="mdi-content-add-circle right"></i>
                            </a>
                        </div>
                    </div>
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
                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Cerrar</a>
                            <a href="#" class="waves-effect waves-green btn-flat modal-action ">Agregar</a>
                        </div>
                    </div>

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

                </div>
            </div>
        </div>
    </div>
        <!--end container-->
@stop
@section('scripts')
    <script type="text/javascript" src="{{URL::to('js/funciones-ajax.js')}}"></script>
    <link href="{{asset('css/notification.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection