@extends('layouts.admin')
@section('scripts_textarea')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/js/jquery.atwho.min.js"></script>--}}
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/css/jquery.atwho.min.css">--}}

    {{--<script>tinymce.init({ selector:'textarea' });</script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{asset('css/stilos_froala.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link href="{{asset('css/style-freddy.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>--}}
    {{--<script type="text/javascript" src="{{URL::to('js/funciones_froala.js')}}"></script>--}}
@endsection
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

                <nav>
                    <div class="nav-wrapper blue-grey">
                        <a href="#" class="brand-logo">Logo</a>
                        <ul id="nav-mobile" class="hide-on-med-and-down">
                            <li class="active"><a href="sass.html">Paso #1</a></li>
                            <li><a href="badges.html">Paso #2</a></li>
                            <li><a href="collapsible.html">Paso #3</a></li>
                        </ul>
                    </div>
                </nav>
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
                <div class="card-panel ">
                    <div class="card grey lighten-4">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col m6">
                                    <h5 class="cyan-text text-accent-4">Datos del cliente</h5>
                                </div>
                                {{--<div class="col m6">--}}
                                    {{--<h5 class="pink-text text-lighten-1 right">Paso 1 de 3</h5>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="card-action">
                            <form action="{{route('cotizacion_guardar_pre_path')}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="mdi-communication-email prefix"></i>
                                        <input id="email_3" name="email_3" type="email" value="madyson.ward@example.net">
                                        <label for="email_3" class="">Email</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <i class="mdi-social-people prefix"></i>
                                        <input id="nropasajeros" name="nropasajeros" type="number" min="1" value="1" onchange="aumentar_clientes()">
                                        <label for="nropasajeros" class="">Nro pasajeros</label>
                                    </div>

                                    <div class="input-field col s3">
                                        <i class="mdi-editor-insert-invitation prefix"></i>
                                        <input id="fecha" name="fecha" type="date" value="{{date("Y-m-d")}}">
                                        <label for="fecha" class="active">Fecha de viaje</label>
                                    </div>
                                </div>
                                <div class="row right">
                                    <div class="col m12 ">
                                        <div class="input-field">
                                            {{csrf_field()}}
                                            <button type="submit" class="waves-effect waves-light  btn"><i class="mdi-content-send right"></i>Siguiente</button>
                                            {{--<a id="nuevo_pqt" class="btn  blue darken-4 waves-effect waves-light">Crear nuevo plan <i class="material-icons right">cloud</i></a>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card grey lighten-4">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col m6">
                                    <h5 class="cyan-text text-accent-4">Configuracion del plan</h5>
                                </div>
                                <div class="col m6">
                                    <h5 class="pink-text text-lighten-1 right">Paso 2 de 3</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col s6" id="mensaje"></div>
                                <div class="row">
                                    <div class="col s6" id="mensaje"></div>

                                </div>
                                <div class="row">
                                    <div class="col m12 white">
                                        <form action="" method="post" >
                                            <div class="row">
                                                <div class="col m6">
                                                    <div class="row">
                                                        <div class="input-field col m6">
                                                            <i class="mdi-action-search prefix"></i>
                                                            {{csrf_field()}}
                                                            <input id="codigopx" name="codigopx"  type="text" value="gtp412" placeholder="Ingrese el codigo">
                                                            <label for="codigopx" class="">Ingrese el codigo del paquete</label>
                                                        </div>
                                                        <div class="input-field col m4">
                                                            <a id="btnBuscar_pqt" class="btn cyan waves-effect waves-light right">Mostrar
                                                            </a>
                                                        </div>
                                                        <div class="input-field col m2 " id="idLoad">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col m6">
                                                    <div class="row">
                                                        <div class="col m6 right">
                                                            <div class="input-field">
                                                                <a id="nuevo_pqt" class="btn  blue darken-4 waves-effect waves-light">Crear nuevo plan
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col m6 hide">
                                                            <div class="input-field">
                                                                <a id="generar_pqt" class="btn green waves-effect waves-light" onclick="generar_pqt()">Generar plan
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <form mane="form_plan" id="form_plan" enctype="multipart/form-data" action="" method="post" >
                                    <div id="list_planes"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card grey lighten-4">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col m6">
                                    <h5 class="cyan-text text-accent-4">Lista de planes</h5>
                                </div>
                                <div class="col m6">
                                    <h5 class="pink-text text-lighten-1 right">Paso 3 de 3</h5>
                                </div>
                            </div>
                        </div>
                        <div id="lista_plan_cotizacion" class="card-action">
                            {{--<table class="striped">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th data-field="id">Codigo</th>--}}
                                    {{--<th data-field="name">Titulo</th>--}}
                                    {{--<th data-field="number">Nro pasajeros</th>--}}
                                    {{--<th data-field="date">Fecha</th>--}}
                                    {{--<th data-field="name">Opciones</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>GTP500</td>--}}
                                    {{--<td>Titulo</td>--}}
                                    {{--<td>5</td>--}}
                                    {{--<td>2017-06-11</td>--}}
                                    {{--<td class="">--}}
                                        {{--<a href="#!"><i class="mdi-content-create small"></i></a>--}}
                                        {{--<a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>--}}
                                        {{--<a href="#!" class="green-text text-darken-2"><i class="mdi-content-send small"></i></a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>GTP501</td>--}}
                                    {{--<td>Titulo</td>--}}
                                    {{--<td>5</td>--}}
                                    {{--<td>2017-06-11</td>--}}
                                    {{--<td class="">--}}
                                        {{--<a href="#!"><i class="mdi-content-create small"></i></a>--}}
                                        {{--<a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>--}}
                                        {{--<a href="#!" class="grey-text text-darken-1"><i class="mdi-content-send small"></i></a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>GTP502</td>--}}
                                    {{--<td>Titulo</td>--}}
                                    {{--<td>5</td>--}}
                                    {{--<td>2017-06-11</td>--}}
                                    {{--<td class="">--}}
                                        {{--<a href="#!"><i class="mdi-content-create small"></i></a>--}}
                                        {{--<a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>--}}
                                        {{--<a href="#!" class="green-text text-darken-2"><i class="mdi-content-send small"></i></a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}

                            {{--</table>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 right">
                            <div class="fixed-action-btn horizontal">
                                <a class="btn-floating btn-large" onclick="generar_pqt()">
                                    <i class="large mdi-content-save"></i>
                                </a>
                                {{--<ul>--}}
                                    {{--<li><a class="btn-floating red" id="borrar_itinerario"><i class="large mdi-content-clear"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li><a class="btn-floating blue" id="guardar_cotizacion"><i class="large mdi-content-save"></i></a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
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
    {{--<script src="//cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>--}}
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
    {{--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>--}}
    {{--<script>tinymce.init({ selector:'textarea' });</script>--}}
    <script type="text/javascript" src="{{URL::to('js/sweetalert.js')}}"></script>
    <link href="{{asset('css/sweetalert.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
    <script type="text/javascript" src="{{URL::to('js/funciones-ajax.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/funciones_cotizacion.js')}}"></script>

    <link href="{{asset('css/notification.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link href="{{asset('css/acordeon-sorteable.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/css/jquery.atwho.min.css">--}}
    {{--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>--}}
@endsection

