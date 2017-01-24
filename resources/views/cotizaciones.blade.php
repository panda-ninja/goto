@extends('layouts.admin')
@section('scripts_textarea')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/js/jquery.atwho.min.js"></script>--}}
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/css/jquery.atwho.min.css">--}}

    {{--<script>tinymce.init({ selector:'textarea' });</script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    {{--<link href="{{asset('css/stilos_froala.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">--}}
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
                            <a href="#!" class="breadcrumb">Cotizaciones</a>
                        </div>
                    </div>
                </nav>
                <div class="card-panel">
                    <div class="row">
                        <div class="input-field col s3">
                            <a id="agregar_pqt" class="btn cyan waves-effect waves-light right modal-trigger" href="#modal1">Nueva Cotizacion
                                <i class="mdi-content-add-circle right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div id="table-datatables">

                                <div class="row">
                                    <div class="col s12 m12 l9">
                                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Cliente</th>
                                                <th>Paquetes&nbsp;turisticos</th>
                                                <th>Tutistas</th>
                                                <th>&nbsp;&nbsp;Total&nbsp;&nbsp;</th>
                                                <th>Fecha&nbsp;mision</th>
                                                <th>Fecha&nbsp;llegada</th>
                                                <th>Estado</th>
                                                <th>Eventos</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Cliente</th>
                                                <th>Paquetes&nbsp;turisticos</th>
                                                <th>Tutistas</th>
                                                <th>&nbsp;&nbsp;Total&nbsp;&nbsp;</th>
                                                <th>Fecha</th>
                                                <th>Fecha&nbsp;de&nbsp;llegada</th>
                                                <th>Estado</th>
                                                <th>Eventos</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Hermann ChristiansenSystem Architect</td>
                                                <td>Cusco Mapi, Nazca, Madre de dios</td>
                                                <td>5</td>
                                                <td>$ 11500.00</td>
                                                <td>2017-02-01</td>
                                                <td>2017-06-01</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
    <script type="text/javascript" src="{{URL::to('js/funciones-ajax.js')}}"></script>
    <link href="{{asset('css/notification.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
