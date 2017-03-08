@extends('layouts.dashboard')

@section('content')


    {{--<h4 class="center margin-bottom-40">Quote history</h4>--}}

    {{--<ul id="tabs-swipe-demo" class="tabs">--}}
        {{--<li class="tab col s3"><a class="active" href="#todas">Todas las cotizaciones</a></li>--}}
        {{--<li class="tab col s3"><a href="#confirmados">Confirmados</a></li>--}}
        {{--<li class="tab col s3"><a href="#pendientes">Pendientes</a></li>--}}
    {{--</ul>--}}

    <div class="col s12">
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10 active">
                <a href="{{route('quotes_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>inbox</i> Todas las cotizaciones</a>
            </div>
        </div>
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10">
                <a href="{{route('quotes_confirm_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>check_circle</i> Confirmados</a>
            </div>

        </div>
        <div class="col s4 no-padding">
            <div class="tab-qoutes center padding-10">
                <a href="{{route('quotes_pending_path')}}" class="valign-wrapper grey-text text-darken-1"><i class='material-icons padding-right-5'>warning</i> Pendientes</a>
            </div>
        </div>
    </div>
    <div id="todas" class="col s12 ">
        <ul class="collection">
        @foreach($cotizaciones as $cotizacion)
                @php $bg_status = ''; @endphp
                @foreach($cotizacion->paquete_cotizaciones as $paquete_cot)
                    @if($paquete_cot->estado == 1)
                        @php $bg_status = "white"; @endphp
                    @else
                        @php $bg_status = "grey lighten-4"; @endphp
                    @endif
                @endforeach
            <li class="collection-item {{$bg_status}}">
                <span class="title text-12"><i>Fecha de viaje: {{$cotizacion->fecha}} | Numero de pasajeros: {{$cotizacion->nropersonas}}</i></span>
                <table class="table">
                    @php $i = 1; @endphp
                @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                    @php
                        switch ($paquete_cotizaciones->estado) {
                            case '1':
                                $active = 'grey-text text-darken-3 bold-900';
                                $estado = "<i class='material-icons grey-text text-darken-3'>mail</i>";
                                break;
                            case '2':
                                $active = 'grey-text text-darken-3';
                                $estado = '<i class="material-icons grey-text">mail_outline</i>';
                                break;
                            case '3':
                                $active = 'grey-text text-darken-3';
                                $estado = "<i class='material-icons green-text'>check_circle</i>";
                                break;
                            case '4':
                                $active = 'grey-text text-lighten-1';
                                $estado = "<i class='material-icons grey-text text-lighten-1'>close</i>";
                                break;
                            default:
                                $estado = '';
                                $active = '';
                                break;
                        }
                    @endphp

                        <tr>
                            <td class="no-padding">@php echo $estado; @endphp</td>
                            <td class="no-padding"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}}">Propuesta {{$i++}}:</a></td>
                            <td class="no-padding"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}}">{{$paquete_cotizaciones->titulo}}</a></td>
                            <td class="no-padding right-align"><a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="{{$active}} rigth">{{date_format($paquete_cotizaciones->updated_at, 'j F Y')}}</a></td>
                        </tr>

                @endforeach
                </table>

                    {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                    {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                    {{--<p><a href="">Propuesta 1: {{$paquete_cotizaciones->titulo}} | {{$cotizacion->nropersonas}} pasajeros<span class="right">18 june 2017</span></a></p>--}}
                    {{--<a href="#!" class="secondary-content">18 june 2017</a>--}}

            </li>

        @endforeach
        </ul>
    </div>
    <div id="confirmados" class="col s12 green hide">
        @foreach($cotizaciones as $cotizacion)
            @if($cotizacion->estado == '1')

                <ul class="collapsible popout" data-collapsible="accordion">
                    <li class="row">
                        <div class="collapsible-header"><i class="material-icons green-text">check_circle</i><b>Cotizacion:</b> {{$cotizacion->id}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
                        <div class="collapsible-body">
                            <?php $i=1; ?>
                            @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                                <div class="col s12">
                                    @if($paquete_cotizaciones->estado == 1)
                                        <?php
                                        $active = 'active';
                                        $yellow = 'yellow-text text-darken-3';
                                        $green = 'green-text';
                                        $grey = 'grey-text text-darken-4';
                                        $blue = 'blue-text text-darken-3';
                                        $btn_yellow = 'yellow darken-3';
                                        $img_active = '';
                                        ?>
                                    @else
                                        <?php
                                        $active = 'desactive';
                                        $yellow = 'grey-text';
                                        $green = 'grey-text';
                                        $grey = 'grey-text';
                                        $blue = 'grey-text';
                                        $btn_yellow = 'grey darken-3';
                                        $img_active = 'desaturada';
                                        ?>
                                    @endif
                                    <div class="section card-panel grey lighten-4 z-depth-1 hoverable {{$active}}">

                                        <div class="valign-wrapper qoutes-box">

                                            <div class="col s12">
                                                <p class="no-padding {{$yellow}} text-20"><b class="{{$yellow}}">Plan {{$i++}}: </b> <span class="grey-text">{{$paquete_cotizaciones->id}} Days & {{$paquete_cotizaciones->duracion-1}} Nights</span></p>
                                                <p class="no-padding {{$grey}}">
                                                    @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                                        {{ucwords(strtolower($destino->destinos->destino))}},
                                                    @endforeach
                                                </p>

                                                <p class="center {{$grey}}"><b>"Lorem ipsum dolor sit amet, consectetur adipisicing elit."</b></p>

                                                <div class="col s9">
                                                    @foreach($paquete_cotizaciones->incluye_paquete_cotizaciones as $incluye)

                                                        <div class="col s3">
                                                            <img src="{{asset('img/icons/include/'.$incluye->incluye->imagen)}}" alt="" class="responsive-img {{$img_active}}">
                                                            <p class="no-padding center">{{ucwords(strtolower($incluye->incluye->titulo))}}</p>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <div class="col s3">
                                                    @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                                        <p class="no-padding {{$green}}"><b>{{$precio->estrellas}} stars:</b>  <span class="right">${{$precio->precio_d}}</span></p>
                                                    @endforeach
                                                </div>
                                                <div class="col s12 right-align">
                                                    <div class="divider spacer-margin-20"></div>
                                                    <a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="waves-effect waves-light btn {{$btn_yellow}}">View</a>
                                                    <a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>
                                                    <a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>
                                                    {{--<form action="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" method="post">--}}

                                                    {{--{{csrf_field()}}--}}

                                                    {{--<input type="submit" value="View" class="waves-effect waves-light btn {{$btn_yellow}}">--}}
                                                    {{--<a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>--}}
                                                    {{--<a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>--}}
                                                    {{--</form>--}}


                                                </div>

                                            </div>

                                            <!-- Modal Structure -->
                                            <div id="confirm{{$paquete_cotizaciones->id}}" class="modal">
                                                <form action="{{route('quotes_patch_path', $paquete_cotizaciones->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="patch">

                                                    <div class="modal-content">
                                                        <h5>Estas seguro de confirmar?</h5>
                                                        <p class="margin-top-40">El paquete personalizado se confirmara para su viaje de ensueño</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Now
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </li>

                </ul>

            @endif
        @endforeach
    </div>
    <div id="pendientes" class="col s12 red hide">
        @foreach($cotizaciones as $cotizacion)
            @if($cotizacion->estado == '0')

                <ul class="collapsible popout" data-collapsible="accordion">
                    <li class="row">
                        <div class="collapsible-header"><i class="material-icons red-text">remove</i><b>Cotizacion:</b> {{$cotizacion->id}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
                        <div class="collapsible-body">
                            <?php $i=1; ?>
                            @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                                <div class="col s12">
                                    @if($paquete_cotizaciones->estado == 1)
                                        <?php
                                        $active = 'active';
                                        $yellow = 'yellow-text text-darken-3';
                                        $green = 'green-text';
                                        $grey = 'grey-text text-darken-4';
                                        $blue = 'blue-text text-darken-3';
                                        $btn_yellow = 'yellow darken-3';
                                        $img_active = '';
                                        ?>
                                    @else
                                        <?php
                                        $active = 'desactive';
                                        $yellow = 'grey-text';
                                        $green = 'grey-text';
                                        $grey = 'grey-text';
                                        $blue = 'grey-text';
                                        $btn_yellow = 'grey darken-3';
                                        $img_active = 'desaturada';
                                        ?>
                                    @endif
                                    <div class="section card-panel grey lighten-4 z-depth-1 hoverable {{$active}}">

                                        <div class="valign-wrapper qoutes-box">

                                            <div class="col s12">
                                                <p class="no-padding {{$yellow}} text-20"><b class="{{$yellow}}">Plan {{$i++}}: </b> <span class="grey-text">{{$paquete_cotizaciones->id}} Days & {{$paquete_cotizaciones->duracion-1}} Nights</span></p>
                                                <p class="no-padding {{$grey}}">
                                                    @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                                        {{ucwords(strtolower($destino->destinos->destino))}},
                                                    @endforeach
                                                </p>

                                                <p class="center {{$grey}}"><b>"Lorem ipsum dolor sit amet, consectetur adipisicing elit."</b></p>

                                                <div class="col s9">
                                                    @foreach($paquete_cotizaciones->incluye_paquete_cotizaciones as $incluye)

                                                        <div class="col s3">
                                                            <img src="{{asset('img/icons/include/'.$incluye->incluye->imagen)}}" alt="" class="responsive-img {{$img_active}}">
                                                            <p class="no-padding center">{{ucwords(strtolower($incluye->incluye->titulo))}}</p>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <div class="col s3">
                                                    @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                                        <p class="no-padding {{$green}}"><b>{{$precio->estrellas}} stars:</b>  <span class="right">${{$precio->precio_d}}</span></p>
                                                    @endforeach
                                                </div>
                                                <div class="col s12 right-align">
                                                    <div class="divider spacer-margin-20"></div>

                                                    <a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="waves-effect waves-light btn {{$btn_yellow}}">View</a>
                                                    <a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>
                                                    <a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>
                                                    {{--<form action="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" method="post">--}}

                                                    {{--{{csrf_field()}}--}}

                                                    {{--<input type="submit" value="View" class="waves-effect waves-light btn {{$btn_yellow}}">--}}
                                                    {{--<a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>--}}
                                                    {{--<a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>--}}
                                                    {{--</form>--}}


                                                </div>

                                            </div>

                                            <!-- Modal Structure -->
                                            <div id="confirm{{$paquete_cotizaciones->id}}" class="modal">
                                                <form action="{{route('quotes_patch_path', $paquete_cotizaciones->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="patch">

                                                    <div class="modal-content">
                                                        <h5>Estas seguro de confirmar?</h5>
                                                        <p class="margin-top-40">El paquete personalizado se confirmara para su viaje de ensueño</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Now
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </li>

                </ul>

            @endif
        @endforeach
    </div>





    <!-- Modal Structure -->
    <div id="upgrade" class="modal bottom-sheet">
        <div class="container">
            <div class="modal-content">
                <h5>Request changes / upgrades</h5>
                <p>Ingrese los posibles cambio y sugerencias para personalizar adecuadamente su paquetes</p>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons right">send</i> Agree</a>
            </div>
        </div>
    </div>

    @stop