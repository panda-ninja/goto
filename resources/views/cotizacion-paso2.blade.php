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
                            <li><a href="sass.html">Paso #1</a></li>
                            <li class="active"><a href="badges.html">Paso #2</a></li>
                            <li><a href="collapsible.html">Paso #3</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="card-panel">
                    <div class="card grey lighten-4">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col m6">
                                    <h5 class="cyan-text text-accent-4">Datos del cliente</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="input-field col s6">
                                    @foreach($cliente as $cliente_)
                                        <label for=""><b>Nombres:</b>{{$cliente_->nombres}} {{$cliente_->apellidos}}</label>
                                        <label for=""><b>Email:</b>{{$cliente_->email}}</label>
                                        <label for=""><b>Nacialidad</b>{{$cliente_->nacionalidad}}</label>
                                        <label for=""><b>Sexo:</b>{{$cliente_->sexo}}</label>
                                        <label for=""><b>Pasaporte:</b>{{$cliente_->pasaporte}}</label>
                                        <label for=""><b>Telefono:</b>{{$cliente_->telefono}}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <form action="{{route('cotizacion_guardar_plan_path')}}"  method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a type="submit" class="waves-effect waves-light  btn"><i class="mdi-content-send right"></i>packaging</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a type="submit" class="waves-effect waves-light  btn"><i class="mdi-content-send right"></i>To design</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card grey lighten-4">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col m6">
                                    <h5 class="cyan-text text-accent-4">Escoja una opcion</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-action">
                            <form action="{{route('cotizacion_guardar_plan_path')}}">
                                <div class="row">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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