@extends('layouts.dashboard')

@section('content')

    <div class="row">

        <div class="col s12">
            <blockquote>
                <p>Usted puede <span class="yellow-text text-darken-3">llenar los datos completos</span> de su grupo o haga que ellos lo hagan por usted llenando solo su <span class="yellow-text text-darken-3">nombre y email</span>, ellos recibiran un mensaje al correo ingresado con un usuario y contraseña (solo podran modificar sus datos y ver todo los detalles del paquete).</p>
            </blockquote>
        </div>
        <div class="col s12">
            <ul class="collection">
                @foreach($clienteCotizacion as $clienteCotizaciones)
                    @if($clienteCotizaciones->estado == 1)
                        <li class="collection-item avatar grey lighten-4">
                            <img src="{{ Gravatar::src($clienteCotizaciones->cliente->nombres, 200) }}" class="circle">
                            <span class="title"><b>{{$clienteCotizaciones->cliente->nombres}} {{$clienteCotizaciones->cliente->apellidos}}</b></span>
                            <p>{{$clienteCotizaciones->cliente->email}}</p>
                            <i class="right">Informacion al 70%</i>
                            <div class="progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <a href="#!" class="secondary-content"><i class="material-icons">create</i></a>
                        </li>
                    @else

                        {{--<li class="collection-item avatar lighten-4">--}}
                            {{--<img src="{{ Gravatar::src($clienteCotizaciones->cliente->nombres, 200) }}" class="circle">--}}
                            {{--<span class="title"><b>{{$clienteCotizaciones->cliente->nombres}} {{$clienteCotizaciones->cliente->apellidos}}</b></span>--}}
                            {{--<p>{{$clienteCotizaciones->cliente->email}}</p>--}}
                            {{--<i class="right">Informacion al 70%</i>--}}
                            {{--<div class="progress">--}}
                                {{--<div class="determinate" style="width: 70%"></div>--}}
                            {{--</div>--}}
                            {{--<a href="#!" class="secondary-content"><i class="material-icons">create</i></a>--}}
                        {{--</li>--}}
                    @endif
                @endforeach

                @for($i = 1; $i < $clienteCotizaciones->cotizaciones->nropersonas; $i++)
                        <li class="collection-item avatar">
                            <i class="material-icons circle">person</i>
                            <p></p>
                            {{--@include('partials.errors')--}}
                            <form action="{{route('client_store_path', $clienteCotizaciones->cotizaciones->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="name_txt" name="name_txt" type="text" class="validate" required>
                                        <label for="name_txt">Full Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mail</i>
                                        <input id="email" type="email" name="email" class="validate" required>
                                        <label for="email" data-error="wrong" data-success="right">Email</label>
                                        <i class="text-11"><i class="material-icons text-11">check</i> Haga que este usuario llene sus datos</i>
                                    </div>
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Pedir datos
                                            <i class="material-icons right">send</i>
                                        </button>
                                        @if(Session::get('success'))
                                            <div class="card-panel light-blue darken-1 center-align">
                                                <h5 class="white-text">hola peru.</h5>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </form>
                            <i class="right">Informacion incompleta 0%</i>
                            <div class="progress">
                                <div class="determinate" style="width: 0%"></div>
                            </div>
                            <a href="#!" class="secondary-content blue-text"><i class="material-icons right no-margin">open_in_new</i> Registrar todos los datos de pasajero</a>
                        </li>
                @endfor


                {{--<li class="collection-item avatar">--}}
                    {{--<i class="material-icons circle green">insert_chart</i>--}}
                    {{--<span class="title">Title</span>--}}
                    {{--<p>First Line <br>--}}
                        {{--Second Line--}}
                    {{--</p>--}}
                    {{--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                {{--</li>--}}
                {{--<li class="collection-item avatar">--}}
                    {{--<i class="material-icons circle red">play_arrow</i>--}}
                    {{--<span class="title">Title</span>--}}
                    {{--<p>First Line <br>--}}
                        {{--Second Line--}}
                    {{--</p>--}}
                    {{--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>

@stop