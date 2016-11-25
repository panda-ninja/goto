@extends('layouts.dashboard')

@section('content')

    @foreach($cotizaciones as $cotizacion)
        @if($cotizacion->estado == '1')

            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="row">
                    <div class="collapsible-header"><i class="material-icons green-text">check_circle</i><b>Cotizacion:</b> {{$cotizacion->fecha}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
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
                                                <p class="no-padding {{$yellow}} text-20"><b class="{{$yellow}}">Plan {{$i++}}: </b> <span class="grey-text">{{$paquete_cotizaciones->duracion}} Days & {{$paquete_cotizaciones->duracion-1}} Nights</span></p>
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
                                                    <form action="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" method="post">

                                                        {{csrf_field()}}

                                                        <input type="submit" value="View" class="waves-effect waves-light btn {{$btn_yellow}}">
                                                        <a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>
                                                        <a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>
                                                    </form>


                                                </div>

                                            </div>
                                        



                                        {{--<div class="row">--}}
                                        {{--<div class="col s2">--}}
                                            {{--<p class="no-padding {{$yellow}} center-align"><b>Plan {{$i++}}</b></p>--}}
                                            {{--<p class="no-padding {{$yellow}} center-align"><span class="text-30 quotes-duration">{{$paquete_cotizaciones->duracion}}</span> Days</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col s3">--}}
                                            {{--@foreach($paquete_cotizaciones->precio_paquetes as $precio)--}}
                                                {{--<p class="no-padding {{$green}}"><b>{{$precio->estrellas}} stars:</b>  ${{$precio->precio_d}}</p>--}}
                                            {{--@endforeach--}}
                                            {{--<p class="no-padding green-text"><b>2 stars:</b> </p>--}}
                                            {{--<p class="no-padding grey-text line-through"><b>3 stars:</b> $2299</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col s3">--}}
                                            {{--<ul>--}}
                                                {{--@foreach($paquete_cotizaciones->paquetes_destinos as $destino)--}}
                                                    {{--<li class="no-padding {{$grey}}">- {{ucwords(strtolower($destino->destinos->destino))}}</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}

                                            {{--<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lima - Ica - Machu Picchu">...</a>--}}
                                        {{--</div>--}}

                                        {{--<div class="col s4 quotes-btn">--}}
                                            {{--<a href="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" class="{{$blue}}">View detailed program</a>--}}
                                            {{--<a href="#upgrade" class="modal-trigger {{$blue}}">Request changes / upgrades</a>--}}
                                            {{--@if($paquete_cotizaciones->estado==0)--}}
                                                {{--<a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger {{$blue}}">Confirm</a>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--</div>--}}

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

        @if($cotizacion->estado == '0')

            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="row">
                    <div class="collapsible-header"><i class="material-icons red-text">remove</i><b>Cotizacion:</b> {{$cotizacion->fecha}} / </b> <b> N°Pasajeros:</b>  {{$cotizacion->nropersonas}}  </div>
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
                                    ?>
                                @else
                                    <?php
                                    $active = 'desactive';
                                    $yellow = 'grey-text';
                                    $green = 'grey-text';
                                    $grey = 'grey-text';
                                    $blue = 'grey-text';
                                    ?>
                                @endif
                                <div class="section card-panel grey lighten-4 z-depth-1 hoverable {{$active}}">

                                    <div class="valign-wrapper qoutes-box">
                                        <div class="col s2">
                                            <p class="no-padding {{$yellow}} center-align"><b>Proposal {{$i++}}</b></p>
                                            <p class="no-padding {{$yellow}} center-align"><span class="text-30 quotes-duration">{{$paquete_cotizaciones->duracion}}</span> Days</p>
                                        </div>
                                        <div class="col s3">
                                            @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                                <p class="no-padding {{$green}}"><b>{{$precio->estrellas}} stars:</b>  ${{$precio->precio_d}}</p>
                                            @endforeach
                                            {{--<p class="no-padding green-text"><b>2 stars:</b> </p>--}}
                                            {{--<p class="no-padding grey-text line-through"><b>3 stars:</b> $2299</p>--}}
                                        </div>
                                        <div class="col s3">
                                            <ul>
                                                @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                                    <li class="no-padding {{$grey}}">- {{ucwords(strtolower($destino->destinos->destino))}}</li>
                                                @endforeach
                                            </ul>

                                            {{--<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lima - Ica - Machu Picchu">...</a>--}}
                                        </div>

                                        <div class="col s4 quotes-btn">
                                            <a href="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" class="{{$blue}}">View detailed program</a>
                                            <a href="#upgrade" class="modal-trigger {{$blue}}">Request changes / upgrades</a>
                                            @if($paquete_cotizaciones->estado==0)
                                                <a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger {{$blue}}">Confirm</a>
                                            @endif
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